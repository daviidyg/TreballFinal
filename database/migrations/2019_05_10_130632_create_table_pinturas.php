<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePinturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinturas', function (Blueprint $table) {
            $table->bigIncrements('id_pintura');
            $table->string('nombre_pintura')->unique();
            $table->string('tipo_pintura');
            $table->decimal('precio', 4, 2);
            $table->string('color');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinturas');
    }
}
