<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mora extends Model
{
    use HasFactory;
    protected $table = 'moras';

    protected $fillable = [
        'date_begin',
        'date_end',
        'date_compare',
        'arrear_statu_id',
        'messenger_id',
        'table',
        'redirect',
    ];

    public function arrearStatu()
    {
        return $this->belongsTo(ArrearStatu::class,'arrear_statu_id', 'id');
    }
}
