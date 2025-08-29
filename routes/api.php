<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\CertificadoController;

Route::middleware('auth:sanctum')->group(function () {
    // Rutas de solicitudes
    Route::apiResource('solicitudes', SolicitudController::class);


// Rutas de certificados
    Route::get('certificados', [CertificadoController::class, 'listar']);
    Route::get('certificados/{id}/descargar', [CertificadoController::class, 'descargar']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
