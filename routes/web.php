<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas con autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    
    // Rutas para Atracciones
    Route::get('atracciones', [WebController::class, 'indexAtracciones'])->name('atracciones.index');
    
    // Rutas para Comentarios
    Route::get('comentarios', [WebController::class, 'indexComentarios'])->name('comentarios.index');
    Route::get('comentarios/entre/{min}/{max}', [WebController::class, 'comentariosEntreValores'])->name('comentarios.entre');
    Route::get('comentarios/cantidad/{id_atraccion}', [WebController::class, 'cantidadComentariosDeAtraccion'])->name('comentarios.cantidad');
    
    // Rutas para Especies
    Route::get('especies', [WebController::class, 'indexEspecies'])->name('especies.index');
    Route::get('especies/{id_especie}/atracciones', [WebController::class, 'atraccionesPorEspecie'])->name('especies.atracciones');
    Route::get('especies/{id_especie}/calificacion_promedio', [WebController::class, 'calificacionPromedioPorEspecie'])->name('especies.calificacion_promedio');
});

// Rutas de autenticación
Auth::routes();
