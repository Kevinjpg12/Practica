<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = [
        'nombre', 
        'apellidos', 
        'telefono', 
        'email'
    ];
}
