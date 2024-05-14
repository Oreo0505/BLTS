<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Config;


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
        
}