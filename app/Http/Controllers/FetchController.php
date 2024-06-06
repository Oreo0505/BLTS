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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
        $user = Auth::user();
        $municipality = ucwords($user->municipality);
    
        // Ensure the user's municipality is set
        if (empty($municipality)) {
            return response()->json(['error' => 'Municipality attribute not set for the user'], 400);
        }
    
        // Extract the year from the 'value' parameter if provided, otherwise use the current year
        $year = $request->input('year', now()->year);
    
        // Retrieve and group documents by the year they were enacted
        $documents = Document::whereHas('user', function($query) use ($municipality) {
                $query->where('municipality', $municipality);
            })
            ->whereYear('date', $year) // Ensure 'date' is the correct field in the Document model
            ->selectRaw('type, count(*) as count')
            ->groupBy('type')
            ->pluck('count', 'type')
            ->toArray();
    
        // If no documents are found, return an empty documents object
        if (empty($documents)) {
            return response()->json(['documents' => []]);
        }
    
        // Prepare the response data
        $document_count = [
            'documents' => $documents
        ];
    
        return response()->json($document_count);
    }
    
    

    public function getUserCountList(){
        $authenticated_user = Auth::user();

        if (!$authenticated_user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $users = User::where('municipality', $authenticated_user->municipality)->get();
        $barangay_name = $authenticated_user->barangay;

        return response()->json([
            'users' => $users,
            'barangay_name' => $barangay_name,
        ]);
    }


    public function getUsersListTable(Request $request){
        $user = Auth::user();
        $municipality = $user->municipality;
    
        $users_list = [];
        $barangays = User::where('municipality', $municipality)
            ->whereNotNull('barangay')
            ->where('barangay', '!=', '')
            ->get();
            
        foreach ($barangays as $barangay){
            // Decrypt the password before pushing it into the array
            $temp_array = [
                $barangay->barangay,
                $barangay->email,
               
            ];
            array_push($users_list, $temp_array);
        }
        return response()->json([
            'users_list' => $users_list
        ]);
    }

    public function getForgotPassword(Request $request){
        // Validate the request
        $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:8|confirmed',
        ]);

      
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Update the user's password
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect('/login')->with('status', 'Password changed successfully.');
        }

        return back()->with('error', 'User not found.');
    }
    
    
    
}
