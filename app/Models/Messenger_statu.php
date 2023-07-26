<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messenger_statu extends Model
{
    use HasFactory;

    protected $table = 'messengers_status';

    protected $fillable = [
        'name',
    ];
}
