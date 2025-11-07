<?php
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegistroController::class, 'inicio']);
Route::get('/registro', [RegistroController::class, 'registro']);
Route::get('/login', [RegistroController::class, 'login']);