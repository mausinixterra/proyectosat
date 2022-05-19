<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    input[type=number] { -moz-appearance:textfield; }
</style>

<p class="text-2xl text-center py-10">{{ $modo }}</p>
@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid xl:grid-cols-2 xl:gap-6">
    <div class="mb-6">
        <label for="fecha_actividad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fecha de la actividad <span class="text-red-500">*</span></label>
        <input type="date" id="fecha_actividad" name="fecha_actividad" max="{{ $fecha_actual }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ isset($proceso->fecha_actividad)?$proceso->fecha_actividad:old('fecha_actividad') }}" required>
    </div>
    <div class="mb-6">
        <label for="actividades_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Actividad <span class="text-red-500 text-lg">*</span>
            <select class="form-select mt-1 block w-full" name="actividades_id" id="actividades_id" required>
                <option selected value="" >Seleccione la actividad realizada</option>
                @foreach ($actividades as $actividad)
                    <option value="{{ $actividad->id }}" >{{ $actividad->nombre }}</option>
                @endforeach
            </option>
            </select>
        </label>
    </div>
</div>
<div>
    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descripción de la actividad <span class="text-red-500 text-lg">*</span></label>
    <textarea id="descripcion" name="descripcion" rows="4" maxlength="255" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Descripción de la actividad realizada..." required></textarea>
</div><br><br>
<div class="grid xl:grid-cols-4 xl:gap-6">
    <div class="mb-6">
        <label for="canal_atencion_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Canal de atención <span class="text-red-500 text-lg">*</span>
            <select id="canal_atencion_id" name="canal_atencion_id" class="form-select mt-1 block w-full" required>
                <option selected value="" >Seleccione el canal de atención</option>
                @foreach ($canales as $canal)
                    <option value="{{ $canal['id'] }}" >{{ $canal['nombre'] }}</option>
                @endforeach
            </select>
        </label>
    </div>
    <div class="mb-12">
        <label for="solicitante_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Solicitante <span class="text-red-500 text-lg">*</span>
            <select id="solicitante_id" name="solicitante_id" class="form-select mt-1 block w-full" required>
                <option selected value="" >Seleccione el solicitante</option>
                    @foreach ($solicitantes as $solicitante)
                        <option value="{{ $solicitante['id'] }}" >{{ $solicitante['nombre'] }}</option>
                    @endforeach
            </select>
        </label>
    </div>
    <div class="mb-1">
        <label for="cliente_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cliente <span class="text-red-500 text-lg">*</span>
            <select id="cliente_id" name="cliente_id" class="form-select mt-1 block w-full" required>
                <option selected value="" >Seleccione el cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente['id'] }}" >{{ $cliente['nombre'] }}</option>
                @endforeach
            </select>
        </label>
    </div>
    <div class="mb-1">
        <label for="tiempo_invertido_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tiempo invertido <span class="text-red-500 text-lg">*</span>
            <select id="tiempo_invertido_id" name="tiempo_invertido_id" class="form-select mt-1 block w-full" required>
                <option selected value="" >Seleccione el tiempo invertido</option>
                @foreach ($tiempos as $tiempo)
                <option value="{{ $tiempo['id'] }}" >{{ $tiempo['nombre'] }}</option>
            @endforeach
            </select>
        </label>
    </div>
</div>
<input type="hidden" id="realizado_por_id" name="realizado_por_id" value="{{ Auth::user()->id }}" >
<div class="grid xl:grid-cols-3 xl:gap-6">
    <div class="mb-12">
      <label for="evidencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Evidencia</label>
      <input type="file" id="evidencia" name="evidencia" accept="image/png, .jpeg, .jpg, image/gif, application/pdf, .doc, .docx, .odf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-12">
        <label for="valor_servicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Valor del servicio</label>
        <input type="number" id="valor_servicio" name="valor_servicio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-12">
        <label for="costo_actividad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Costo de la actividad</label>
       <input type="file" id="costo_actividad" name="costo_actividad" accept="image/png, .jpeg, .jpg, image/gif, application/pdf, .doc, .docx, .odf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
</div>
<div class="grid xl:grid-cols-3 xl:gap-6">

</div>
<a class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{ url('/proceso/') }}">
    <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
    Cancelar</a>
<button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z" /></svg>
    Guadar actividad
</button>
<br><br><br><br>
