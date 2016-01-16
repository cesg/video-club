<?php

use Illuminate\Database\Seeder;

class ActoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        \App\Models\Actor::create([
            'nombre' => $faker->name,
        ]);
        \App\Models\Actor::create([
            'nombre' => $faker->name,
        ]);
        \App\Models\Actor::create([
            'nombre' => $faker->name,
        ]);
        \App\Models\Actor::create([
            'nombre' => $faker->name,
        ]);
        \App\Models\Actor::create([
            'nombre' => $faker->name,
        ]);
        \App\Models\Actor::create([
            'nombre' => $faker->name,
        ]);
    }
}
