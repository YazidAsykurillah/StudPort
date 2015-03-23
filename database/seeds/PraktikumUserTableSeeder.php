<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PraktikumUserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('praktikum_user')->delete();

		$praktikum_user1 = [
			'id'=>1,
			'praktikum_id'=>1,
			'user_id'=>2,
			'foto'=>'machine.jpg'
		];
		$praktikum_user2 = [
			'id'=>2,
			'praktikum_id'=>1,
			'user_id'=>2,
			'foto'=>'nophoto.jpg'
		];
		$praktikum_user3 = [
			'id'=>3,
			'praktikum_id'=>2,
			'user_id'=>3,
			'foto'=>'nophoto.jpg'
		];
		

		

		DB::table('praktikum_user')->insert($praktikum_user1);
		DB::table('praktikum_user')->insert($praktikum_user2);
		DB::table('praktikum_user')->insert($praktikum_user3);
		
	
	}

}
