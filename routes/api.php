<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['authsanctum'])->group(function () {
    Route::post('comentarios', [ApiController::class, 'guardarComentario']);
    Route::get('especies', [ApiController::class, 'listarEspecies']);
    Route::get('atracciones/{id}/especie', [ApiController::class, 'especieDeAtraccion']);
    Route::put('atracciones/{id}', [ApiController::class, 'editarAtraccion']);
});
