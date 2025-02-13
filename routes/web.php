<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'login_submit'])->name('login_submit');
Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard',                 [DashboardController::class,'dashboard'])->name('dashboard');
});
