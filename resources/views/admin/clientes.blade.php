@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        @include('admin.detalles', ['lista'=>'Listado de clientes', 'tipo'=>'','url'=>'clientes'])
        @include('admin.editar', ['lista'=>'Listado de clientes','url_editar'=>'clientes', 'tipo'=>'', 'modal_vista' => 'del cliente'])
        @include('admin.modal', ['lista'=>'Listado de clientes','url'=>'clientes', 'tipo'=>'', 'ingreso'=>'Ingrese el nuevo cliente'])
    </main>
@endsection
