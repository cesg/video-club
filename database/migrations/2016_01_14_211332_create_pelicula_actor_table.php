<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeliculaActorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelicula_actor', function (Blueprint $table) {
            $table->unsignedInteger('pelicula_id')->index();
            $table->unsignedInteger('actor_id')->index();

            $table->foreign('pelicula_id')->references('id')->on('peliculas')->onDelete('cascade');
            $table->foreign('actor_id')->references('id')->on('actores')->onDelete('cascade');

            $table->primary(['pelicula_id', 'actor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pelicula_actor');
    }
}
