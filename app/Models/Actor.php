<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = ['nombre'];
    protected $table = 'actores';

    public function peliculas()
    {
        return $this->belongsToMany(Pelicula::class, 'pelicula_actor');
    }
}
