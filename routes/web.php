<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Ruta para mostrar el formulario de login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Ruta para procesar el login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Ruta para mostrar el formulario de registro
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Ruta para procesar el registro
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Ruta para redirigir la raíz al login
Route::get('/', function () {
    return redirect()->route('login');
});

// Ruta protegida del dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');