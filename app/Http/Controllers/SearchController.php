<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Models\Term;
use App\Models\Config;

class SearchController extends Controller
{
    public function search(Request $request){
        $config = Config::first();
        if($config->first_time){
            return redirect('/setup');
        }

        $current_term = Term::find($config->current_term);
        if(date('Y-m-d') > $current_term->end){
            return redirect('/renew');
        }

        if($request->has('search')){
            $collection = [];
            $search = strtoupper($request->search);
            $search_by = $request->search_by;
            $year = $request->year;
            $area = $request->area;
            if($search_by == 'title'){
                $documents_query = Document::with('authors')->where('title', 'like', '%'.$search.'%');
                if($request->year != 'all'){
                    $date = explode('-',$request->year);
                    $term = Term::whereYear('start',$date[0])->whereYear('end',$date[1])->first();
                    $documents_query = $documents_query->whereBetween('date', [$term->start, $term->end]); 
                }
                else if($request->year == 'older'){
                    $documents_query = $documents_query->where('date','<',Term::first()->start);
                }
                if($request->area != 'all'){
                    $documents_query = $documents_query->where('area', $request->area);
                }
                if($request->has('code_of_ordinance') || $request->has('ordinance') || $request->has('resolution') || $request->has('others')){
                    $parameters = [];
                    foreach($request->all() as $key=>$value){
                        if($value == 'on'){
                            $parameters[$key] = $value;
                        }
                        $keys = array_keys($parameters);
                    }
                    if(count($keys) <= 1){
                        $documents_query->where(function($query) use ($keys){
                            $query->where('type',ucwords($keys[0]));
                        });
                    }
                    else{
                        $documents_query->where(function($query) use ($keys){
                            $query->where('type', ucwords($keys[0]));
                            for($i = 1; $i < count($keys); $i++){
                                $query->orWhere('type',ucwords($keys[$i]));
                            }
                        });
                    }
                }
            }
            else{
                $authors = Author::with('documents')->where('name','like','%'.$search.'%')->get();
                foreach($authors as $author){
                    $documents_query = $author->documents();
                    if($request->year != 'all' && $request->year != 'older'){
                        $date = explode('-',$request->year);
                        $term = Term::whereYear('start',$date[0])->whereYear('end',$date[1])->get();
                        $documents_query = $documents_query->whereBetween('date',[$term->start, $term->end]);
                    }
                    else if($request->year == 'older'){
                        $documents_query = $documents_query->where('date','<',Term::first()->start);
                    }
                    if($request->area != 'all'){
                        $documents_query = $documents_query->where('area',$request->area);
                    }
                    if($request->has('code_of_ordinance') || $request->has('ordinance') || $request->has('resolution') || $request->has('others')){
                        $parameters = [];
                        foreach($request->all() as $key=>$value){
                            if($value == 'on'){
                                $parameters[$key] = $value;
                            }
                            $keys = array_keys($parameters);
                        }
                        if(count($keys) <= 1){
                            $documents_query->where(function($query) use ($keys){
                                $query->where('type',ucwords($keys[0]));
                            });
                        }
                        else{
                            $documents_query->where(function($query) use ($keys){
                                $query->where('type', ucwords($keys[0]));
                                for($i = 1; $i < count($keys); $i++){
                                    $query->orWhere('type',ucwords($keys[$i]));
                                }
                            });
                        }
                    }
                }
            }
        }

        $start = $current_term->start;
        $end = $current_term->end;

        if($request->has('filter')){
            $filter = explode('-', $request->filter);
            $documents = $documents_query->orderBy($filter[0],$filter[1])->get();
        }
        else{
            $documents = $documents_query->get();
        }
        $authors = Author::where('term_id', $current_term->id)->whereNot('position','Secretary')->get();

        $terms = Term::all();

        return view('results',[
            'barangay' => $config->barangay,
            'municipality' => $config->municipality,
            'logo' => $config->logo,
            'documents' => $documents,
            'authors' => $authors,
            'terms' => $terms
        ]);
    }
}
