<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Socio;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Listar todos los cursos registrados
    public function index()
    {
        $cursos = Curso::with('socios')->paginate(10);
        return view('cursos.index', compact('cursos'));
    }

    // Mostrar el formulario para crear un curso
    public function create()
    {
        return view('cursos.create');
    }

    // Guardar un curso nuevo
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
        ]);

        Curso::create($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso registrado exitosamente.');
    }

    // Mostrar un curso específico
    public function show($cursoId)
    {
        $curso = Curso::with('socios')->findOrFail($cursoId);

        return view('cursos.show', compact('curso'));
    }

    // Mostrar el formulario para editar un curso
    public function edit($cursoId)
    {
        $curso = Curso::findOrFail($cursoId);

        return view('cursos.edit', compact('curso'));
    }

    // Actualizar un curso existente
    public function update(Request $request, $cursoId)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
        ]);

        $curso = Curso::findOrFail($cursoId);
        $curso->update($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado exitosamente.');
    }

    // Eliminar un curso
    public function destroy($cursoId)
    {
        $curso = Curso::findOrFail($cursoId);
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente.');
    }

    // Asociar un socio a un curso con fechas de certificación
    public function attachSocio(Request $request, $cursoId)
    {
        $request->validate([
            'socio_id' => 'required|exists:socios,id',
            'fecha_certificacion' => 'required|date',
            'fecha_vencimiento' => 'nullable|date|after_or_equal:fecha_certificacion',
        ]);

        $curso = Curso::findOrFail($cursoId);
        $curso->socios()->attach($request->input('socio_id'), [
            'fecha_certificacion' => $request->input('fecha_certificacion'),
            'fecha_vencimiento' => $request->input('fecha_vencimiento'),
        ]);

        return redirect()->route('cursos.show', $cursoId)->with('success', 'Socio asociado al curso exitosamente.');
    }

    // Desasociar un socio de un curso
    public function detachSocio($cursoId, $socioId)
    {
        $curso = Curso::findOrFail($cursoId);
        $curso->socios()->detach($socioId);

        return redirect()->route('cursos.show', $cursoId)->with('success', 'Socio eliminado del curso exitosamente.');
    }
}
