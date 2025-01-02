@extends('layout')

@section('title', 'Crear Nuevo Socio')

@section('content')
<h1>Crear Nuevo Socio</h1>

<!-- Mostrar errores de validación -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Formulario de creación -->
<form action="{{ route('socios.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="foto_perfil" class="form-label">Foto de Perfil</label>
        <input type="file" name="foto_perfil" id="foto_perfil" class="form-control">
    </div>

    <div class="mb-3">
        <label for="rut" class="form-label">RUT</label>
        <input type="text" name="rut" id="rut" class="form-control" value="{{ old('rut') }}" required>
    </div>

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
    </div>

    <div class="mb-3">
        <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
        <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{ old('apellido_paterno') }}" required>
    </div>

    <div class="mb-3">
        <label for="apellido_materno" class="form-label">Apellido Materno</label>
        <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="{{ old('apellido_materno') }}" required>
    </div>

    <div class="mb-3">
        <label for="correo" class="form-label">Correo Electrónico</label>
        <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo') }}" required>
    </div>

    <div class="mb-3">
        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}">
    </div>


    <div class="mb-3">
        <label for="tipo_membresia_id" class="form-label">Tipo de Membresía (ID)</label>
        <input type="number" name="tipo_membresia_id" id="tipo_membresia_id" class="form-control" value="{{ old('tipo_membresia_id') }}">
    </div>

    <div class="mb-3">
        <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" value="{{ old('fecha_ingreso') }}">
    </div>

    <div class="mb-3">
        <label for="fecha_termino" class="form-label">Fecha de Término</label>
        <input type="date" name="fecha_termino" id="fecha_termino" class="form-control" value="{{ old('fecha_termino') }}">
    </div>

    <div class="mb-3">
        <label for="estado_cuenta" class="form-label">Estado de Cuenta</label>
        <select name="estado_cuenta" id="estado_cuenta" class="form-control">
            <option value="">Seleccione un estado</option>
            <option value="1" {{ old('estado_cuenta') == '1' ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ old('estado_cuenta') == '0' ? 'selected' : '' }}>Inactivo</option>
        </select>
    </div>




    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('socios.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
