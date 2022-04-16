@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        @include('admin.detalles', ['lista'=>'Listado de actividades', 'tipo'=>'actividades','url'=>'actividades'])
        @include('admin.editar', ['lista'=>'Listado de actividades','url_editar'=>'actividades', 'tipo'=>'', 'modal_vista' => 'de la actividad'])
        @include('admin.modal', ['lista'=>'Listado de actividades','url'=>'actividades', 'tipo'=>'', 'ingreso'=>'Ingrese la nueva actividad'])
    </main>
@endsection

