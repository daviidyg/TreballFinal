<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Noticias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->bigIncrements('id_noticias');
            $table->string('titulo_noticia');
            $table->text('subtitulo_noticia');
            $table->longText('contenido_noticia');
            $table->string('portada_imagen')->default('sinportada.jpg');
            $table->string('autor');
            $table->string('imagen_contenido_noticia');
            $table->string('pie_de_imagen_noticia');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('figuras');

    }
}
