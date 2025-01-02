<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Socio;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    // Listar todos los vehículos asociados a un socio
    public function index($socioId)
    {
        $socio = Socio::with('vehiculos')->findOrFail($socioId);
        $vehiculos = $socio->vehiculos;

        return view('vehiculos.index', compact('socio', 'vehiculos'));
    }

    // Mostrar el formulario para crear un vehículo
    public function create($socioId)
    {
        $socio = Socio::findOrFail($socioId);

        return view('vehiculos.create', compact('socio'));
    }

    // Guardar un vehículo asociado a un socio
    public function store(Request $request, $socioId)
    {
        $request->validate([
            'patente' => 'required|string|max:10',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'color' => 'required|string|max:50',
            'anio' => 'required|integer|digits:4',
        ]);

        $socio = Socio::findOrFail($socioId);

        Vehiculo::create([
            'socio_id' => $socio->id,
            'patente' => $request->input('patente'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'color' => $request->input('color'),
            'anio' => $request->input('anio'),
        ]);

        return redirect()->route('vehiculos.index', $socio->id)->with('success', 'Vehículo registrado exitosamente.');
    }

    // Mostrar un vehículo específico
    public function show($socioId, $vehiculoId)
    {
        $vehiculo = Vehiculo::where('socio_id', $socioId)->findOrFail($vehiculoId);

        return view('vehiculos.show', compact('vehiculo'));
    }

    // Mostrar el formulario para editar un vehículo
    public function edit($socioId, $vehiculoId)
    {
        $vehiculo = Vehiculo::where('socio_id', $socioId)->findOrFail($vehiculoId);

        return view('vehiculos.edit', compact('vehiculo'));
    }

    // Actualizar un vehículo existente
    public function update(Request $request, $socioId, $vehiculoId)
    {
        $request->validate([
            'patente' => 'required|string|max:10',
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'color' => 'required|string|max:50',
            'anio' => 'required|integer|digits:4',
        ]);

        $vehiculo = Vehiculo::where('socio_id', $socioId)->findOrFail($vehiculoId);

        $vehiculo->update([
            'patente' => $request->input('patente'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'color' => $request->input('color'),
            'anio' => $request->input('anio'),
        ]);

        return redirect()->route('vehiculos.index', $socioId)->with('success', 'Vehículo actualizado exitosamente.');
    }

    // Eliminar un vehículo
    public function destroy($socioId, $vehiculoId)
    {
        $vehiculo = Vehiculo::where('socio_id', $socioId)->findOrFail($vehiculoId);
        $vehiculo->delete();

        return redirect()->route('vehiculos.index', $socioId)->with('success', 'Vehículo eliminado exitosamente.');
    }
}
