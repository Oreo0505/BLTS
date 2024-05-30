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
        // Get the authenticated user
        $user = Auth::user();
        
        if ($request->value == 'all') {
            $authors = Author::where('user_id', $user->id)->whereNot('position', 'Secretary')->orderBy('name', 'asc')->get()->unique('name');
        } else if ($request->value == 'older') {
            $authors = Author::where('user_id', $user->id)
                            ->where('term_id', 0)
                            ->whereNot('position', 'Secretary')
                            ->orderBy('name', 'asc')
                            ->get();
        } else if ($request->value == 'current') {
            $authors = Author::where('user_id', $user->id)
                            ->where('term_id', $user->current_term)
                            ->whereNot('position', 'Secretary')
                            ->orderBy('name', 'asc')
                            ->get();   
        } else {
            $date = explode('-', $request->value);
            
            if (isset($date[0]) && isset($date[1])) {
                $term = Term::whereYear('start', $date[0])->whereYear('end', $date[1])->first();
                if ($term) {
                    $authors = Author::where('user_id', $user->id)
                                    ->where('term_id', $term->id)
                                    ->whereNot('position', 'Secretary')
                                    ->orderBy('name', 'asc')
                                    ->get();
                } else {
                    // Handle case where term is not found
                    $authors = collect(); // empty collection
                }
            } else {
                // Handle invalid date input
                $authors = collect(); // empty collection
            }
        }

        $json = $authors->pluck('name')->toArray();

        return response()->json([
            'authors' => $json
        ]);
    }


    function getTerm(Request $request){
        $user = Auth::user();
        $term = Term::where('user_id', $user->id)->first();

   
        if($request->value == 'current'){
            $terms = User::user()->id;
            $current_term = Term::find($terms->current_term);
        }
        else{
            // $date = explode('-',$request->value);
            // $current_term = Term::where('user_id', $user->id)->whereYear('start',$date[0])->whereYear('end',$date[1])->first();
            $start_date = new \DateTime($current_term['start']);
            $end_date = new \DateTime($current_term['end']);

            $start_year = $start_date->format('Y');
            $end_year = $end_date->format('Y');
            $current_term = "$start_year - $end_year";

            echo $current_term;
        }
        
       
        return response()->json([
            'user' => $user,
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

   