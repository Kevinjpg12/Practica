<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumno_id', 
        'curso_id', 
        'nota',      
    ];

    public function alumno(){
        return $this->hasOne(Alumno::class,'id','alumno_id');
    }

    public function curso(){
        return $this->hasOne(VPlanillaAlumno::class,'id','curso_id');
        return $this->hasOne(VCursoProfesor::class,'id','curso_id');
        return $this->hasOne(Curso::class,'id','curso_id');
    }
}
