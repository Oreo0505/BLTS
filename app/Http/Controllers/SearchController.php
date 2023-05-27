<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Models\Term;
use App\Models\Config;
use App\Traits\Report;

class SearchController extends Controller
{

    use Report;

    public function search(Request $request){
        $config = Config::first();
        if($config->first_time){
            return redirect('/setup');
        }

        $current_term = Term::find($config->current_term);
        if(date('Y-m-d') > $current_term->end){
            return redirect('/renew');
        }

        $parameters = [];

        if(strlen($request->search) > 0){
            $title_search = strtoupper($request->search);
            $documents_by_title = Document::with('authors')->where('title','like','%'.$title_search.'%');

            $author_search = ucwords($request->search);
            $documents_by_author = Document::with('authors')->whereHas('authors', function(Builder $query) use ($author_search){
                $query->where('name','like','%'.$author_search.'%');
            });

            $authors_filter = explode(',',$request->authors); 
            $documents_by_title->whereHas('authors', function(Builder $query) use ($authors_filter){
                $query->where(function($query) use ($authors_filter){
                    $query->where('name','like','%'.$authors_filter[0].'%');
                    for($i = 1; $i < count($authors_filter); $i++){
                        $query->orWhere('name','like','%'.$authors_filter[$i].'%');
                    }
                });
            });

            if($request->year != 'all'){
                $date = explode('-',$request->year);
                $term = Term::whereYear('start',$date[0])->whereYear('end',$date[1])->first();
                $documents_by_title->whereBetween('date', [$term->start, $term->end]);
                $documents_by_author->whereBetween('date', [$term->start, $term->end]);
            }
            else if($request->year == 'older'){
                $documents_by_title->where('date','<',Term::first()->start);
                $documents_by_author->where('date','<',Term::first()->start);
            }
            if($request->area != 'all'){
                $documents_by_title->where('area', $request->area);
                $documents_by_author->where('area', $request->area);
            }
            if($request->has('code_of_ordinance') || $request->has('ordinance') || $request->has('resolution') || $request->has('others')){
                foreach($request->all() as $key=>$value){
                    if($value == 'on'){
                        $parameters[$key] = $value;
                    }
                    $keys = array_keys($parameters);
                }
                if(count($keys) <= 1){
                    $documents_by_title->where(function($query) use ($keys){
                        $query->where('type',ucwords($keys[0]));
                    });
                    $documents_by_author->where(function($query) use ($keys){
                        $query->where('type',ucwords($keys[0]));
                    });
                }
                else{
                    $documents_by_title->where(function($query) use ($keys){
                        $query->where('type', ucwords($keys[0]));
                        for($i = 1; $i < count($keys); $i++){
                            $query->orWhere('type',ucwords($keys[$i]));
                        }
                    });
                    $documents_by_author->where(function($query) use ($keys){
                        $query->where('type', ucwords($keys[0]));
                        for($i = 1; $i < count($keys); $i++){
                            $query->orWhere('type',ucwords($keys[$i]));
                        }
                    });
                }
            }

            $documents_query = $documents_by_title->union($documents_by_author);
        }
        else{
            $authors_filter = explode(',',$request->authors); 
            $documents_query = Document::whereHas('authors', function(Builder $query) use ($authors_filter){
                $query->where(function($query) use ($authors_filter){
                    $query->where('name','like','%'.$authors_filter[0].'%');
                    for($i = 1; $i < count($authors_filter); $i++){
                        $query->orWhere('name','like','%'.$authors_filter[$i].'%');
                    }
                });
            });

            if($request->year != 'all'){
                $date = explode('-',$request->year);
                $term = Term::whereYear('start',$date[0])->whereYear('end',$date[1])->first();
                $documents_query->whereBetween('date', [$term->start, $term->end]);
            }
            else if($request->year == 'older'){
                $documents_query->where('date','<',Term::first()->start);
            }
            if($request->area != 'all'){
                $documents_query->where('area', $request->area);
            }
            if($request->has('code_of_ordinance') || $request->has('ordinance') || $request->has('resolution') || $request->has('others')){
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

        $filters = [
            'administration' => $request->by != 'term' ? 'All' : $request->value,
            'type' => $request->by != 'type' ? 'All' : $request->value,
            'area' => $request->area,
            'authors' => join(', ',explode(',',$request->authors))
        ];
        $this->CreateReport($documents, $filters);

        return view('results',[
            'barangay' => $config->barangay,
            'municipality' => $config->municipality,
            'logo' => $config->logo,
            'documents' => $documents,
            'authors' => $authors,
            'terms' => $terms,
            'query' => $request->search
        ]);
    }
}
