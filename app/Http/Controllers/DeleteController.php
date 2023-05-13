<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DeleteController extends Controller
{

    public function delete(Request $request){
        Document::destroy($request->id);
        flash()->addSuccess('Document deleted succesfully');
        return back();
    }
}
