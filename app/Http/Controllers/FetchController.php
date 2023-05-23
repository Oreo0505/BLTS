<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Term;

class FetchController extends Controller
{
    function getAuthors(Request $request){
        if($request->value == 'all'){
            $authors = Author::orderBy('name', 'asc')->get()->unique('name');
        }
        else if($request->value == 'older'){
            $authors = Author::where('term_id',0)->orderBy('name','asc')->get();
        }
        else{
            $date = explode('-',$request->value);
            $term = Term::whereYear('start',$date[0])->whereYear('end',$date[1])->first();
            $authors = Author::where('term_id',$term->id)->orderBy('name','asc')->get();
        }
        $json = [];
        foreach($authors as $author){
            array_push($json, $author->name);
        }
        return response()->json([
            'authors' => $json
        ]);
    }
}
