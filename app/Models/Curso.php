<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion', 
        'horario',  
        'valor', 
        'profesor_id'
    ];
    
    public function profesor(){
        return $this->hasOne(Profesor::class,'id','profesor_id');
    }
} 
