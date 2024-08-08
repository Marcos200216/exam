<?php
namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Especie;
use App\Models\Atraccion;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // Guardar Comentario
    public function guardarComentario(Request $request)
    {
        $comentario = new Comentario($request->all());
        $comentario->save();
        return response()->json($comentario, 201);
    }

    // Listar Especies
    public function listarEspecies()
    {
        $especies = Especie::all();
        return response()->json($especies);
    }

    // Obtener la Especie de una Atracción dada
    public function especieDeAtraccion($id_atraccion)
    {
        $atraccion = Atraccion::find($id_atraccion);
        if ($atraccion) {
            $especie = $atraccion->especie;
            return response()->json($especie);
        }
        return response()->json(['message' => 'Atraccion no encontrada'], 404);
    }

    // Editar Atracción
    public function editarAtraccion(Request $request, $id)
    {
        $atraccion = Atraccion::find($id);
        if ($atraccion) {
            $atraccion->update($request->all());
            return response()->json($atraccion);
        }
        return response()->json(['message' => 'Atraccion no encontrada'], 404);
    }
}
