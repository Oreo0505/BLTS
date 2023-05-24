<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Models\Config;
use App\Traits\Upload;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    use Upload;

    public function update(Request $request){
        $validator = Validator::make($request->all(),[
            'id' => 'required|exists:documents,id',
            'title' => 'required',
            'type' => 'required|different:null',
            'number' => 'required',
            'area' => 'required',
            'date' => 'required|date',
            'file' => 'required|mimes:pdf'
        ],
        [
            'id.required' => 'Id is required',
            'id.exist' => 'Id does not exist',
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

        $author_ids = [];
        if($request->authors != null){
            $authors = explode(',', $request->authors);
            foreach($authors as $author){
                $temp = Author::where('name',ucwords($author))->first();
                if($temp == null){
                    $author_form = [
                        'name' => ucwords($author)
                    ];
                    $new_author = Author::create($author_form);
                    array_push($author_ids, $new_author->id);
                }
                else{
                    array_push($author_ids, $temp->id);
                }
            }
        }

        $document = Document::where('id', $request->id)->first();
        $document->title = $request->title;
        $document->type = $request->type;
        $document->number = $request->number;
        $document->area = $request->area;
        $document->date = date("Y-m-d", strtotime($request->date));
        if(strcmp($document->file, 'Documents/'.$request->file->getClientOriginalName()) != 0){
            $this->deleteFile($document->file);
            $file_name = date('Y_m_d_H_i_s').Str::random(10);
            $path = $this->UploadFile($request->file('file'), $file_name, 'Documents', 'public');
            $document-> file = $path;
        }
        $document->save();
        $document->authors()->sync($author_ids);
        flash()->addSuccess('Update Success');
        return back();
    }

    public function updateProfile(Request $request){
        $validator = Validator::make($request->all(),[
            'captain' => 'required|min:3',
            'secretary' => 'required|min:3',
            'sb1' => 'required|min:3',
            'sb2' => 'required|min:3',
            'sb3' => 'required|min:3',
            'sb4' => 'required|min:3',
            'sb5' => 'required|min:3',
            'sb6' => 'required|min:3',
            'sb7' => 'required|min:3',
            'chairman' => 'required|min:3'
        ],
        [
            'captain.required' => 'Barangay captain field is required',
            'captain.min' => 'Barangay captain name should contain 3 or more character',
            'secretary.required' => 'Barangay secretary field is required',
            'secretary.min' => 'Barangay secretary name should contain 3 or more character',
            'sb1.required' => 'Sanggunian Member 1 is required',
            'sb1.min' => 'Sanggunian Member 1 name shoud contain 3 or more character',
            'sb2.required' => 'Sanggunian Member 2 is required',
            'sb2.min' => 'Sanggunian Member 2 name shoud contain 3 or more character',
            'sb3.required' => 'Sanggunian Member 3 is required',
            'sb3.min' => 'Sanggunian Member 3 name shoud contain 3 or more character',
            'sb4.required' => 'Sanggunian Member 4 is required',
            'sb4.min' => 'Sanggunian Member 4 name shoud contain 3 or more character',
            'sb5.required' => 'Sanggunian Member 5 is required',
            'sb5.min' => 'Sanggunian Member 5 name shoud contain 3 or more character',
            'sb6.required' => 'Sanggunian Member 6 is required',
            'sb6.min' => 'Sanggunian Member 6 name shoud contain 3 or more character',
            'sb7.required' => 'Sanggunian Member 7 is required',
            'sb7.min' => 'Sanggunian Member 7 name shoud contain 3 or more character',
            'chairman.required' => 'SK Chairman is required',
            'chairman.min' => 'SK Chairman name shoud contain 3 or more character'
        ]);
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back()->withInput();
        }

        $config = Config::first();
        $captain = Author::where('term_id',$config->current_term)->where('position','Captain')->first();
        $secretary = Author::where('term_id',$config->current_term)->where('position','Secretary')->first();
        $chairman = Author::where('term_id',$config->current_term)->where('position','SK Chairman')->first();
        $sb_members = Author::where('term_id',$config->current_term)->where('position','SB Member')->get();

        if($captain->name != $request->captain){
            $captain->name = $request->captain;
            $captain->save();
        }

        if($secretary->name != $request->secretary){
            $secretary->name = $request->secretary;
            $secretary->save();
        }

        if($chairman->name != $request->chairman){
            $chairman->name = $request->chairman;
            $chairman->save();
        }

        $new_sb_members = [
            $request->sb1,
            $request->sb2,
            $request->sb3,
            $request->sb4,
            $request->sb5,
            $request->sb6,
            $request->sb7
        ];
        $i = 0;
        foreach($sb_members as $sb_member){
            if($sb_member->name != $new_sb_members[$i]){
                $sb_member->name = $new_sb_members[$i];
                $sb_member->save();
            }
            $i++;
        }

        flash()->addSuccess('Profile Successfully Updated!');
        return back();
    }
}
