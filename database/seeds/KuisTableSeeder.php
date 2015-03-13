<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class KuisTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('kuis')->delete();

		$kuis1 = [
			'id'=>1,
			'title'=>'Kuis 1',
			'objectives'=>'This is the objective of quiz 1'
		];
		$kuis2 = [
			'id'=>2,
			'title'=>'Kuis 2',
			'objectives'=>'This is the objective of quiz 2'
		];

		

		DB::table('kuis')->insert($kuis1);
		DB::table('kuis')->insert($kuis2);
	
	}

}
