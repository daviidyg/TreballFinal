<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Miniaturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('figuras', function (Blueprint $table) {
            $table->bigIncrements('id_figuras');
            $table->string('nombre_figuras');
            $table->string('alianza_figuras');
            $table->string('ejercito_figuras');
            $table->decimal('precio_figuras', 6, 2);
            $table->string('minifoto')->default('notfound.jpg');
            //$table->foreign('idusuario', 'idpintura')->references('id','id_pintura')->on('users','pinturas');
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
