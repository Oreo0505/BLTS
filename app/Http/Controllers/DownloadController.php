<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    function download($file_name){
        $headers = array(
            'Content-Type' => 'application/pdf'
        );
        $file_path =  public_path('/storage/Documents/'.$file_name);
        return Response::download($file_path, $file_name, $headers);
    }
}
