<h1>{{ $modo }} empleado</h1>
<label for="primer_nombre">Primer Nombre</label>
<input type="text" name="primer_nombre" id="primer_nombre" value="{{ isset($empleado->primer_nombre)?$empleado->primer_nombre:'' }}"><br>

<label for="segundo_nombre">Segundo Nombre</label>
<input type="text" name="segundo_nombre" id="segundo_nombre" value="{{ isset($empleado->segundo_nombre)?$empleado->segundo_nombre:'' }}"><br>

<label for="apellido_paterno">Apellido Paterno</label>
<input type="text" name="apellido_paterno" id="apellido_paterno" value="{{ isset($empleado->apellido_paterno)?$empleado->apellido_paterno:'' }}"><br>

<label for="apellido_materno">Apellido Materno</label>
<input type="text" name="apellido_materno" id="apellido_materno" value="{{ isset($empleado->apellido_materno)?$empleado->apellido_materno:'' }}"><br>

<label for="correo">Correo</label>
<input type="email" name="correo" id="correo" value="{{ isset($empleado->correo)?$empleado->correo:'' }}"><br>

<label for="foto">Foto</label>
@if (isset($empleado->foto))
{{ $empleado->foto }}
<img src="{{ asset('storage').'/'.$empleado->foto }}" alt="" width="100">
@endif

<input type="file" name="foto" id="foto" value=""><br>

<input type="submit" value="{{ $modo }} datos">
<a href="{{ url('/empleado/') }}">Cancelar</a>