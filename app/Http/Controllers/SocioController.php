<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use Illuminate\Http\Request;
use App\Rules\RutValidation;

class SocioController extends Controller
{
    // Mostrar todos los socios
    public function index(Request $request)
    {
        // Crear una instancia de consulta para el modelo Socio
        $query = Socio::query();
    
        // Filtro de búsqueda por nombre, apellidos, RUT o correo
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nombre', 'like', "%{$search}%")
                  ->orWhere('apellidos', 'like', "%{$search}%")
                  ->orWhere('rut', 'like', "%{$search}%")
                  ->orWhere('correo', 'like', "%{$search}%");
        }
    
        // Filtro adicional por estado
        if ($request->filled('status')) {
            $query->where('estado', $request->input('status'));
        }
    
        // Paginar los resultados y cargar relaciones
        $socios = $query->with(['armas', 'vehiculos', 'cursos'])->paginate(10);
    
        // Retornar la vista con los datos paginados
        return view('socios.index', compact('socios'));
    }

    // Mostrar el formulario para crear un nuevo socio
    public function create()
    {
        return view('socios.create');
    }

    // Guardar un nuevo socio
    public function store(Request $request)
    {
        $request->validate([
            'rut' => ['required', 'unique:socios', 'max:12', ], //new RutValidation() Validación personalizada para el RUT
            'nombre' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'nullable|string|max:100',
            'correo' => 'required|email|unique:socios|max:150',
            'fecha_nacimiento' => 'required|date',
            //'direccion_id' => 'nullable|integer',
            'tipo_membresia_id' => 'nullable|integer',
            'fecha_ingreso' => 'nullable|date',
            'fecha_termino' => 'required|date',
            'estado_cuenta' => 'required|boolean',
            //'descripcion' => 'nullable|string',
            //'profesion_id' => 'nullable|integer',
            //'empresa_id' => 'nullable|integer',
            'foto_perfil' => 'nullable|image|max:5120', // Máximo 5MB
        ]);
    
        // Procesar datos antes de guardarlos
        $data = $request->all();
    
        // Manejo de la foto de perfil
        if ($request->hasFile('foto_perfil')) {
            $data['foto_perfil'] = base64_encode(file_get_contents($request->file('foto_perfil')->path()));
        }
    
        // Guardar los datos en la base de datos
        Socio::create($data);
    
        // Redirigir con mensaje de éxito
        return redirect()->route('socios.index')->with('success', 'Socio creado exitosamente.');
    }

    // Mostrar un socio específico
    public function show($id)
    {
        $socio = Socio::findOrFail($id); // Busca el socio por su ID o lanza un error 404
        return view('socios.show', compact('socio')); // Asegúrate de tener la vista 'socios/show.blade.php'
    }
    

    // Mostrar el formulario para editar un socio
    public function edit(Socio $socio)
    {
        return view('socios.edit', compact('socio'));
    }

    // Actualizar un socio existente
    public function update(Request $request, Socio $socio)
    {
        $request->validate([
            'rut' => ['required', 'unique:socios,rut,' . $socio->id], // Exceptuar el RUT actual
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'correo' => 'required|email|unique:socios,correo,' . $socio->id,
            'fecha_nacimiento' => 'nullable|date',
            'estado_cuenta' => 'required|boolean',
            'descripcion' => 'nullable|string',
        ]);
    
        $socio->update($request->all());
    
        return redirect()->route('socios.index')->with('success', 'Socio actualizado correctamente');
    }
    

    // Eliminar un socio (Soft Delete)
    public function destroy(Socio $socio)
    {
        $socio->delete();
        return redirect()->route('socios.index')->with('success', 'Socio eliminado exitosamente.');
    }


    //maneja la subida de imagenes
    public function upload(Request $request)
    {
        $request->validate([
            'foto_perfil' => 'required|image|max:5120', // Validar que sea una imagen y no exceda 5MB
        ]);

        // Almacenar la imagen
        $path = $request->file('foto_perfil')->store('public/fotos_perfil');

        // Retornar la URL de la imagen almacenada
        return response()->json([
            'url' => Storage::url($path),
        ]);
    }
}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                