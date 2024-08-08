@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Comentarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Calificación</th>
                <th>Detalles</th>
                <th>Atracción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comentarios as $comentario)
            <tr>
                <td>{{ $comentario->nombre_usuario }}</td>
                <td>{{ $comentario->calificacion }}</td>
                <td>{{ $comentario->detalles }}</td>
                <td>{{ $comentario->atraccion->titulo }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
