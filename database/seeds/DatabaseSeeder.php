<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(ProductorasTableSeeder::class);
        $this->call(ActoresTableSeeder::class);
        $this->call(GenerosTableSeeder::class);
        $this->call(PeliculasTableSeeder::class);

        Model::reguard();
    }
}
