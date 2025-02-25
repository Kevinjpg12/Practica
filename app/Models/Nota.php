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
        'periodo',      
    ];

    public function alumno(){
        return $this->hasOne(Alumno::class,'id','alumno_id');
    }

    public function curso(){
        return $this->hasOne(Curso::class,'id','curso_id');
    }
}
