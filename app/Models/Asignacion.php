<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $fillable = [
        'alumno_id',
        'profesor_id',
        'curso_id',
    ];

    public function alumno(){
        return $this->hasOne(Alumno::class,'id','alumno_id');
    }

    public function profesor(){
        return $this->hasOne(Profesor::class,'id','profesor_id');
    }

    public function curso(){
        return $this->hasOne(Curso::class,'id','curso_id');
    }

}
