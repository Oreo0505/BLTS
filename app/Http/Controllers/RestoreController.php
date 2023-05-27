<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class RestoreController extends Controller
{
    public function restore(Request $request){
        Document::with('authors')->withTrashed()->where('id', $request->id)->restore();
        flash()->addSuccess('Document restored successfully!');
        return back();
    }
}
