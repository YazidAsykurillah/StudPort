<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePraktikumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('praktikum', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('materi_id')->nullable();
			$table->string('title');
			$table->text('tools');
			$table->text('steps');
			$table->string('files')->nullable();
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
		Schema::drop('praktikum');
	}

}
