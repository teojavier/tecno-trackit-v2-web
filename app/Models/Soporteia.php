<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soporteia extends Model
{
    use HasFactory;

    protected $table = 'soporteias';
    protected $fillable = [
        'input',
        'output',
        'user_id',
    ];

}
