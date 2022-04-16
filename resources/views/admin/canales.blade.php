@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        @include('admin.detalles', ['lista'=>'Listado de canales de atención', 'tipo'=>'','url'=>'canales'])
        @include('admin.editar', ['lista'=>'Listado de canales de atención','url_editar'=>'canales', 'tipo'=>'', 'modal_vista' => 'de los canales de atención'])
        @include('admin.modal', ['lista'=>'Listado de canales de atención','url'=>'canales', 'tipo'=>''])
    </main>
@endsection
