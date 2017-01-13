<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('card_id')->unsigned();
            $table->string('cupomfiscal');
            $table->timestamps();
            $table->integer('operador_id')->unsigned();
            $table->date('data_compra');

            $table->foreign('card_id')->references('id')->on('cards');

            $table->foreign('operador_id')->references('id')->on('operadors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        	Schema::drop('points');
    }
}
