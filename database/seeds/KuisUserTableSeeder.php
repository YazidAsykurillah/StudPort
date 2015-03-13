<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class KuisUserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('kuis_user')->delete();

		$kuis_user1 = [
			'id'=>1,
			'kuis_id'=>1,
			'user_id'=>2,
			'skor'=>90
		];
		$kuis_user2 = [
			'id'=>2,
			'kuis_id'=>2,
			'user_id'=>2,
			'skor'=>78
		];
		$kuis_user3 = [
			'id'=>3,
			'kuis_id'=>2,
			'user_id'=>3,
			'skor'=>60
		];
		

		

		DB::table('kuis_user')->insert($kuis_user1);
		DB::table('kuis_user')->insert($kuis_user2);
		DB::table('kuis_user')->insert($kuis_user3);
		
	
	}

}
