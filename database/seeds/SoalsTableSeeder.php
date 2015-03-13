<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SoalsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('soals')->delete();

		$soal1 = [

			'id'=>1,
			'soal'=>'Apa kah itu?',
			'opsiA'=>'Apa sih',
			'opsiB'=>'Apa tuh',
			'opsiC'=>'Oh saya tahu',
			'opsiD'=>'Oh saya belum tahu',
			'opsiBenar'=>'B',
			'kuis_id'=>1,

		];
		$soal2 = [

			'id'=>2,
			'soal'=>'What is the color of the rainbow?',
			'opsiA'=>'Red',
			'opsiB'=>'Blue',
			'opsiC'=>'Brown',
			'opsiD'=>'Too many colors',
			'opsiBenar'=>'D',
			'kuis_id'=>1,

		];

		DB::table('soals')->insert($soal1);
		DB::table('soals')->insert($soal2);

		
	
	}

}
