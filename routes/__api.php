<?php
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

// Rutas de la API protegidas con autenticación
Route::middleware(['authapi'])->group(function () {
    Route::post('comentarios', [ApiController::class, 'guardarComentario']);
    Route::get('especies', [ApiController::class, 'listarEspecies']);
    Route::get('atracciones/{id}/especie', [ApiController::class, 'especieDeAtraccion']);
    Route::put('atracciones/{id}', [ApiController::class, 'editarAtraccion']);
});
