@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div >
            @if (Session::has('mensaje'))
                <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                        {{ Session::get('mensaje') }}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-3" aria-label="Close">
                      <span class="sr-only">Close</span>
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </div>
            @endif
            <a class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{ url('/proceso/create') }}">
                <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" /></svg>
                Registrar actividad</a><br><br>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">N°</th>
                            <th scope="col" class="px-6 py-3">Fecha registro</th>
                            <th scope="col" class="px-6 py-3">Fecha actividad</th>
                            <th scope="col" class="px-6 py-3">Realizado por</th>
                            <th scope="col" class="px-6 py-3">Actividad</th>
                            <th scope="col" class="px-6 py-3">Canal de atención</th>
                            <th scope="col" class="px-6 py-3">Solicitante</th>
                            <th scope="col" class="px-6 py-3">Cliente</th>
                            <th scope="col" class="px-6 py-3">Tiempo invertido</th>
                            <th scope="col" class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $procesos as $proceso )
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $proceso->id }}</td>
                            <td class="px-6 py-4">{{ $proceso->fecha_registro }}</td>
                            <td class="px-6 py-4">{{ $proceso->fecha_actividad }}</td>
                            <td class="px-6 py-4">{{ $proceso->realizadoPor->nombre }}</td>
                            <td class="px-6 py-4">{{ $proceso->actividades->nombre }}</td>
                            <td class="px-6 py-4">{{ $proceso->canalAtencion->nombre }}</td>
                            <td class="px-6 py-4">{{ $proceso->solicitante->nombre }}</td>
                            <td class="px-6 py-4">{{ $proceso->cliente->nombre }}</td>
                            <td class="px-6 py-4">{{ $proceso->tiempoInvertido->nombre }}</td>
                            <td class="px-6 py-4 text-right inline-flex">
                                <a href="{{ route('proceso.show',$proceso->id) }}"  class="font-medium hover:text-blue-600 dark:text-blue-500 hover:underline">
                                    <abbr title="Detalles">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </abbr>
                                </a>
                                &nbsp;&nbsp;
                                @if (auth()->user()->hasRole('administrador'))
                                    <form action="{{ url('/proceso/'.$proceso->id) }} " method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <label class="stroke-current stroke-2 hover:text-red-600 inline-flex cursor-pointer">
                                            <input type="submit" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"  value="">
                                            <abbr title="Eliminar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </abbr>
                                        </label>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $procesos->links()!!}
            <br><br><br>
        </div>
    </main>
@endsection
