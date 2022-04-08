@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        @include('admin.detalles', ['lista'=>'Listado de usuarios registrados', 'tipo'=>'usuario'])
    </main>
@endsection
