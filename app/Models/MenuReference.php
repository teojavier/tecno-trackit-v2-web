<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuReference extends Model
{
    use HasFactory;

    protected $table = 'menu_references';

    protected $fillable = [
        'menu_id',
        'submenu_id',
    ];
}
