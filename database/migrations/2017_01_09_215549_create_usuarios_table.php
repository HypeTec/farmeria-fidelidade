<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nome');
			$table->string('pin')->nullable();
			$table->string('sexo')->nullable();
			$table->date('data_nascimento')->nullable();
			$table->string('cpf')->nullable();
			$table->string('email')->nullable();
			$table->string('celular');
			$table->string('fixo')->nullable();
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
		Schema::drop('usuarios');
	}

}
