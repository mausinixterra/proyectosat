@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('mensaje'))
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
            </svg>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    {{ Session::get('mensaje') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="{{ url('/empleado/create') }}" class="btn btn-success">Crear empleado</a><br><br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>N°</th>
                    <th>Foto</th>
                    <th>Primer nombre</th>
                    <th>Segundo nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $empleados as $empleado )
                <tr class="border-b">
                    <td>{{ $empleado->id }}</td>
                    <td>
                        <img class="img-thumbail img-fluid" width="100"  src="{{ asset('storage').'/'.$empleado->foto }}" alt="{{ $empleado->primer_nombre.' '.$empleado->apellido_paterno }}" >
                    </td>
                    <td>{{ $empleado->primer_nombre }}</td>
                    <td>{{ $empleado->segundo_nombre }}</td>
                    <td>{{ $empleado->apellido_paterno }}</td>
                    <td>{{ $empleado->apellido_materno }}</td>
                    <td>{{ $empleado->correo }}</td>
                    <td>
                        <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}"  class="btn btn-warning">
                            Editar
                        </a>
                        | 
                        <form action="{{ url('/empleado/'.$empleado->id) }}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres eliminar el registro?')" value="Eliminar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $empleados->links() !!}
    </div>
@endsection
