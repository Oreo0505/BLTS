<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Models\Term;
use App\Models\Config;
use App\Models\User;
use App\Traits\Report;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{

    use Report;

    public function redirectToHome(){
        if(Auth::check()){
            return redirect('/');
        }
        return view('homepage');
    }

    public function redirectToMunicipalAdmin(Request $request){
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/admin'); // or any other route you want to redirect unauthenticated users to
        }
    
        $user = Auth::user();
        $municipality = $user->municipality;
    
        // Count the users with the same municipality and non-null, non-empty barangay
        $user_count = User::where('municipality', $municipality)
            ->whereNotNull('barangay')
            ->where('barangay', '!=', '')
            ->count();
    
        // Get the resolution counts made by users in the same municipality
        $resolution_counts = Document::whereHas('user', function($query) use ($municipality) {
            $query->where('municipality', $municipality);
        })
            ->where('type', 'Resolution') // Assuming 'resolution' is the type field value for resolutions
            ->count();
        $ordinance_counts = Document::whereHas('user', function($query) use ($municipality){
            $query->where('municipality', $municipality);
        })
            ->where('type', 'Ordinance')
            ->count();
        $code_of_ordinance_counts = Document::whereHas('user', function($query) use ($municipality){
            $query->where('municipality', $municipality);
        })
            ->where('type', 'Code of Ordinance')
            ->count();

        // dd($resolution_counts);
        // dd($ordinance_counts);
        // dd($code_of_ordinance_counts);

        // Return the view for authenticated users
        return view('municipal_admin', [
            'user_count' => $user_count,
            'municipality' => $municipality,
            'resolution_counts' => $resolution_counts,
            'ordinance_counts' => $ordinance_counts,
            'code_of_ordinance_counts' => $code_of_ordinance_counts,
            'user' => $user
        ]);
    
    }
    // public function loginAdmin(Request $request){
    //     // Retrieve email and password from the request
    //     $email = $request->input('email');
    //     $password = $request->input('password');

    //     // Create credentials array
    //     $credentials = [
    //         'email' => $email,
    //         'password' => $password,
    //     ];

    //     // Attempt to authenticate the user
    //     if (Auth::attempt($credentials)) {
    //         // Regenerate session to prevent session fixation attacks
    //         $request->session()->regenerate();

    //         // Flash a success message
    //         flash()->addSuccess('Login Successfully');

    //         // Redirect to the dashboard page
    //         return $this->redirectToAdminPage();
    //     } else {
    //         // Flash an error message
    //         flash()->addError('Your Credentials do not match our records.');

    //         // Redirect back to the login form
    //         return back();
    //     }
    // }

    
    public function redirectToLoginAdmin(){
        return view ('admin_login');
    }
    
    // public function redirectToAdminPage(){
    //     $user_count = User::where('municipality', 'boac')->count();
    //     if(Auth::check()){
    //         return redirect('/');
    //     }
    //     return view('admin_municipal', [
    //         'user_count' => $user_count
    //     ]);
    // }
    
    public function redirectToLoginPage(){
        if(Auth::check()){
            return redirect('/');
        }
        return view('login');
    }

    public function redirectToHomepage(Request $request){
        if(!Auth::check()){
            return redirect('/setup');
        }
        
        $user = Auth::user();
        $current_term = Term::where('user_id', $user->id)->find($user->current_term);

        $start = $current_term->start;
        $end = $current_term->end;
        if($request->has('filter')){
            $filter = explode('-', $request->filter);
            $documents = Document::with('authors')->where('user_id', $user->id)->whereBetween('date',[$start, $end])->orderBy($filter[0],$filter[1])->get();
        }
        else{
            $documents = Document::with('authors')->where('user_id', $user->id)->whereBetween('date',[$start, $end])->latest()->get();
        }
        $authors = Author::where('user_id', $user->id)->where('term_id', $current_term->id)->whereNot('position','Secretary')->get();
        
        $terms = Term::where('user_id', $user->id)->get();
        
        $authors_names = [];
        foreach($authors as $author){
            array_push($authors_names, $author->name);
        }
        $filters = [
            'administration' => date('Y',strtotime($start)).'-'.date('Y',strtotime($end)),
            'type' => 'Any',
            'area' => 'Any',
            'authors' => 'Any'
        ];
        $this->CreateReport($documents, $filters);
        
        return view('welcome',[
            'renew' => date('Y-m-d') > $current_term->end ? true : false,
            'current_term' => $current_term,
            'barangay' => $user->barangay,
            'municipality' => $user->municipality,
            'logo' => $user->logo,
            'documents' => $documents,
            'authors' => $authors,
            'terms' => $terms
        ]);
    }
    
    public function redirectToSetupPage(){
        if (Auth::check()) {
            flash()->addError('Registration Successful!');
            return redirect('/');
        }
        return view('setup');
    }

    public function redirectToRenewPage(){
        $user = Auth::user();
        if(!Auth::check()){
            flash()->addError('You have to set up an account first!');
            return redirect('/setup');
        }        
        $current_term = Term::where('user_id', $user->id)->find($user->current_term);
        if(date('Y-m-d') < $current_term->end){
            flash()->addError('Administrative Year / Term has not ended yet!');
            return redirect('/');
        }   
        return view('renew');
    }

    public function redirectToProfilePage(Request $request){
        $user = Auth::user();
        if($user->first_time){
            return redirect('/setup');
        }

        $current_term = Term::where('user_id', $user->id)->find($user->current_term);
        $terms = Term::where('user_id', $user->id)->get();

        if($request->has('id')){
            $term = Term::where('user_id', $user->id)->find($request->id);
            if($term == null){
                flash()->addError('Cannot find term');
                return back();
            }
            $captain = Author::where('user_id', $user->id)->where('term_id',$request->id)->where('position','Captain')->first();
            $secretary = Author::where('user_id', $user->id)->where('term_id',$request->id)->where('position','Secretary')->first();
            $chairman = Author::where('user_id', $user->id)->where('term_id',$request->id)->where('position','SK Chairman')->first();
            $sb_member_1 = Author::where('user_id', $user->id)->where('term_id',$request->id)->where('position','SB Member 1')->first();
            $sb_member_2 = Author::where('user_id', $user->id)->where('term_id',$request->id)->where('position','SB Member 2')->first();
            $sb_member_3 = Author::where('user_id', $user->id)->where('term_id',$request->id)->where('position','SB Member 3')->first();
            $sb_member_4 = Author::where('user_id', $user->id)->where('term_id',$request->id)->where('position','SB Member 4')->first();
            $sb_member_5 = Author::where('user_id', $user->id)->where('term_id',$request->id)->where('position','SB Member 5')->first();
            $sb_member_6 = Author::where('user_id', $user->id)->where('term_id',$request->id)->where('position','SB Member 6')->first();
            $sb_member_7 = Author::where('user_id', $user->id)->where('term_id',$request->id)->where('position','SB Member 7')->first();
        }
        else{
            $user = Auth::user();
            $term = Term::where('user_id', $user->id)->where('id', $user->current_term)->first();
            $captain = Author::where('user_id', $user->id)->where('term_id',$user->current_term)->where('position','Captain')->first();
            $secretary = Author::where('user_id', $user->id)->where('term_id',$user->current_term)->where('position','Secretary')->first();
            $chairman = Author::where('user_id', $user->id)->where('term_id',$user->current_term)->where('position','SK Chairman')->first();
            $sb_member_1 = Author::where('user_id', $user->id)->where('term_id',$user->current_term)->where('position','SB Member 1')->first();
            $sb_member_2 = Author::where('user_id', $user->id)->where('term_id',$user->current_term)->where('position','SB Member 2')->first();
            $sb_member_3 = Author::where('user_id', $user->id)->where('term_id',$user->current_term)->where('position','SB Member 3')->first();
            $sb_member_4 = Author::where('user_id', $user->id)->where('term_id',$user->current_term)->where('position','SB Member 4')->first();
            $sb_member_5 = Author::where('user_id', $user->id)->where('term_id',$user->current_term)->where('position','SB Member 5')->first();
            $sb_member_6 = Author::where('user_id', $user->id)->where('term_id',$user->current_term)->where('position','SB Member 6')->first();
            $sb_member_7 = Author::where('user_id', $user->id)->where('term_id',$user->current_term)->where('position','SB Member 7')->first();
        }

        return view('profile',[
            'renew' => date('Y-m-d') > $current_term->end ? true : false,
            'current_term' => $current_term,
            'barangay' => $user->barangay,
            'municipality' => $user->municipality,
            'logo' => $user->logo,
            'term' => $term,
            'terms' => $terms,
            'captain' => $captain,
            'secretary' => $secretary,
            'chairman' => $chairman,
            'sb_member_1' => $sb_member_1,
            'sb_member_2' => $sb_member_2,
            'sb_member_3' => $sb_member_3,
            'sb_member_4' => $sb_member_4,
            'sb_member_5' => $sb_member_5,
            'sb_member_6' => $sb_member_6,
            'sb_member_7' => $sb_member_7
        ]);
    }

    public function redirectToAddProfilePage(){
        $user = Auth::user();
        if($user->first_time){
            return redirect('/setup');
        }

        $current_term = Term::where('user_id', $user->id)->find($user->current_term);
        
        $terms = Term::where('user_id', $user->id)->get();
        return view('add_profile',[
            'renew' => date('Y-m-d') > $current_term->end ? true : false,
            'current_term' => $current_term,
            'barangay' => $user->barangay,
            'municipality' => $user->municipality,
            'logo' => $user->logo,
            'terms' => $terms
        ]);
    }

    public function redirectToTrashPage(Request $request){
        $user = Auth::user();
        if($user->first_time){
            return redirect('/setup');
        }

        $current_term = Term::where('user_id', $user->id)->find($user->current_term);
        $start = $current_term->start;
        $end = $current_term->end;
        if($request->has('filter')){
            $filter = explode('-', $request->filter);
            $documents = Document::where('user_id', $user->id)->with('authors')->onlyTrashed()->whereBetween('date',[$start, $end])->orderBy($filter[0],$filter[1])->get();
        }
        else{
            $documents = Document::where('user_id', $user->id)->with('authors')->onlyTrashed()->whereBetween('date',[$start, $end])->latest()->get();
        }
        $authors = Author::where('user_id', $user->id)->where('term_id', $current_term->id)->whereNot('position','Secretary')->get();

        $terms = Term::where('user_id', $user->id)->get();

        return view('trash',[
            'renew' => date('Y-m-d') > $current_term->end ? true : false,
            'current_term' => $current_term,
            'barangay' => $user->barangay,
            'municipality' => $user->municipality,
            'logo' => $user->logo,
            'documents' => $documents,
            'authors' => $authors,
            'terms' => $terms
        ]);
    }
    
    public function redirectToAboutPage(){
        return view('about');
    }

    public function redirectToAboutAdminPage(){
        return view('about_admin');
    }

}
