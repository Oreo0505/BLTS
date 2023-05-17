<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Models\Config;

class RedirectController extends Controller
{
    public function redirectToHomepage(){
        $config = Config::first();
        if($config->first_time){
            return redirect('/setup');
        }

        $documents = Document::with('authors')->get();
        return view('welcome',[
            'documents' => $documents
        ]);
    }

    public function redirectToSetupPage(){
        return view('setup');
    }
}
