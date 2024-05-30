<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start',
        'end'
    ];

    public function authors(){
        return $this->hasMany(Author::class, 'term_id');
    }

    public function user(){
        return $this-> belongsTo(User::class);
    }


}
