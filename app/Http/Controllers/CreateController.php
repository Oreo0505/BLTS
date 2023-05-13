<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;
use App\Models\Tag;

class CreateController extends Controller
{
    public function create(Request $request){   
        $author_ids = [];
        $tag_ids = [];
        $authors = explode(',', $request['upload-author']);
        $tags = explode(',', $request['upload-tags']);

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

        foreach($json['tags'] as $tag){
            $temp = Tag::where('name',ucwords($tag))->first();
            if($temp == null){
                $tag_form = [
                    'name' => ucwords($tag)
                ];
                $new_tag = Tag::create($tag_form);
                array_push($tag_ids, $new_tag->id);
            }
            else{
                array_push($tag_ids, $temp->id);
            }
        }

        $document_form = [
            'title' => $json['title'],
            'date' => $json['date'],
            'number' => $json['number'],
            'action' => $json['action'],
            'sponsor' => $json['sponsor'],
            'file' =>$json['file'],
        ];
        $document = Document::create($document_form);
        $document->authors()->attach($author_ids);
        $document->tags()->attach($tag_ids);
    }
}
