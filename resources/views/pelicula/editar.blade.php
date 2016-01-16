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
                    <div class="form-group">
                        <label for="productora-id">Productora</label>
                        <select class="form-control" id="productora-id" ng-model="pelicula.productora" ng-options="productora.nombre for productora in productoras">
                            {{--<option ng-repeat="productora in productoras" value="@{{ productora.id }}">@{{ productora.nombre }}</option>--}}
                        </select>
                    </div>
                    <div class="form-group">
                        <h4>Buscar Actores</h4>
                        <input class="form-control" type="text" ng-model="search" placeholder="Filtrar actores">
                        <select class="form-control" ng-change="addActor()" ng-model="selected_actor" ng-options="actor.nombre for actor in actores | filter:search">
                        </select>
                    </div>
                    <div class="form-group">
                        <ul class="list-group">
                            <li class="list-group-item" ng-repeat="actor in actores_selecionados">
                                @{{ actor.nombre }}
                                <a href="#" ng-click="removeActor($index)">Quitar <span class="glyphicon glyphicon-trash right"></span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <button type="file" ngf-select="uploadFiles($file, $invalidFiles)"  accept="image/*" ngf-max-height="1000" ngf-max-size="1MB">
                                <span>Agregar imágen</span>
                            </button>
                        </div>
                        <div class="row">
                            <img src="/img/@{{ pelicula.img }}" alt="" class="img-thumbnail img-responsive">
                        </div>
                    </div>
                    <button ng-click="guardar()" class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</button>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        app.controller('editarPeliculaCtr', function($scope, $http, $window, $filter, Upload) {
            $scope.pelicula = pelicula;
            $scope.pelicula.actores = pelicula.actores.map(function (actor) {
                return actor.id;
            });
            $scope.productoras = productoras ? productoras : [];
            $scope.actores = actores ? actores : [];
            $scope.actores_selecionados = actores.filter(function (actor) {
                return $scope.pelicula.actores.indexOf(actor.id) > -1;
            });

            $scope.pelicula.productora = $filter('filter')(productoras, {id:$scope.pelicula.productora_id})[0];
            $scope.selected_actor = {};


            $scope.uploadFiles = function(file, errFiles) {
                $scope.f = file;
                $scope.errFile = errFiles && errFiles[0];
                if (file) {
                    file.upload = Upload.upload({
                        url: '/api/img/upload',
                        data: {file: file}
                    });

                    file.upload.then(function (response) {
                        $scope.pelicula.img = response.data.img;
                        $timeout(function () {
                            file.result = response.data;
                        });
                    });
                }
            };

            $scope.guardar = function () {
                $http.post('/api/pelicula/'+ $scope.pelicula.id, $scope.pelicula).success(function () {
                    $window.location.reload();
                });
            };

            $scope.addActor = function () {
                $scope.pelicula.actores.push($scope.selected_actor.id);
                $scope.actores_selecionados.push($scope.selected_actor);
                var indexActor = $scope.actores.indexOf($scope.selected_actor);
                $scope.actores.splice(indexActor, 1);

            };
            $scope.removeActor = function (index) {
                $scope.actores.push($scope.actores_selecionados[index]);
                $scope.actores_selecionados.splice(index, 1);
                $scope.pelicula.actores.splice(index, 1);
            };
        });
    </script>
@endsection