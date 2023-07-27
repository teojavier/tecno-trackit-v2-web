<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrearStatu extends Model
{
    use HasFactory;

    protected $table = 'arrear_status';

    protected $fillable = [
        'name',
    ];
}
