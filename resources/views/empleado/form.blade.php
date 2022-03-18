<h1>{{ $modo }} empleado</h1>
@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="primer_nombre">Primer Nombre</label>
    <input type="text" class="form-control" name="primer_nombre" id="primer_nombre" value="{{ isset($empleado->primer_nombre)?$empleado->primer_nombre:old('primer_nombre') }}"><br>
</div>
<div class="form-group">
    <label for="segundo_nombre">Segundo Nombre</label>
    <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" value="{{ isset($empleado->segundo_nombre)?$empleado->segundo_nombre:old('segundo_nombre') }}"><br>
</div>
<div class="form-group">
    <label for="apellido_paterno">Apellido Paterno</label>
    <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" value="{{ isset($empleado->apellido_paterno)?$empleado->apellido_paterno:old('apellido_paterno') }}"><br>
</div>
<div class="form-group">
    <label for="apellido_materno">Apellido Materno</label>
    <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" value="{{ isset($empleado->apellido_materno)?$empleado->apellido_materno:old('apellido_materno') }}"><br>
</div>
<div class="form-group">
    <label for="correo">Correo</label>
    <input type="email" class="form-control" name="correo" id="correo" value="{{ isset($empleado->correo)?$empleado->correo:old('correo') }}"><br>
</div>
<div class="form-group">
    <label for="foto"></label>
    @if (isset($empleado->foto))
        <img class="img-thumbail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" alt="" width="100">
    @endif
    <input type="file" class="form-control"  name="foto" id="foto" value=""><br>
</div>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">
<a class="btn btn-primary" href="{{ url('/empleado/') }}">Cancelar</a>