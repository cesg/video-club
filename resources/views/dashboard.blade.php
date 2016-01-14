@extends('layout.app')
@section('content')
    <div class="container">
        <h2>Hola : {{ Auth::user()->name }}</h2>
        <p></p>
    </div>
@endsection