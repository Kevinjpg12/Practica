<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    
    protected $fillable = [
        'nombre', 
        'apellidos', 
        'telefono', 
        'email'
    ];

}
