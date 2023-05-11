<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'number',
        'type',
        'action',
        'author',
        'sponsor',
        'file'
    ];

    public function authors(){
        return $this->belongsToMany(Author::class, 'authors_documents', 'documents_id', 'authors_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'documents_tags', 'documents_id', 'tags_id');
    }
}
