@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-16">
        <form action="{{ url('/proceso') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('proceso.form', ['modo'=>'Registar actividad'])
        </form>
    </div>
@endsection
