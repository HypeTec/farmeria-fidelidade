<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLojaIdToOperador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('operadors', function (Blueprint $table)
        {
            $table->integer('loja_id')->unsigned();

            $table->foreign('loja_id')->references('id')->on('lojas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operadors', function (Blueprint $table) {

            $table->dropForeign('loja_id');
            $table->dropColumn('loja_id');
        });
    }
}
