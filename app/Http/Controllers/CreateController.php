<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Models\Term;
use App\Models\Config;
use App\Models\User;
use App\Traits\Upload;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{

    use Upload;

    public function createDocument(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
    
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'type' => 'required|different:null',
            'number' => 'required',
            'area' => 'required',
            'date' => 'required|date',
            'file' => 'required|mimes:pdf'
        ], [
            'title.required' => 'Document title field is required',
            'type.required' => 'Document type is required',
            'type.different' => 'Please select a document type',
            'number.required' => 'Document number is required',
            'date.required' => 'Please select date of enacted or adopted',
            'date.date' => 'Invalid date format',
            'file.required' => 'File is required',
            'file.mimes' => 'Only pdf file is allowed'
        ]);
    
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $current_term = Term::where('user_id', $user_id)->find($user->current_term);
        if (!$current_term) {
            $current_term = Term::where('user_id', $user_id)->first();
            if ($current_term) {
                $user->current_term = $current_term->id;
                $user->save();
            }
        }
        $authors = $current_term ? Author::where('user_id', $user_id)->where('term_id', $current_term->id)->get() : [];
        // $authors = Author::where('term_id', $current_term->id)->get();
    
        $author_ids = [];
        if($request->authors != null){
            $authors_input = explode(',', $request->authors);
            
            foreach($authors_input as $author){
                $temp = Author::where('user_id', $user_id)->where('name', ucwords($author))->first();
                if($temp == null){
                    $author_form = [
                        'name' => ucwords($author),
                        'user_id' => $user_id,
                        'position' => 'Other',
                        'term_id' => $current_term ? $current_term->id : null
                    ];
                    $new_author = Author::create($author_form);
                    array_push($author_ids, $new_author->id);
                } else {
                    array_push($author_ids, $temp->id);
                }
            }
        }
    
        $file_name = date('Y_m_d_H_i_s') . Str::random(10);
        $path = $this->UploadFile($request->file('file'), $file_name, 'Documents', 'public');
    
        $document_form = [
            'user_id' => $user_id,
            'title' => $request->title,
            'type' => $request->type == 'Others' ? ucwords($request->specific) : $request->type,
            'number' => $request->number,
            'area' => $request->area,
            'date' => date("Y-m-d", strtotime($request->date)),
            'file' => $path,
        ];
    
        $document = Document::create($document_form);
        $document->authors()->attach($author_ids);
    
        flash()->addSuccess('Upload Success');
        return back();
    }

    public function createTerm(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
    
        $validator = Validator::make($request->all(), [
            'captain' => 'required|min:3',
            'secretary' => 'required|min:3',
            'from' => 'required|date|before:now',
            'to' => 'required|date|after:from',
            'sb1' => 'required|min:3',
            'sb2' => 'required|min:3',
            'sb3' => 'required|min:3',
            'sb4' => 'required|min:3',
            'sb5' => 'required|min:3',
            'sb6' => 'required|min:3',
            'sb7' => 'required|min:3',
            'chairman' => 'required|min:3'
        ], [
            'captain.required' => 'Barangay captain field is required',
            'captain.min' => 'Barangay captain name should contain 3 or more character',
            'secretary.required' => 'Barangay secretary field is required',
            'secretary.min' => 'Barangay secretary name should contain 3 or more character',
            'from.required' => 'Term start date is required',
            'from.date' => 'Invalid date format',
            'from.before' => 'You can\'t add term for the future',
            'to.required' => 'Term end date is required',
            'to.date' => 'Invalid date format',
            'to.after' => 'Term end date should be later than term start date',
            'sb1.required' => 'Sanggunian Member 1 is required',
            'sb1.min' => 'Sanggunian Member 1 name should contain 3 or more character',
            'sb2.required' => 'Sanggunian Member 2 is required',
            'sb2.min' => 'Sanggunian Member 2 name should contain 3 or more character',
            'sb3.required' => 'Sanggunian Member 3 is required',
            'sb3.min' => 'Sanggunian Member 3 name should contain 3 or more character',
            'sb4.required' => 'Sanggunian Member 4 is required',
            'sb4.min' => 'Sanggunian Member 4 name should contain 3 or more character',
            'sb5.required' => 'Sanggunian Member 5 is required',
            'sb5.min' => 'Sanggunian Member 5 name should contain 3 or more character',
            'sb6.required' => 'Sanggunian Member 6 is required',
            'sb6.min' => 'Sanggunian Member 6 name should contain 3 or more character',
            'sb7.required' => 'Sanggunian Member 7 is required',
            'sb7.min' => 'Sanggunian Member 7 name should contain 3 or more character',
            'chairman.required' => 'SK Chairman is required',
            'chairman.min' => 'SK Chairman name should contain 3 or more character'
        ]);
    
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }
    
        $check_term = Term::where('user_id', $user_id)->where('start', date("Y-m-d", strtotime($request->from)))->where('end', date("Y-m-d", strtotime($request->to)))->get();
    
        if($check_term->isNotEmpty()){
            flash()->addError('Profile already exists');
            return back();
        }
    
        $term_form = [
            'start' => date("Y-m-d", strtotime($request->from)),
            'end' => date("Y-m-d", strtotime($request->to)),
            'user_id' => $user_id
        ];
    
        $term = Term::create($term_form);
    
        $captain_form = [
            'name' => $request->captain,
            'user_id' => $user_id,
            'position' => 'Captain',
            'term_id' => $term->id
        ];
        Author::create($captain_form);
    
        $secretary_form = [
            'name' => $request->secretary,
            'user_id' => $user_id,
            'position' => 'Secretary',
            'term_id' => $term->id
        ];
        Author::create($secretary_form);
    
        $sb_members = [
            $request->sb1,
            $request->sb2,
            $request->sb3,
            $request->sb4,
            $request->sb5,
            $request->sb6,
            $request->sb7,
        ];
    
        foreach($sb_members as $i => $sb_member){
            $sb_form = [
                'name' => $sb_member,
                'user_id' => $user_id,
                'position' => 'SB Member ' . ($i + 1),
                'term_id' => $term->id
            ];
            Author::create($sb_form);
        }
    
        $chairman_form = [
            'name' => $request->chairman,
            'user_id' => $user_id,
            'position' => 'SK Chairman',
            'term_id' => $term->id
        ];
        Author::create($chairman_form);
    
        flash()->addSuccess('Profile added successfully');
        return redirect('/profile');
    }
}
