<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('usuario_id')->unsigned();
          $table->timestamps();
          $table->foreign('usuario_id')->references('id')->on('usuarios');
          $table->boolean('full')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        	Schema::drop('cards');
    }
}
