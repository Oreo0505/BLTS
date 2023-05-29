<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Models\Term;
use App\Models\Config;
use App\Traits\Report;

class BrowseController extends Controller
{

    use Report;

    public function browse(Request $request){
        $config = Config::first();
        if($config->first_time){
            return redirect('/setup');
        }

        $current_term = Term::find($config->current_term);
        if(date('Y-m-d') > $current_term->end){
            return redirect('/renew');
        }

        if($request->by == 'type'){
            $documents = Document::with('authors')->where('type', $request->value);
        }
        else if($request->by == 'term'){
            $term = Term::find($request->value);
            $documents = Document::with('authors')->whereBetween('date',[$term->start,$term->end]);
        }
        else if($request->by == 'area'){
            $documents = Document::with('authors')->where('area',$request->value);
        }
        else if($request->by == 'all'){
            $documents = Document::latest()->get();
        }
        else{
            flash()->addError('Invalid Query!');
            return back();
        }

        $start = $current_term->start;
        $end = $current_term->end;

        if($request->by != 'all'){
            if($request->has('filter')){
                $filter = explode('-', $request->filter);
                $documents = $documents->orderBy($filter[0],$filter[1])->get();
            }
            else{
                $documents = $documents->latest()->get();
            }
        }
        else{
            if($request->has('filter')){
                $filter = explode('-', $request->filter);
                $documents = Document::orderBy($filter[0],$filter[1])->get();
            }
        }

        $authors = Author::where('term_id', $current_term->id)->whereNot('position','Secretary')->get();

        $terms = Term::all();

        if($request->by == 'term'){
            $term = Term::find($request->value);
            $start_year = date('Y', strtotime($term->start));
            $end_year = date('Y', strtotime($term->end));
            $term_query = $start_year.'-'.$end_year;
        }
        $filters = [
            'administration' => $request->by != 'term' ? 'All' :  $term_query,
            'type' => $request->by != 'type' ? 'All' : $request->value,
            'area' => $request->by != 'area' ? 'All' : $request->value,
            'authors' => 'All'
        ];
        $this->CreateReport($documents, $filters);

        return view('results',[
            'barangay' => $config->barangay,
            'municipality' => $config->municipality,
            'logo' => $config->logo,
            'documents' => $documents,
            'authors' => $authors,
            'terms' => $terms,
            'query' => $request->value
        ]);
    }
}
