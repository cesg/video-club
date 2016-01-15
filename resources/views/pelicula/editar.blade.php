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
    <div class="container" ng-controller="editarPeliculaCtr">
        <div class="panel panel-default">
            <div class="panel-heading">@{{ pelicula.titulo }}</div>
            <div class="panel-body">
                <form action="#" class="">
                    <div class="form-group">
                        <label for="pelicula-titulo">Título</label>
                        <input type="text" class="form-control" ng-model="pelicula.titulo" id="pelicula-titulo">
                    </div>
                    <div class="form-group">
                        <label for="pelicula-desc">Descripción</label>
                        <textarea class="form-control" rows="3" ng-model="pelicula.desc" id="pelicula-desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pelicula-copias">Número de copias</label>
                        <input type="number" class="form-control" ng-model="pelicula.copias" id="pelicula-copias">
                    </div>
                    <button ng-click="guardar()" class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</button>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script href="{!! asset('js/app.js') !!}"></script>
    <script type="text/javascript">
        app.controller('editarPeliculaCtr', function($scope, $http, $window) {
            $scope.pelicula = pelicula;

            $scope.guardar = function () {
                $http.post('/api/pelicula/'+ $scope.pelicula.id, $scope.pelicula).success(function () {
                    $window.location.reload();
                });
            }
        });
    </script>
@endsection