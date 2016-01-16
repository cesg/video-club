<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $fillable = ['titulo', 'desc', 'copias', 'productora_id', 'img'];

    public function actores()
    {
        return $this->belongsToMany(Actor::class, 'pelicula_actor');
    }
}
