@extends('layouts.app') <!-- Asegúrate de que tienes un layout base -->

<script>
    const profileDropzone = new Dropzone("#profileDropzone", {
        url: "{{ route('socios.upload') }}", // Ruta para manejar la subida
        maxFilesize: 5, // Tamaño máximo 5MB
        acceptedFiles: "image/*", // Solo imágenes
        paramName: "foto_perfil", // Nombre del parámetro en el request
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        success: function(file, response) {
            console.log(response);
            alert('Foto subida exitosamente.');
        },
        error: function(file, response) {
            alert('Error al subir la foto.');
        }
    });
</script>

<script>
    Dropzone.options.profileDropzone = {
        init: function () {
            @if($socio->foto_perfil)
                const mockFile = { name: "Foto de perfil", size: 12345 };
                this.emit("addedfile", mockFile);
                this.emit("thumbnail", mockFile, "{{ $socio->foto_perfil_url }}");
                this.emit("complete", mockFile);
                mockFile.previewElement.classList.add("dz-success", "dz-complete");
            @endif
        },
    };
</script>


@section('content')
<div class="container">
    <h1>Editar Socio</h1>
    <form action="{{ route('socios.update', $socio) }}" method="POST">
        @csrf
        @method('PUT')

        <form action="{{ route('socios.upload') }}" class="dropzone" id="profileDropzone" enctype="multipart/form-data">
            @csrf
        </form>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $socio->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno</label>
            <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{ old('apellido_paterno', $socio->apellido_paterno) }}" required>
        </div>

        <div class="form-group">
            <label for="apellido_materno">Apellido Materno</label>
            <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="{{ old('apellido_materno', $socio->apellido_materno) }}" required>
        </div>

        <div class="form-group">
            <label for="rut">RUT</label>
            <input type="text" name="rut" id="rut" class="form-control" value="{{ old('rut', $socio->rut) }}" required>
        </div>

        <div class="form-group">
            <label for="correo">Correo Electrónico</label>
            <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo', $socio->correo) }}" required>
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $socio->fecha_nacimiento) }}">
        </div>

        <div class="form-group">
            <label for="estado_cuenta">Estado de Cuenta</label>
            <select name="estado_cuenta" id="estado_cuenta" class="form-control">
                <option value="1" {{ $socio->estado_cuenta ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ !$socio->estado_cuenta ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $socio->descripcion) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="{{ route('socios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
