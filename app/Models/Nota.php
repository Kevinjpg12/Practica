<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = [
        'alumno_id', 
        'curso_id', 
        'nota',       
    ];

    public function alumno(){
        return $this->hasOne(Alumno::class,'id','alumno_id');
    }

    public function curso(){
        return $this->hasOne(Curso::class,'id','curso_id');
    }
}
