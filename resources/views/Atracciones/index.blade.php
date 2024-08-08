@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Atracciones</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Especie</th>
                <th>Calificación Promedio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atracciones as $atraccion)
            <tr>
                <td>{{ $atraccion->titulo }}</td>
                <td>{{ $atraccion->descripcion }}</td>
                <td>{{ $atraccion->especie->nombre }}</td>
                <td>{{ $atraccion->calificacion_promedio }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
