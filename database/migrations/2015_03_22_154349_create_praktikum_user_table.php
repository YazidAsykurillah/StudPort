<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePraktikumUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('praktikum_user', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('praktikum_id');
			$table->integer('user_id');
			$table->string('foto');
			

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('praktikum_user');
	}

}
