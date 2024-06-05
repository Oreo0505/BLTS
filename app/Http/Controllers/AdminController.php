<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\User;
use Illuminate\Http\Term;
use Illuminate\Http\Author;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function usersList(){
        $user = Auth::user();
        $municipality = $user->municipality;

        $user_count = User::where('municipality', $municipality)
            ->whereNotNull('barangay')
            ->where('barangay', '!=', '')
            ->count();
        dd($user_count);
        $registered_barangays = User::where('municipality', $municipality)
            ->whereNotNull('barangay')
            ->where('barangay', '!=', '')
            ->count();
    

        return view('users_list', [
            'municipality' => $municipality,
            'user_count' => $user_count,
            'registered_barangays' => $registered_barangays
        ]);
    }

    
    

    
}
