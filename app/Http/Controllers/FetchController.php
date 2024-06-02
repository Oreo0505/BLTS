<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Author;
use App\Models\Term;
use App\Models\Config;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DateTime;

class FetchController extends Controller
{
    public function getDocument(Request $request){
        $document = Document::where('user_id', $user_id)->where('id', $request->id)->with('authors')->first();
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
        $user = Auth::user();
        $user_id = Auth::id();
        if($request->value == 'all'){
            $authors = Author::where('user_id', $user_id)->whereNot('position','Secretary')->orderBy('name', 'asc')->get()->unique('name');
        }
        else if($request->value == 'older'){
            $authors = Author::where('user_id', $user_id)->where('term_id',0)->whereNot('position','Secretary')->orderBy('name','asc')->get();
        }
        else if($request->value == 'current'){

            $authors = Author::where('user_id', $user_id)->where('term_id',$config->current_term)->whereNot('position','Secretary')->orderBy('name','asc')->get();   
        }
        else{
            $date = explode('-',$request->value);
            $term = Term::where('user_id', $user_id)->whereYear('start',$date[0])->whereYear('end',$date[1])->first();
            $authors = Author::where('user_id', $user_id)->where('term_id',$term->id)->whereNot('position','Secretary')->orderBy('name','asc')->get();
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
        $user = Auth::user();
        $user_id = Auth::id();
        if($request->value == 'current'){
            
            $current_term = Term::where('user_id', $user_id)->find($user->current_term);
        }
        else{
            $date = explode('-',$request->value);
            $current_term = Term::where('user_id', $user_id)->whereYear('start',$date[0])->whereYear('end',$date[1])->first();
        }
        return response()->json([
            'term' => $current_term
        ]);
    }
        

    public function getBarangayStatistics(Request $request) {
        $document_count = [];
        $municipality = ucwords(Auth::user()->municipality);
        
        if (in_array($municipality, ['Boac', 'Mogpog', 'Gasan', 'Buenavista', 'Sta.Cruz', 'Torrijos'])) {
            // Retrieve and count users in the specified municipality
            $users_count = User::where('municipality', $municipality)
                ->whereNotNull('barangay')
                ->where('barangay', '!=', '')
                ->count();
    
            // Group documents by type and count them
            $documents = Document::whereHas('user', function($query) use ($municipality) {
                    $query->where('municipality', $municipality);
                })
                ->selectRaw('type, count(*) as count')
                ->groupBy('type')
                ->pluck('count', 'type');
    
            // Check if no documents exist
            if ($documents->isEmpty()) {
                // Return an empty dataset or a response indicating no data
                return response()->json(['error' => 'No documents found for the selected time period'], 404);
            }
    
            // Prepare the response data
            $document_count = [
                'municipality' => $municipality,
                'users_count' => $users_count,
                'documents' => $documents
            ];
        } else {
            return response()->json(['error' => 'Invalid municipality'], 400);
        }
    
        return response()->json($document_count);
    }
    
       
    
    
    

}
