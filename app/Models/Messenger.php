<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    use HasFactory;

    protected $table = 'messengers';

    protected $fillable = [
        'conclution',
        'description',
        'date_request',
        'date_accept',
        'date_finish',
        'support_id',
        'client_id',
        'categorie_id',
        'messenger_type_id',
        'messenger_status_id',
        'table',
        'redirect',
    ];

}
