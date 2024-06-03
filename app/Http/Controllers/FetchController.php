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
=======
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

        $json = $authors->pluck('name')->toArray();

        return response()->json([
            'authors' => $json
        ]);
        
    }


    // function getTerm(Request $request){
    //     $user = Auth::user();
    //     $term = Term::where('user_id', $user->id)->first();

   
    //     if($request->value == 'current'){
    //         $terms = User::user()->id;
    //         $current_term = Term::find($terms->current_term);
    //     }
    //     else{
    //         // $date = explode('-',$request->value);
    //         // $current_term = Term::where('user_id', $user->id)->whereYear('start',$date[0])->whereYear('end',$date[1])->first();
    //         $start_date = new \DateTime($current_term['start']);
    //         $end_date = new \DateTime($current_term['end']);

    //         $start_year = $start_date->format('Y');
    //         $end_year = $end_date->format('Y');
    //         $current_term = "$start_year - $end_year";

    //         echo $current_term;
    //     }

      
        
       
    //     return response()->json([
    //         'user' => $user,
    //         'term' => $current_term
    //     ]);
       
    // }

    // function getTerm(Request $request){
    //     $user = Auth::user();
        
    //     if($request->value == 'current'){
    //         $terms = User::user()->id;
    //         dd($user);
    //         $current_term = Term::find($terms->current_term);
    //         dd($current_term);
    //         $start_date = new \DateTime($current_term['start']);
    //         $end_date = new \DateTime($current_term['end']);

    //         $start_year = $start_date->format('Y');
    //         $end_year = $end_date->format('Y');
    //         $current_term = "$start_year - $end_year";
            
    //     }
    //     else{
    //         $date = explode('-',$request->value);
    //         $current_term = Term::whereYear('start',$date[0])->whereYear('end',$date[1])->first();
    //     }
    //     return response()->json([
    //         'user' => $user,
    //         'term' => $current_term
    //     ]);
    // }

  
        
    public function getBarangayStatistics(Request $request) {
        // Extract the year from the date field
        $date = new \DateTime($request->value);
        $year = $date->format('Y');
    
        $municipality = ucwords(Auth::user()->municipality);
    
        // Retrieve and group documents
        $documents = Document::whereHas('user', function($query) use ($municipality) {
                $query->where('municipality', $municipality);
            })
            ->whereYear('created_at', $year)
            ->selectRaw('type, count(*) as count')
            ->groupBy('type')
            ->pluck('count', 'type')
            ->toArray();
    
        if (empty($documents)) {
            return response()->json(['error' => 'No documents found for the selected year'], 404);
        }
    
        // Prepare the response data
        $document_count = [
            'documents' => $documents
        ];
    
        return response()->json($document_count);
    }
    
    
    

    public function getUserCountList(){
           // Get the authenticated user
        $authenticated_user = Auth::user();
        dd($authenticated_user);
        // Ensure the user is authenticated
        if (!$authenticated_user) {
        return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Fetch users from the same municipality
        $users = User::where('municipality', $authenticated_user->municipality)->get();

        // Get the barangay name of the authenticated user
        $barangay_name = $authenticated_user->barangay;

        return response()->json([
        'users' => $users,
        'barangay_name' => $barangay_name,
        ]);
        
        
    }
    
    
    

}
