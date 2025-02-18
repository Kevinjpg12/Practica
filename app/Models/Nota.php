<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = [
        'descripcion', 
        'horario', 
        'valor', 
        'profesor'
    ];
}
