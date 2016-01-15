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
    <div class="container" ng-controller="listaPeliculaCtr">
        <div class="row">
            <h2>Buscar película por título</h2>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" class="  search-query form-control" placeholder="Search" ng-model="titulo"/>
                        <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button" ng-click="buscarPeliculas()">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <th>Titulo</th>
                    <td>Acciones</td>
                </tr>
                <tr ng-repeat="pelicula in peliculas">
                    <td>@{{ pelicula.titulo }}</td>
                    <td><a href="#"><span class="glyphicon glyphicon-edit"></span> Editar</a></td>
                </tr>
            </table>

        </div>
    </div>
@endsection
@section('scripts')
    <script href="{!! asset('js/app.js') !!}"></script>
    <script type="text/javascript">
        app.controller('listaPeliculaCtr', function($scope, $http) {
            $scope.peliculas = [];

            $scope.buscarPeliculas = function () {
                if ($scope.titulo) {
                    $http.get('api/pelicula?titulo='+ $scope.titulo).success(function (data) {
                        $scope.peliculas = data.peliculas;
                    });
                } else {
                    $http.get('/api/pelicula').success(function (data) {
                        $scope.peliculas = data.peliculas;
                    });
                }
            };
        });
    </script>
@endsection