<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $appends = ['term'];

    protected $fillable = [
        'user_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isInCurrentTerm(){
        $user = Auth::user();
        $current_term = Term::where('user_id', $user->id)->find($user->current_term);
        $current = $this->date >= $current_term->start && $this->date <= $current_term->end ? true : false;
        return $current;
    }

    public function getTermAttribute(){
        $date = $this->date;
        $term = Term::where('user_id', $user->id)->where('start','<=',$date)->where('end','>=',$date)->first();
        return $term;
    }
}
