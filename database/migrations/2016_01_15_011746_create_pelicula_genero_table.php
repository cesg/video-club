<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeliculaGeneroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelicula_genero', function (Blueprint $table) {
            $table->unsignedInteger('pelicula_id')->index();
            $table->unsignedInteger('genero_id')->index();

            $table->foreign('pelicula_id')->references('id')->on('peliculas')->onDelete('cascade');
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');

            $table->primary(['pelicula_id', 'genero_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pelicula_genero');
    }
}
