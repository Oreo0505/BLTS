<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class RestoreController extends Controller
{
    public function restore(Request $request){
        $user = Auth::user();
        if (!$user){
            flash()->addError('You need to logged in to restore documents');
            return redirect('/login');
        }
        Document::where('user_id', $user->id)->with('authors')->withTrashed()->where('id', $request->id)->restore();
        flash()->addSuccess('Document restored successfully!');
        return back();
    }
}
