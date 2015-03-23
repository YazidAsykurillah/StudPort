<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');

//Route::get('dashboard', 'DashboardController@index');

Route::get('home', 'HomeController@index');

Route::group(['middleware'=>'auth'], function(){
		
	Route::resource('kuis','KuisController');

	Route::resource('kelas','KelasController');

	Route::resource('user','UserController');

	Route::resource('soal','SoalController');

	Route::resource('materi','MateriController');

	Route::resource('praktikum','PraktikumController');

	Route::resource('studPort','StudPortController');

	Route::post('test', array('uses'=>'KelasController@destroy'));

	//Hapus siswa
	Route::get('hapusSiswa', ['uses'=>'UserController@hapusSiswa']);

	//Hapus kuis
	Route::get('hapusKuis', ['uses'=>'KuisController@hapusKuis']);

	//Hapus Materi
	Route::get('hapusMat', ['uses'=>'MateriController@hapusMat']);

	//Hapus Praktikum
	Route::get('hapusPrak', ['uses'=>'PraktikumController@hapusPrak']);

	//Buat soal
	Route::get('createSoal/{idK}', ['uses'=>'SoalController@createSoal']);

	//Hapus Soal 
	Route::get('hapusSoal', ['uses'=>'SoalController@hapusSoal']);


	Route::get('downloadMateri/{idMateri}',['uses'=>'MateriController@downloadFile']);

	Route::get('downloadPraktikum/{idPraktikum}',['uses'=>'PraktikumController@downloadFile']);

	Route::resource('charts','ChartsController');

	//routes for siswa
	//Materi
	Route::get('getMateri',['uses'=>'StudPortController@materi']);
	Route::get('viewMateri/{idMat}',['uses'=>'StudPortController@viewMateri']);
	Route::get('downloadFileMateri/{idMateri}',['uses'=>'StudPortController@downloadFileMateri']);
	//Praktikum
	Route::get('getPraktikum',['uses'=>'StudPortController@praktikum']);
	Route::get('viewPraktikum/{idPrak}',['uses'=>'StudPortController@viewPraktikum']);
	Route::get('downloadFilePraktikum/{idPraktikum}',['uses'=>'StudPortController@downloadFilePraktikum']);

	//Kuis
	Route::get('getKuis',['uses'=>'StudPortController@kuis']);
	Route::get('viewKuis/{idKuis}',['uses'=>'StudPortController@viewKuis']);

	Route::post('postAnswer',['uses'=>'StudPortController@postAnswer']);
	Route::post('finishKuis',['uses'=>'StudPortController@finishKuis']);


	//Ubah foto profil
	Route::post('changePhoto',['uses'=>'StudPortController@changePhoto']);

	//Upload foto praktikum
	
	Route::post('uploadPraktikumPhoto',['uses'=>'StudPortController@uploadPraktikumPhoto']);
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

