<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Traits\Upload;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    use Upload;

    public function getData(Request $request){
        $document = Document::where('id', $request->id)->with('authors')->first();
        return response()->json([
            'id' => $document->id,
            'title' => $document->title,
            'type' => $document->type,
            'number' => $document->number,
            'area' => $document->area,
            'date' => $document->date,
            'file' => $document->file,
            'authors' => $document->authors->pluck('name')
        ]);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(),[
            'id' => 'required|exists:documents,id',
            'title' => 'required',
            'type' => 'required|different:null',
            'number' => 'required',
            'area' => 'required',
            'date' => 'required|date',
            'authors' => 'required',
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
            'authors.required' => 'Please enter document author',
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

        $document = Document::where('id', $request->id)->first();
        $document->title = $request->title;
        $document->type = $request->type;
        $document->number = $request->number;
        $document->area = $request->area;
        $document->date = $request->date;
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
}
