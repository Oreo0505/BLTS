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
        $document->type = $request->type == 'Others' ? $request->specific : $request->type;
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

        $captain = Author::where('term_id',$request->id)->where('position','Captain')->first();
        $secretary = Author::where('term_id',$request->id)->where('position','Secretary')->first();
        $chairman = Author::where('term_id',$request->id)->where('position','SK Chairman')->first();
        $sb_member_1 = Author::where('term_id',$request->id)->where('position','SB Member 1')->first();
        $sb_member_2 = Author::where('term_id',$request->id)->where('position','SB Member 2')->first();
        $sb_member_3 = Author::where('term_id',$request->id)->where('position','SB Member 3')->first();
        $sb_member_4 = Author::where('term_id',$request->id)->where('position','SB Member 4')->first();
        $sb_member_5 = Author::where('term_id',$request->id)->where('position','SB Member 5')->first();
        $sb_member_6 = Author::where('term_id',$request->id)->where('position','SB Member 6')->first();
        $sb_member_7 = Author::where('term_id',$request->id)->where('position','SB Member 7')->first();

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

        if($sb_member_1->name != $request->sb1){
            $sb_member_1->name = $request->sb1;
            $sb_member_1->save();
        }

        if($sb_member_2->name != $request->sb2){
            $sb_member_2->name = $request->sb2;
            $sb_member_2->save();
        }

        if($sb_member_3->name != $request->sb3){
            $sb_member_3->name = $request->sb3;
            $sb_member_3->save();
        }

        if($sb_member_4->name != $request->sb4){
            $sb_member_4->name = $request->sb4;
            $sb_member_4->save();
        }

        if($sb_member_5->name != $request->sb5){
            $sb_member_5->name = $request->sb5;
            $sb_member_5->save();
        }

        if($sb_member_6->name != $request->sb6){
            $sb_member_6->name = $request->sb6;
            $sb_member_6->save();
        }

        if($sb_member_7->name != $request->sb7){
            $sb_member_7->name = $request->sb7;
            $sb_member_7->save();
        }

        flash()->addSuccess('Profile Successfully Updated!');
        return back();
    }
}
