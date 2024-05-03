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
        dd($credentials);
        if (Auth::attempt($credentials)) {
            // Authentication passed
            $request->session()->regenerate();
            flash()->addSuccess('Login Successfully');
            return redirect()->intended('/');
        }

        // Authentication failed
        flash()->addError('Your Credentials are Incorrect');
        return back();
    }
}
