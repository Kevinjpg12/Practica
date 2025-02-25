<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $table = 'notas';
    protected $primaryKey = 'id'; 
    
    protected $fillable = [
        'alumno_id',
        'curso_id',
        'nota'
        ];

    public function alumno(){
        return $this->hasOne(Alumno::class,'id','alumno_id');
    }
    public function curso(){
        return $this->hasOne(VCursoProfesor::class,'id','curso_id');
    }
}
