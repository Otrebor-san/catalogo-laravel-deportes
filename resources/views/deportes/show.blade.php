@extends('layouts.app')

@section('content')

<h2 class="mb-4">Detalle del Deporte</h2>

<div class="card shadow">
    <div class="card-body">

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Nombre:</strong>
                <p>{{ $deporte->nombre }}</p>
            </div>

            <div class="col-md-6">
                <strong>Categoría:</strong>
                <p>{{ $deporte->categoria }}</p>
            </div>
        </div>

        <div class="mb-3">
            <strong>Descripción:</strong>
            <p>{{ $deporte->descripcion }}</p>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <strong>País de Origen:</strong>
                <p>{{ $deporte->pais_origen }}</p>
            </div>

            <div class="col-md-6">
                <strong>Cantidad de Jugadores:</strong>
                <p>{{ $deporte->cantidad_jugadores }}</p>
            </div>
        </div>

        <div class="mb-4">
            <strong>Estado:</strong>
            @if($deporte->estado == 'A')
                <span class="badge bg-success">Activo</span>
            @else
                <span class="badge bg-danger">Inactivo</span>
            @endif
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('deportes.index') }}" class="btn btn-secondary">
                Volver
            </a>

            <a href="{{ route('deportes.edit', $deporte->id) }}" class="btn btn-warning">
                Editar
            </a>
        </div>

    </div>
</div>

@endsection