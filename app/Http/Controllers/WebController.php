<?php
namespace App\Http\Controllers;

use App\Models\Atraccion;
use App\Models\Comentario;
use App\Models\Especie;
use Illuminate\Http\Request;

class WebController extends Controller
{
    // Mostrar la lista de Atracciones con su calificación promedio
    public function indexAtracciones()
    {
        $atracciones = Atraccion::with('especie')->get()->map(function ($atraccion) {
            $atraccion->calificacion_promedio = $atraccion->comentarios->avg('calificacion');
            return $atraccion;
        });

        return view('atracciones.index', compact('atracciones'));
    }

    // Mostrar la lista de Comentarios
    public function indexComentarios()
    {
        $comentarios = Comentario::all();
        return view('comentarios.index', compact('comentarios'));
    }

    // Mostrar la lista de Especies
    public function indexEspecies()
    {
        $especies = Especie::all();
        return view('especies.index', compact('especies'));
    }

    // Obtener Comentarios con calificación entre dos valores dados
    public function comentariosEntreValores($min, $max)
    {
        $comentarios = Comentario::whereBetween('calificacion', [$min, $max])->get();
        return view('comentarios.index', compact('comentarios'));
    }

    // Obtener la cantidad de Comentarios de una Atracción
    public function cantidadComentariosDeAtraccion($id_atraccion)
    {
        $cantidad = Comentario::where('id_atraccion', $id_atraccion)->count();
        return response()->json(['cantidad' => $cantidad]);
    }

    // Lista de Atracciones que exhiben una Especie
    public function atraccionesPorEspecie($id_especie)
    {
        $atracciones = Atraccion::where('id_especie', $id_especie)->get();
        return view('especies.atracciones', compact('atracciones'));
    }

    // Calificación promedio de todas las Atracciones que exhiben una Especie
    public function calificacionPromedioPorEspecie($id_especie)
    {
        $calificacion_promedio = Atraccion::where('id_especie', $id_especie)
            ->with('comentarios')
            ->get()
            ->avg('comentarios.calificacion');

        return response()->json(['calificacion_promedio' => $calificacion_promedio]);
    }
}
