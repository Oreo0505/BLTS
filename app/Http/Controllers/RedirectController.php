<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Models\Term;
use App\Models\Config;

class RedirectController extends Controller
{
    public function redirectToHomepage(){
        $config = Config::first();
        if($config->first_time){
            return redirect('/setup');
        }

        $current_term = Term::find($config->current_term);
        $start = $current_term->start;
        $end = $current_term->end;
        $documents = Document::with('authors')->whereBetween('date',[$start, $end])->get();
        $authors = Author::where('term_id', $current_term->id)->whereNot('position','Secretary')->get();
        return view('welcome',[
            'documents' => $documents,
            'authors' => $authors
        ]);
    }

    public function redirectToSetupPage(){
        $config = Config::first();
        if(!$config->first_time){
            flash()->addError('First time set-up completed');
            return redirect('/');
        }
        return view('setup');
    }

    public function redirectToRenewPage(){
        return view('renew');
    }
}
