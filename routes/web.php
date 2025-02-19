<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'login_submit'])->name('login_submit');
Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard',                 [DashboardController::class,'dashboard'])->name('dashboard');
    //Route::get('/dashboard', [ClienteController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'maestro'], function (){
        Route::resource('profesor', ProfesorController::class, ['names' => 'profesores']);   
    }); 

    Route::group(['prefix' => 'estudiante'], function (){
        Route::resource('alumno', AlumnoController::class, ['names' => 'alumnos']);   
    }); 
//curso
    Route::group(['prefix' => 'cursosa'], function (){
        Route::resource('curso', CursoController::class, ['names' => 'cursos']);   
    }); 
//asignatura
    // Route::group(['prefix' => 'boleta'], function (){
    //     Route::resource('asignatura', CursoController::class, ['names' => 'asignaturas']);   
    // }); 

    Route::group(['prefix' => 'Plantilla'], function (){
        Route::resource('nota', NotaController::class, ['names' => 'notas']);   
    }); 

    Route::group(['prefix' => 'Report'], function (){
        Route::resource('reporte', NotaController::class, ['names' => 'reportes']);   
    }); 

    Route::group(['prefix' => 'ajax'], function (){
        Route::post('alumnos', [AlumnoController::class,'ajax_alumno'])->name('ajax_alumno');
    });

});   
 


