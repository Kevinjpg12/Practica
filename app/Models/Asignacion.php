<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'alumno_id',
        'curso_id',
    ]; 

    public function alumno(){
        return $this->hasOne(Alumno::class,'id','alumno_id');
    }
   
    public function curso(){
        return $this->hasOne(VCursoProfesor::class,'id','curso_id');
        return $this->hasOne(Curso::class,'id','curso_id'); 
    }

}
