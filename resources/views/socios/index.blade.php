@extends('layout')

@section('title', 'Listado de Socios')

@section('content')
<h1>Socios Activos</h1>




<!-- Botón para crear un nuevo socio -->
<div class="mb-3">

    <a href="{{ route('socios.create') }}" class="btn btn-primary">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <i class="fas fa-user-plus"></i>
    </a>
</div>

<!-- Tabla de resultados -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>RUT</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($socios as $socio)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $socio->nombre }} {{ $socio->apellidos }}</td>
            <td>{{ $socio->rut }}</td>
            <td>{{ $socio->correo }}</td>
            <td>{{ $socio->estado }}</td>
            <td>
                <a href="{{ route('socios.show', $socio) }}" class="btn btn-info">Ver</a>
                <a href="{{ route('socios.edit', $socio) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('socios.destroy', $socio) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este socio?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Paginación -->
<div class="d-flex justify-content-center">
    {{ $socios->links() }}
</div>
@endsection
