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

	Route::resource('charts','ChartsController');
	

});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


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


Route::get('downloadMateri/{idMateri}',['uses'=>'MateriController@downloadFile']);

Route::get('downloadPraktikum/{idPraktikum}',['uses'=>'PraktikumController@downloadFile']);

Route::get('dataTest', function(){
	return response()->json(['name' => 'Abigail', 'state' => 'CA']);
});