<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
@if (Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif
<a href="{{ url('/empleado/create') }}">Crear empleado</a>
<table class="min-w-full">
    <thead class="border-b">
        <tr>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">N°</th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Foto</th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Primer nombre</th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Segundo nombre</th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Apellido paterno</th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Apellido materno</th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Correo</th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $empleados as $empleado )
        <tr class="border-b">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $empleado->id }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <img class="block mx-auto h-24 rounded-full sm:mx-0 sm:shrink-0" width="100"  src="{{ asset('storage').'/'.$empleado->foto }}" alt="{{ $empleado->primer_nombre.' '.$empleado->apellido_paterno }}" >
            </td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $empleado->primer_nombre }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $empleado->segundo_nombre }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $empleado->apellido_paterno }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $empleado->apellido_materno }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $empleado->correo }}</td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}">
                    Editar
                </a>
                | 
                <form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres eliminar el registro?')" value="Eliminar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
