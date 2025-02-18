<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfesorController;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

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

    Route::group(['prefix' => 'asignatura'], function (){
        Route::resource('curso', CursoController::class, ['names' => 'cursos']);   
    }); 

    Route::group(['prefix' => 'boleta'], function (){
        Route::resource('nota', CursoController::class, ['names' => 'notas']);   
    }); 

    Route::group(['prefix' => 'siglo'], function (){
        Route::resource('año', CursoController::class, ['names' => 'años']);   
    }); 
});   
 


