@extends('layout.app')
@section('content')
    <div class="container">
        <h2>Hola : {{ \Auth::getUser()->name() }}</h2>
        <p></p>
    </div>
@endsection