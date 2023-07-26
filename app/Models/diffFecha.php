<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diffFecha extends Model
{
    use HasFactory;

    protected $fillable = [
        'anio',
        'mes',
        'dia',
        'hora',
        'min',
        'seg'
    ];
}
