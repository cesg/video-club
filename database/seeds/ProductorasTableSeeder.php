<?php

use Illuminate\Database\Seeder;

class ProductorasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Productora::create([
            'nombre' => 'Imagine Entertainment'
        ]);
        \App\Models\Productora::create([
            'nombre' => 'C2 Pictures'
        ]);
        \App\Models\Productora::create([
            'nombre' => 'Warner Bros'
        ]);
        \App\Models\Productora::create([
            'nombre' => 'Dimension Films'
        ]);
    }
}
