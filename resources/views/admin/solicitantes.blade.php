@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        @include('admin.detalles', ['lista'=>'Listado de solicitantes', 'tipo'=>'','url'=>'solicitantes'])
        @include('admin.editar', ['lista'=>'Listado de solicitantes','url_editar'=>'solicitantes', 'tipo'=>'', 'modal_vista' => 'del solicitante'])
        @include('admin.modal', ['lista'=>'Listado de solicitantes','url'=>'solicitantes', 'tipo'=>'', 'ingreso'=>'Ingrese el nuevo solicitante'])
    </main>
@endsection
