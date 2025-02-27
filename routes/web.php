<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ReporteController;
use App\Models\VCursoProfesor;
use App\Models\VPlanillaAlumno;
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
        Route::resource('alumno', AlumnoController::class, ['names' => 'alumnos']);   
        Route::resource('curso', CursoController::class, ['names' => 'cursos']);   
    }); 

   
//asignatura
    // Route::group(['prefix' => 'boleta'], function (){
    //     Route::resource('asignatura', CursoController::class, ['names' => 'asignaturas']);   
    // }); 

    Route::resource('asignacion/manager', AsignacionController::class, ['names' => 'asignacion']);   

    Route::group(['prefix' => 'Plantilla'], function (){
        Route::resource('nota', NotaController::class, ['names' => 'notas']);   
    }); 

    Route::group(['prefix' => 'report'], function (){
        #Route::resource('reporte', NotaController::class, ['names' => 'reportes']);   
        Route::get('reporte1/buscar' , [ReporteController::class,'reporte1_buscar'])->name('reporte1_buscar');
        Route::post('reporte1/buscar' , [ReporteController::class,'reporte1_buscar_submit'])->name('reporte1_buscar_submit');
    }); 

    Route::group(['prefix' => 'ajax'], function (){
        Route::post('alumnos', [AlumnoController::class,'ajax_alumno'])->name('ajax_alumno');
        Route::post('profesor', [ProfesorController::class,'ajax_profesor'])->name('ajax_profesor');
        Route::post('curso', [CursoController::class,'ajax_curso'])->name('ajax_curso');
        Route::post('curso2', [CursoController::class,'ajax_curso2'])->name('ajax_curso2');
        Route::post('planilla', [NotaController::class,'ajax_planilla'])->name('ajax_planilla');
    });

});   
 
 

