<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		$user1 = [
			'id'=>1,
			'first_name'=>'Jon', 
			'last_name'=>'Bon Jovi',
			'email'=>'jon@email.com',
			'password'=>bcrypt('jonbonjovi'),
			'isTeacher'=>1,
			'kelas_id'=>1,
			'biography'=>'I am a cowboy love riding along the road'

		];

		$user2 = [
			'id'=>2,
			'first_name'=>'Richie',
			'last_name'=>'Sambora',
			'email'=>'richie@email.com',
			'password'=>bcrypt('richiesambora'),
			'kelas_id'=>1,
			'biography'=>'I am a cowboy love riding along the road also'

		];

		$user3 = [
			'id'=>3,
			'first_name'=>'Wayne',
			'last_name'=>'Rooney',
			'email'=>'wayne@email.com',
			'password'=>bcrypt('waynerooney'),
			'kelas_id'=>1,
			'biography'=>'I am a great stricker'

		];
		DB::table('users')->insert($user1);
		DB::table('users')->insert($user2);
		DB::table('users')->insert($user3);
	}

}
