<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiniaturaPinturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('figuras__pinturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_figuras');
            $table->unsignedBigInteger('id_pintura');
            $table->foreign('id_figuras', 'id_pintura')->references('id_figuras','id_pintura')->on('figuras','pinturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miniatura__pinturas');
    }
}
