<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Author;
use App\Models\Term;
use App\Models\Config;

class FetchController extends Controller
{
    public function getDocument(Request $request){
        $document = Document::where('id', $request->id)->with('authors')->first();
        return response()->json([
            'id' => $document->id,
            'title' => $document->title,
            'type' => $document->type,
            'number' => $document->number,
            'area' => $document->area,
            'date' => $document->date,
            'file' => $document->file,
            'authors' => $document->authors->pluck('name'),
            'term' => date('Y', strtotime($document->term->start)).'-'.date('Y', strtotime($document->term->end))
        ]);
    }

    function getAuthors(Request $request){
        if($request->value == 'all'){
            $authors = Author::orderBy('name', 'asc')->get()->unique('name');
        }
        else if($request->value == 'older'){
            $authors = Author::where('term_id',0)->orderBy('name','asc')->get();
        }
        else if($request->value == 'current'){
            $config = Config::first();
            $authors = Author::where('term_id',$config->current_term)->orderBy('name','asc')->get();   
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

    function getTerm(Request $request){
        if($request->value == 'current'){
            $config = Config::first();
            $current_term = Term::find($config->current_term);
        }
        else{
            $date = explode('-',$request->value);
            $current_term = Term::whereYear('start',$date[0])->whereYear('end',$date[1])->first();
        }
        return response()->json([
            'term' => $current_term
        ]);
    }
}
