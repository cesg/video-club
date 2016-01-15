@extends('layout.app')
@section('menu')
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Mantenedores
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="{{ url('mantenedor/pelicula') }}">Peliculas</a></li>
                {{--<li role="separator" class="divider"></li>--}}
                {{--<li><a href="#">Separated link</a></li>--}}
            </ul>
        </li>
@endsection
@section('content')
    <div class="container">
        <h2>Hola : {{ Auth::user()->name }}</h2>
        <p></p>
    </div>
@endsection