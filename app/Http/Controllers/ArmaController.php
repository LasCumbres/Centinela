<?php

namespace App\Http\Controllers;

use App\Models\Arma;
use App\Models\Socio;
use Illuminate\Http\Request;

class ArmaController extends Controller
{
    // Listar todas las armas asociadas a un socio
    public function index($socioId)
    {
        $socio = Socio::with('armas')->findOrFail($socioId);
        $armas = $socio->armas;

        return view('armas.index', compact('socio', 'armas'));
    }

    // Mostrar el formulario para crear un arma
    public function create($socioId)
    {
        $socio = Socio::findOrFail($socioId);

        return view('armas.create', compact('socio'));
    }

    // Guardar un arma asociada a un socio
    public function store(Request $request, $socioId)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'calibre' => 'required|string|max:50',
            'padron' => 'nullable|image|max:5120', // Archivo opcional
        ]);

        $socio = Socio::findOrFail($socioId);

        $data = $request->all();
        $data['socio_id'] = $socio->id;

        if ($request->hasFile('padron')) {
            $data['padron'] = base64_encode(file_get_contents($request->file('padron')->path()));
        }

        Arma::create($data);

        return redirect()->route('armas.index', $socio->id)->with('success', 'Arma registrada exitosamente.');
    }

    // Mostrar un arma específica
    public function show($socioId, $armaId)
    {
        $arma = Arma::where('socio_id', $socioId)->findOrFail($armaId);

        return view('armas.show', compact('arma'));
    }

    // Mostrar el formulario para editar un arma
    public function edit($socioId, $armaId)
    {
        $arma = Arma::where('socio_id', $socioId)->findOrFail($armaId);

        return view('armas.edit', compact('arma'));
    }

    // Actualizar un arma existente
    public function update(Request $request, $socioId, $armaId)
    {
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'calibre' => 'required|string|max:50',
            'padron' => 'nullable|image|max:5120',
        ]);

        $arma = Arma::where('socio_id', $socioId)->findOrFail($armaId);

        $data = $request->all();

        if ($request->hasFile('padron')) {
            $data['padron'] = base64_encode(file_get_contents($request->file('padron')->path()));
        }

        $arma->update($data);

        return redirect()->route('armas.index', $socioId)->with('success', 'Arma actualizada exitosamente.');
    }

    // Eliminar un arma
    public function destroy($socioId, $armaId)
    {
        $arma = Arma::where('socio_id', $socioId)->findOrFail($armaId);
        $arma->delete();

        return redirect()->route('armas.index', $socioId)->with('success', 'Arma eliminada exitosamente.');
    }
}
