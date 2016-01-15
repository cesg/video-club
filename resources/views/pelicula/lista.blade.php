@extends('layout.app')
@section('menu')
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="true">
            Mantenedores
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">Peliculas</a></li>
        </ul>
    </li>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <h2>Buscar película por título</h2>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="  search-query form-control" placeholder="Search"/>
                        <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                        </span>
                </div>
            </div>
        </div>
    </div>
@endsection