<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo');
            $table->string('Slug');
            $table->string('OtrosNombres')->nullable();
            $table->string('Tipo');
            $table->text('Sinopsis');
            $table->integer('YearLanzamiento');
            $table->string('EstudioAnimacion');
            $table->string('Subtitulado');
            $table->string('Doblado');
            $table->string('Trailer');
            $table->decimal('Calificacion',2 , 1);
            $table->string('Logo');
            $table->string('PortadaWeb');
            $table->string('PortadaMovil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animes');
    }
}
