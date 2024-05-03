<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'term_id',
        'user_id'
    ];

    public function documents(){
        return $this->belongsToMany(Document::class, 'authors_documents', 'authors_id', 'documents_id');
    }

    public function term(){
        return $this->belongsTo(Term::class, 'term_id');
    }

    public function authors(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
