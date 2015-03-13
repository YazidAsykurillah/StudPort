<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class KelasTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('kelas')->delete();

		$kelas1 = [
			'id'=>1,
			'name'=>'X A 1',
		];
		$kelas2 = [
			'id'=>2,
			'name'=>'X A 2',
		];

		

		DB::table('kelas')->insert($kelas1);
		DB::table('kelas')->insert($kelas2);
	
	}

}
