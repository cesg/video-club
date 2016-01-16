@extends('layout.app')
@section('menu')
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Mantenedores
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="{{ url('mantenedor/pelicula') }}">Peliculas</a></li>
            </ul>
        </li>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse1">Mantenedores</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ url('mantenedor/pelicula') }}">Peliculas</a></li>
                            </ul>
                            <div class="panel-footer">Mantenedores</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h2>Hola : {{ Auth::user()->name }}</h2>
                <p></p>
            </div>

        </div>


    </div>
@endsection