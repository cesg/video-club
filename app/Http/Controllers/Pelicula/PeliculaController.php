<?php

namespace App\Http\Controllers\Pelicula;

use App\Models\Pelicula;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $peliculas = collect();
        if ($request->has('titulo')) {
            $peliculas = Pelicula::where('titulo', 'like', '%'. $request->input('titulo'))->get();
        } else {
            $peliculas = Pelicula::all();
        }

        return response()->json(['peliculas' => $peliculas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelicula = Pelicula::create([
            'titulo' => $request->input('titulo'),
            'desc' => $request->input('desc'),
            'copias' => $request->input('copias'),
            'productora_id' => $request->input('productora'),
            'img' => $request->input('img'),
        ]);

        if (!empty($actores = $request->input('actores', []))) {
            $pelicula->actores()->sync($actores);
        }

        return response()->json(['pelicula' => $pelicula]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelicula = Pelicula::find($id);
        if (is_null($pelicula)) {
            return response()->json('No encontrado', 404);
        }
        $pelicula->update([
           'titulo' => $request->input('titulo', $pelicula->titulo),
            'desc' => $request->input('desc', $pelicula->desc),
            'copias' => $request->input('copias', $pelicula->copias),
            'img' => $request->input('img', $pelicula->img),
        ]);

        if (!empty($actores = $request->input('actores', []))) {
            $pelicula->actores()->sync($actores);
        }

        return response()->json(['pelicula' => $pelicula]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);
        if (is_null($pelicula)) {
            return response()->json('No econtrada');
        }

        $pelicula->delete();

        return response()->json('Eliminado');

    }
}
