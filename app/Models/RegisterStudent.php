<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterStudent extends Model
{
    use HasFactory;

    protected $table = 'register_students';

    protected $fillable = [
        'email',
        'password',
    ];
}