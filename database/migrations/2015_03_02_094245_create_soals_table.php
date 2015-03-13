<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('soals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('soal');
			$table->text('opsiA');
			$table->text('opsiB');
			$table->text('opsiC');
			$table->text('opsiD');
			$table->string('opsiBenar');
			$table->integer('kuis_id');
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
		Schema::drop('soals');
	}

}
