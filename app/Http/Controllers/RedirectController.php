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


    // public function getUserCountList(){
    //        // Get the authenticated user
    //     $authenticated_user = Auth::user();

    //     // Ensure the user is authenticated
    //     if (!$authenticated_user) {
    //     return response()->json(['error' => 'Unauthenticated'], 401);
    //     }

    //     // Fetch users from the same municipality
    //     $users = User::where('municipality', $authenticated_user->municipality)->get();

    //     // Get the barangay name of the authenticated user
    //     $barangay_name = $authenticated_user->barangay;

    //     return response()->json([
    //     'users' => $users,
    //     'barangay_name' => $barangay_name,
    //     ]);
        
        
    // }
    public function redirectToMunicipalAdmin(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/admin'); 
        }
    
        $user = Auth::user();
        $municipality = $user->municipality;
        $logo = $user->logo;  // Ensure logo is fetched from the user
    
        $user_count = User::where('municipality', $municipality)
            ->whereNotNull('barangay')
            ->where('barangay', '!=', '')
            ->count();
    
        $resolution_counts = Document::whereHas('user', function($query) use ($municipality) {
            $query->where('municipality', $municipality);
        })->where('type', 'Resolution')->count();
    
        $ordinance_counts = Document::whereHas('user', function($query) use ($municipality) {
            $query->where('municipality', $municipality);
        })->where('type', 'Ordinance')->count();
    
        $code_of_ordinance_counts = Document::whereHas('user', function($query) use ($municipality) {
            $query->where('municipality', $municipality);
        })->where('type', 'Code of Ordinance')->count();
    
        $registered_barangays = User::where('municipality', $municipality)
            ->whereNotNull('barangay')
            ->where('barangay', '!=', '')
            ->distinct()
            ->pluck('barangay')
            ->sort();
    
        return view('municipal_admin', [
            'user_count' => $user_count,
            'municipality' => $municipality,
            'resolution_counts' => $resolution_counts,
            'ordinance_counts' => $ordinance_counts,
            'code_of_ordinance_counts' => $code_of_ordinance_counts,
            'registered_barangays' => $registered_barangays,
            'user' => $user,
            'logo' => $logo  // Ensure logo is passed to the view
        ]);
    }
       
    
    public function redirectToLoginAdmin(){
        return view ('admin_login');
    }

    
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


    public function redirectToUsersListPage(){
        $user = Auth::user();
        $municipality = $user->municipality;
    
        // Initialize barangay_count based on the municipality
        if ($municipality == 'Boac'){
            $barangay_count = 61;
        } elseif ($municipality == 'Gasan'){
            $barangay_count = 25;
        } elseif ($municipality == 'Mogpog'){
            $barangay_count = 37;
        } elseif ($municipality == 'Buenavista'){
            $barangay_count = 15;
        } elseif ($municipality == 'Torrijos'){
            $barangay_count = 25;
        } elseif ($municipality == 'Santa Cruz'){
            $barangay_count = 55;
        } else {
            $barangay_count = 0; // Default value if municipality does not match any case
        }
    
        // Count the registered barangays
        $registered_barangays = User::where('municipality', $municipality)
            ->whereNotNull('barangay')
            ->where('barangay', '!=', '')
            ->count();
    
        return view('users_list', [
            'municipality' => $municipality,
            'barangay_count' => $barangay_count,
            'registered_barangays' => $registered_barangays,
            'logo' => $user->logo
        ]);
    }
    

    public function redirectToAdminMunicipalProfilePage(){
        if (!Auth::check()) {
            return redirect('/admin'); // or any other route you want to redirect unauthenticated users to
        }
        
        $user = Auth::user();
        $municipality = $user->municipality;
        $email = $user->email;
        $password = $user->password;

        return view('admin_profile', [
            'municipality' => $municipality,
            'user' => $user,
            'email' => $email,
            'password' => $password,
            'logo' => $user->logo
        ]);
    }

    public function redirectToForgotPasswordPage(){
        return view ('forgot_password_admin');
    }

    public function redirectToAdminForgotPasswordPage(){
        return view ('forgot_password_admin');
    }
   
}
