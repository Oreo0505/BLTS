<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Term;
use App\Models\Config;
use App\Traits\Upload;
use App\Models\User;


class SetupController extends Controller
{
    
    use Upload;

    public function setup(Request $request){
        // Validation code remains the same...
    
        // Create new term
        $term_form = [
            'start' => date("Y-m-d", strtotime($request->from)),
            'end' => date("Y-m-d", strtotime($request->to))
        ];
        $current_term = Term::create($term_form);
    
        // Create new user
        $user_form = [
            'municipality' => $request->municipality,
            'barangay' => $request->barangay,
            'logo' => $request->logo,
            'current_term' => $current_term->id,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encrypt the password
        ];
        $user = User::create($user_form);
    
        // Assign the current term to the user
        $user->current_term = $current_term->id;
        $user->save();
    
        // Create authors for the user
        $author_positions = [
            'Captain' => $request->captain,
            'Secretary' => $request->secretary,
            'SB Member 1' => $request->sb1,
            'SB Member 2' => $request->sb2,
            'SB Member 3' => $request->sb3,
            'SB Member 4' => $request->sb4,
            'SB Member 5' => $request->sb5,
            'SB Member 6' => $request->sb6,
            'SB Member 7' => $request->sb7,
            'SK Chairman' => $request->chairman,
        ];
    
        foreach($author_positions as $position => $name) {
            $author_form = [
                'name' => $name,
                'user_id' => $user->id, // Use the ID of the newly created user
                'position' => $position,
                'term_id' => $current_term->id
            ];
            Author::create($author_form);
        }
    
        // Handle file upload if present...
        
        // Log in the user after registration
        Auth::login($user);
        flash()->addSuccess('Registered Successfully');
        return redirect('/')->with([
            'id' => $user->id
        ]);
        
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
    
}
