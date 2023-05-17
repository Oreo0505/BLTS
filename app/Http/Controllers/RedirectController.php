<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;

class RedirectController extends Controller
{
    public function redirectToHomepage(){
        $documents = Document::with('authors')->get();
        return view('welcome',[
            'documents' => $documents
        ]);
    }

    public function redirectToSetupPage(){
        return view('setup');
    }
}
