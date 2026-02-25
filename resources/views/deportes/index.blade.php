@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Listado de Deportes</h2>
    <a href="{{ route('deportes.create') }}" class="btn btn-primary">
        + Nuevo Deporte
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="mb-3">
    <a href="{{ route('deportes.index') }}" class="btn btn-dark btn-sm">Todos</a>
    <a href="{{ route('deportes.index', ['estado' => 'A']) }}" class="btn btn-success btn-sm">Activos</a>
    <a href="{{ route('deportes.index', ['estado' => 'I']) }}" class="btn btn-danger btn-sm">Inactivos</a>
</div>

<form method="GET" action="{{ route('deportes.index') }}" class="mb-3">
    <div class="row">
        <div class="col-md-4">
            <input 
                type="text" 
                name="buscar" 
                class="form-control" 
                placeholder="Buscar por nombre..."
                value="{{ request('buscar') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">
                🔍 Buscar
            </button>
        </div>
    </div>
</form>

<table class="table table-bordered table-hover bg-white shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>País</th>
            <th>Jugadores</th>
            <th>Estado</th>
            <th width="200">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($deportes as $deporte)
        <tr>
            <td>{{ $deporte->id }}</td>
            <td>{{ $deporte->nombre }}</td>
            <td>{{ $deporte->categoria }}</td>
            <td>{{ $deporte->pais_origen }}</td>
            <td>{{ $deporte->cantidad_jugadores }}</td>
            <td>
                @if($deporte->estado == 'A')
                    <span class="badge bg-success">Activo</span>
                @else
                    <span class="badge bg-danger">Inactivo</span>
                @endif
            </td>
            <td>
                <a href="{{ route('deportes.show', $deporte->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('deportes.edit', $deporte->id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('deportes.destroy', $deporte->id) }}" 
                    method="POST" 
                    style="display:inline;"
                    onsubmit="return confirm('¿Seguro que deseas inactivar {{ $deporte->nombre }}?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">
                        🗑 Inactivar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection