@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>{{ __('You are logged in!') }}</h3>
                    <p>Select an option to proceed:</p>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('especies.index') }}">Manage Especies</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('atracciones.index') }}">Manage Atracciones</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('comentarios.index') }}">Manage Comentarios</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
