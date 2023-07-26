<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messenger_type extends Model
{
    use HasFactory;

    protected $table = 'messengers_types';

    protected $fillable = [
        'name',
    ];
}
