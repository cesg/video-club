<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::group(['prefix' => 'mantenedor'], function () {
    Route::get('pelicula', function () {
        return view('pelicula.lista');
    });

    Route::get('pelicula/crear', function () {
        JavaScript::put(['productoras' => \App\Models\Productora::all(['id', 'nombre'])]);
        return view('pelicula.crear');
    });

    Route::get('pelicula/{peliculaID}/editar', function ($peliculaID) {
        JavaScript::put(['pelicula' => \App\Models\Pelicula::find($peliculaID)]);
        return view('pelicula.editar');
    });
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

Route::group(['prefix' => 'api'], function () {
    Route::get('pelicula', 'Pelicula\PeliculaController@index');
    Route::post('pelicula', 'Pelicula\PeliculaController@store');
    Route::post('pelicula/{peliculaID}', 'Pelicula\PeliculaController@update');
});