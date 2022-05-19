@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div>
            <p class="text-2xl text-center pb-10">Detalles de la actividad</p>
            <div class="grid xl:grid-cols-4 xl:gap-6">
                <div class="mb-6 px-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><strong>Fecha de registro de la actividad </strong></label>
                    <input type="tex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $proceso->fecha_registro }}" disabled>
                </div>
                <div class="mb-6 px-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><strong>Fecha de realización de la actividad </strong></label>
                    <input type="tex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $proceso->fecha_actividad }}" disabled>
                </div>
                <div class="mb-6 px-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><strong>Actividad realizada por </strong></label>
                    <input type="tex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $proceso->realizadoPor->nombre }}" disabled>
                </div>
                <div class="mb-6 px-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><strong>Actividad </strong></label>
                    <input type="tex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $proceso->actividades->nombre }}" disabled>
                </div>
            </div>
            <div class="grid xl:grid-cols-1 xl:gap-6">
                <div class="mb-6 px-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><strong>Descripción de la ctividad </strong></label>
                    <textarea rows="2" maxlength="255" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>{{ $proceso->descripcion }}</textarea>
                </div>
            </div>
            <div class="grid xl:grid-cols-4 xl:gap-6">
                <div class="mb-6 px-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><strong>Canal de atención </strong></label>
                    <input type="tex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $proceso->canalAtencion->nombre }}" disabled>
                </div>
                <div class="mb-6 px-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><strong>Actividad solicitada por </strong></label>
                    <input type="tex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $proceso->solicitante->nombre }}" disabled>
                </div>
                <div class="mb-6 px-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><strong>Cliente </strong></label>
                    <input type="tex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $proceso->cliente->nombre }}" disabled>
                </div>
                <div class="mb-6 px-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><strong>Tiempo invertido en la actividad </strong></label>
                    <input type="tex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $proceso->tiempoInvertido->nombre }}" disabled>
                </div>
            </div>
            <div class="grid xl:grid-cols-4 xl:gap-6">
                <div class="mb-6 px-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"><strong>Valor el servicio </strong></label>
                    <input type="tex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $proceso->valor_servicio }}" disabled>
                </div>
            </div>
            <hr><br>
            @if ($evidencia != '/registro-actividades/public/storage/')
                <label class="ml-5">Archivos cargados</label>
                <br><br>

                    <div class="px-10 inline-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <label class="pl-5">Evidencia: informes del trabajo realizado</label>
                        <a href="{{ $evidencia }}" target="_blank" class="pl-5 text-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </a>
                    </div><br><br>
            @endif
            @if ($costo_actividad != '/registro-actividades/public/storage/')
            <div class="px-10 inline-flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <label class="pl-5">Costo de la actividad: Recibos o facturas de gastos generados para realizar la actividad</label>
                <a href="{{ $costo_actividad }}" target="_blank" class="pl-5 text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </a>
            </div>
            @endif


            <br><br><br>
            <a class="ml-5 text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{ url('/proceso/') }}">
                <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" /></svg>
                Volver</a>
            <br><br><br><br>


        </div>
    </main>
@endsection
