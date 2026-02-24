@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2 class="mb-4">Editar Deporte</h2>

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('deportes.update', $deporte->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="{{ $deporte->nombre }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción:</label>
                <input type="text" name="descripcion" class="form-control" value="{{ $deporte->descripcion }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Categoría:</label>
                <input type="text" name="categoria" class="form-control" value="{{ $deporte->categoria }}">
            </div>

            <div class="mb-3">
                <label class="form-label">País de Origen:</label>
                <input type="text" name="pais_origen" class="form-control" value="{{ $deporte->pais_origen }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Cantidad de Jugadores:</label>
                <input type="number" name="cantidad_jugadores" class="form-control" value="{{ $deporte->cantidad_jugadores }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Estado:</label>
                <select name="estado" class="form-select">
                    <option value="A" {{ $deporte->estado == 'A' ? 'selected' : '' }}>Activo</option>
                    <option value="I" {{ $deporte->estado == 'I' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('deportes.index') }}" class="btn btn-secondary">
                    Volver
                </a>

                <button type="submit" class="btn btn-warning">
                    Actualizar
                </button>
            </div>

        </form>

    </div>
</div>

@endsection