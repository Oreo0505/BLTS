<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Models\Term;
use App\Models\Config;
use App\Models\User;
use App\Traits\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function loginUser(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $credentials = ['email'=> $email,
                        'password' => $password];
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            flash()->addSuccess('Login Successfully');
            return redirect()->intended('/homepage');
        }
        else {
            flash()->addError('Your Credentials does not match in our records.');
            return back();
        }
    }
    // public function loginAdmin(Request $request)
    // {
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

    //         // Get the authenticated user
    //         $user = Auth::user();

    //         // Determine the user count based on the municipality
    //         if ($user->id === 1 && $user->municipality === 'boac') {
    //             $user_count = User::where('municipality', 'boac')->count();
    //         } elseif ($user->id === 2 && $user->municipality === 'mogpog') {
    //             $user_count = User::where('municipality', 'mogpog')->count();
    //         } else {
    //             // Flash an error message if user ID and municipality do not match expected values
    //             flash()->addError('Your Credentials do not match our records.');
    //             return redirect('/admin');
    //         }

    //         // Flash a success message
    //         flash()->addSuccess('Login Successfully');

    //         // Redirect to the appropriate municipal admin view with the user count
    //         return view('municipal_admin', [
    //             'user' => $user,
    //             'user_count' => $user_count
    //         ]);
    //     } else {
    //         // Flash an error message
    //         flash()->addError('Your Credentials do not match our records.');

    //         // Redirect back to the login form
    //         return back();
    //     }
    // }

    public function loginAdmin(Request $request)
{
    // Retrieve email and password from the request
    $email = $request->input('email');
    $password = $request->input('password');

    // Create credentials array
    $credentials = [
        'email' => $email,
        'password' => $password,
    ];

    // Attempt to authenticate the user
    if (Auth::attempt($credentials)) {
        // Get the authenticated user
        $user = Auth::user();


        // Check if the user's id is between 1 and 6
        if ($user->id < 1 || $user->id > 6) {
            // Log the user out since the id is not in the range of 1-6
            Auth::logout();

            // Flash an error message
            flash()->addError('You do not have permission to log in.');

            // Redirect back to the login form
            return back();
        }

        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

        // Flash a success message
        flash()->addSuccess('Login Successfully');
        
        return redirect('/admin/municipal');
    } else {
        // Flash an error message
        flash()->addError('Your credentials do not match our records.');

        // Redirect back to the login form
        return back();
    }
}

    
    

    // public function loginAdmin(){
    //     // Ensure the user is authenticated
    //     if (Auth::check()) {
    //         $user = Auth::user();

    //         // Check if the user is an admin and belongs to the specified municipality
    //         if ($user->id === 1 && $user->municipality === 'boac') { // Assuming adminBoac has ID 1
    //             $user_count_boac = User::where('municipality', 'boac')->count();
    //             return view('municipal_admin', [
    //                 'user_count' => $user_count_boac
    //             ]);
    //         } elseif ($user->id === 2 && $user->municipality === 'mogpog') { // Assuming adminMogpog has ID 2
    //             $user_count_mogpog = User::where('municipality', 'mogpog')->count();
    //             return view('municipal_admin', [
    //                 'user_count' => $user_count_mogpog
    //             ]);
    //         } else {
    //             // Redirect to login page if credentials are incorrect
    //             flash()->addError('Your Credentials are Incorrect!');
    //             return redirect('/admin');
    //         }
    //     } else {
    //         // Redirect to login page if not authenticated
    //         return redirect('/homepage');
    //     }
    // }

    public function logout(Request $request){
        if (!Auth::check()){
            flash()->addError('Not logged in.');
            return back();
        }
    
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        flash()->addSuccess('Logout successfully');
        return redirect('/');
    }

    public function getAdminForgotPassword(Request $request) {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|confirmed',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'email.exists' => 'Email does not exist',
            'password.required' => 'Password is required',
            'password.min' => 'Password should contain at least 5 characters',
            'password.confirmed' => 'Password confirmation does not match'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // Find the user by email
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            if (strlen($request->password) < 5) {
                flash()->addError('Password should contain at least 5 characters');
                return back()->withInput();
            }
            if (empty($request->email) || empty($request->password)) {
                flash()->addError('All fields are required');
                return back()->withInput();
            }
    
            // Update the user's password
            $user->password = Hash::make($request->password);
            $user->save();
            flash()->addSuccess('Password changed successfully');
           
        } else {
            flash()->addError('User not found');
            return back()->withInput();
        }
    
        return back();
    }
    
        
}