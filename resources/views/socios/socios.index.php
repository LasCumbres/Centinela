<form method="GET" action="{{ route('socios.index') }}" class="mb-4">
    <div class="row">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, apellidos, RUT o correo" value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <select name="status" class="form-control">
                <option value="">Seleccionar estado</option>
                <option value="activo" {{ request('status') == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="suspendido" {{ request('status') == 'suspendido' ? 'selected' : '' }}>Suspendido</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('socios.index') }}" class="btn btn-secondary">Limpiar</a>
        </div>
    </div>
</form>
