<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Traits\Upload;
use Illuminate\Support\Facades\Validator;

class CreateController extends Controller
{

    use Upload;

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'type' => 'required|different:null',
            'number' => 'required',
            'area' => 'required',
            'date' => 'required|date',
            'authors' => 'required',
            'file' => 'required|mimes:pdf'
        ],
        [
            'title.required' => 'Document title field is required',
            'type.required' => 'Document type is required',
            'type.different' => 'Please select a document type',
            'number.required' => 'Document number is required',
            'date.required' => 'Please select date of enacted or adopted',
            'date.date' => 'Invalid date format',
            'authors.required' => 'Please enter document author',
            'file.required' => 'File is required',
            'files.mimes' => 'Only pdf file is allowed'
        ]);
        if($validator->fails()){
            foreach($validator->messages()->all() as $message){
                flash()->addError($message);
            }
            return back->withInput();
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

        $file_name = $request->type.' no.'.$request->number.' Series of '.date('Y', strtotime($request->date));
        $path = $this->UploadFile($request->file('file'), $file_name, 'Documents', 'public');
        $document_form = [
            'title' => $request->title,
            'type' => $request->type,
            'number' => $request->number,
            'area' => $request->area,
            'date' => date("Y-m-d", strtotime($request->date)),
            'file' =>$path,
        ];
        $document = Document::create($document_form);
        $document->authors()->attach($author_ids);
        flash()->addSuccess('Upload Success');
        return redirect('/');
    }
}
