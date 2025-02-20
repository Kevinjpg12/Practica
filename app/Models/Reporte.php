<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = [
        'alumno_id', 
        'curso_id', 
        'horario',       
        'valor',       
    ];

    public function alumno(){
        return $this->hasOne(Alumno::class,'id','alumno_id');
    }
    public function curso(){
        return $this->hasOne(VCursoProfesor::class,'id','curso_id');
    }
}
