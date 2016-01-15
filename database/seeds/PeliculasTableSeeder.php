<?php

use App\Models\Pelicula;
use Illuminate\Database\Seeder;

class PeliculasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelicula::create([
            'titulo' => 'Pulp Fiction',
            'desc' =>'Jules y Vincent, dos asesinos a sueldo con no demasiadas luces, trabajan para el gángster Marsellus Wallace. Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su atractiva mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben ponerse "manos a la obra". Su misión: recuperar un misterioso maletín. (FILMAFFINITY)',
            'copias' => 10,
            'productora_id' => 1,
        ]);
    }
}
