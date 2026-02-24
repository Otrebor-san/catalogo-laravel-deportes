<?php

namespace App\Http\Controllers;

use App\Models\Deporte;
use Illuminate\Http\Request;

class DeporteController extends Controller
{
    public function index(Request $request)
    {
        $estado = $request->estado;

        if ($estado) {
            $deportes = Deporte::where('estado', $estado)->get();
        } else {
            $deportes = Deporte::all();
        }

        return view('deportes.index', compact('deportes'));
    }

    public function create()
    {
        return view('deportes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'pais_origen' => 'required|string|max:100',
            'cantidad_jugadores' => 'required|integer|min:1'
        ]);

        Deporte::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'pais_origen' => $request->pais_origen,
            'cantidad_jugadores' => $request->cantidad_jugadores,
            'estado' => 'A'
        ]);

        return redirect()->route('deportes.index')
            ->with('success', 'Deporte creado correctamente');
    }

    public function edit($id)
    {
        $deporte = Deporte::findOrFail($id);
        return view('deportes.edit', compact('deporte'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'pais_origen' => 'required|string|max:100',
            'cantidad_jugadores' => 'required|integer|min:1'
        ]);

        $deporte = Deporte::findOrFail($id);

        $deporte->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'pais_origen' => $request->pais_origen,
            'cantidad_jugadores' => $request->cantidad_jugadores,
            'estado' => $request->estado
        ]);

        return redirect()->route('deportes.index')
            ->with('success', 'Deporte actualizado correctamente');
    }

    public function destroy($id)
    {
        $deporte = Deporte::findOrFail($id);
        $deporte->estado = 'I';
        $deporte->save();

        return redirect()->route('deportes.index')
            ->with('success', 'Deporte inactivado correctamente');
    }

    public function show($id)
    {
        $deporte = Deporte::findOrFail($id);
        return view('deportes.show', compact('deporte'));
    }
}