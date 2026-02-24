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
<h2 class="mb-4">Nuevo Deporte</h2>

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('deportes.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción:</label>
                <input type="text" name="descripcion" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Categoría:</label>
                <input type="text" name="categoria" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">País de Origen:</label>
                <input type="text" name="pais_origen" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Cantidad de Jugadores:</label>
                <input type="number" name="cantidad_jugadores" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('deportes.index') }}" class="btn btn-secondary">
                    Volver
                </a>

                <button type="submit" class="btn btn-success">
                    Guardar
                </button>
            </div>

        </form>

    </div>
</div>

@endsection