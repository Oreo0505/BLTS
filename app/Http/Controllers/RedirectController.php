<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Models\Term;
use App\Models\Config;

class RedirectController extends Controller
{
    public function redirectToHomepage(Request $request){
        $config = Config::first();
        if($config->first_time){
            return redirect('/setup');
        }

        $current_term = Term::find($config->current_term);
        if(date('Y-m-d') > $current_term->end){
            return redirect('/renew');
        }

        $start = $current_term->start;
        $end = $current_term->end;
        if($request->has('filter')){
            $filter = explode('-', $request->filter);
            $documents = Document::with('authors')->whereBetween('date',[$start, $end])->orderBy($filter[0],$filter[1])->get();
        }
        else{
            $documents = Document::with('authors')->whereBetween('date',[$start, $end])->latest()->get();
        }
        $authors = Author::where('term_id', $current_term->id)->whereNot('position','Secretary')->get();
        return view('welcome',[
            'barangay' => $config->barangay,
            'municipality' => $config->municipality,
            'logo' => $config->logo,
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
        $config = Config::first();
        if($config->first_time){
            flash()->addError('You have to set up an account first!');
            return redirect('/setup');
        }        
        $current_term = Term::find($config->current_term);
        if(date('Y-m-d') < $current_term->end){
            flash()->addError('Administrative Year / Term has not ended yet!');
            return redirect('/');
        }
        return view('renew');
    }
}
