<h1>Detalles del Socio</h1>
<p><strong>Nombre:</strong> {{ $socio->nombre }}</p>
<p><strong>Apellido Paterno:</strong> {{ $socio->apellido_paterno }}</p>
<p><strong>Apellido Materno:</strong> {{ $socio->apellido_materno }}</p>
<p><strong>RUT:</strong> {{ $socio->rut }}</p>
<p><strong>Correo:</strong> {{ $socio->correo }}</p>
<p><strong>Fecha de Ingreso:</strong> {{ $socio->fecha_ingreso }}</p>
<p><strong>Estado de Cuenta:</strong> {{ $socio->estado_cuenta ? 'Activo' : 'Inactivo' }}</p>
<a href="{{ route('socios.index') }}" class="btn btn-primary">Volver a la Lista</a>
