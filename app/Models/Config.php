<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = [
        'municipality',
        'barangay',
        'logo',
        'first_time',
        'current_term',
        'email',
        'password'
    ];
}
