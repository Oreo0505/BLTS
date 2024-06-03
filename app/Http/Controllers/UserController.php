<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\User;
use Illuminate\Http\Term;
use Illuminate\Http\Author;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function usersList(){
        $user = Auth::user();
        $municipality = $user->municipality;

        return view('users_list', [
            'municipality' => $municipality
        ]);
    }
}
