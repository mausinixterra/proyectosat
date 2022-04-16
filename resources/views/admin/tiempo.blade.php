@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        @include('admin.detalles', ['lista'=>'Listado del tiempo invertido', 'tipo'=>'', 'url'=>'tiempo'])
        @include('admin.editar', ['lista'=>'Listado del tiempo invertido','url_editar'=>'tiempo', 'tipo'=>'', 'modal_vista' => 'del tiempo invertido'])
        @include('admin.modal', ['lista'=>'Listado del tiempo invertido','url'=>'tiempo', 'tipo'=>''])


    </main>
@endsection
