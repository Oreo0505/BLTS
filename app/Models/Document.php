<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'type',
        'number',
        'area',
        'date',
        'file'
    ];

    public function authors(){
        return $this->belongsToMany(Author::class, 'authors_documents', 'documents_id', 'authors_id');
    }
}
