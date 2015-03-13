<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersTableSeeder');
		$this->call('KelasTableSeeder');
		$this->call('KuisTableSeeder');
		$this->call('SoalsTableSeeder');
		$this->call('KuisUserTableSeeder');
	}

}
