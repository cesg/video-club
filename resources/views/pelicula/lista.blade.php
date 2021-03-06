@extends('layout.app')
@section('menu')
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="true">
            Mantenedores
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="{!! url('mantenedor/pelicula') !!}">Peliculas</a></li>
        </ul>
    </li>
@endsection
@section('content')
    <div class="container" ng-controller="listaPeliculaCtr">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Mantenedor - Película</div>
                <div class="panel-body">
                    <h2>Buscar película por título</h2>
                    <a href="{!! url('/mantenedor/pelicula/crear') !!}">Agregar Compra</a>
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" class="  search-query form-control" placeholder="Search"
                                   ng-model="titulo"/>
                        <span class="input-group-btn">
                        <button class="btn btn-danger" type="button" ng-click="buscarPeliculas()">
                            <span class=" glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="row" ng-show="resultados" class="ng-hide">
        <table class="table">
            <tr>
                <th>Caratula</th>
                <th>Título</th>
                <th>Acciones</th>
            </tr>
            <tr ng-repeat="pelicula in peliculas">
                <td><img src="/img/@{{ pelicula.img }}" alt="" class="img-thumbnail" height="100" width="100"></td>
                <td><p class="lead">@{{ pelicula.titulo }}</p></td>
                <td><a href="{!! url('/mantenedor/pelicula/') !!}@{{ '/' + pelicula.id + '/editar' }}"><span
                                class="glyphicon glyphicon-edit"></span> Editar</a>
                    <a href="{!! url('/mantenedor/pelicula/') !!}@{{ '/' + pelicula.id + '/eliminar' }}"><span
                                class="glyphicon glyphicon-trash"></span> Eliminar</a>
                </td>
            </tr>
        </table>
    </div>
@endsection
@section('scripts')
    <script href="{!! asset('js/app.js') !!}"></script>
    <script type="text/javascript">
        app.controller('listaPeliculaCtr', function ($scope, $http) {
            $scope.peliculas = [];
            $scope.resultados = false;
            $scope.buscarPeliculas = function () {
                if ($scope.titulo) {
                    $http.get('/api/pelicula?titulo=' + $scope.titulo).success(function (data) {
                        $scope.peliculas = data.peliculas;
                    });
                } else {
                    $http.get('/api/pelicula').success(function (data) {
                        $scope.peliculas = data.peliculas;
                        $scope.resultados = true;
                    });
                }
            };
        });
    </script>
@endsection