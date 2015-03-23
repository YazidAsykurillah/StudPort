<?php namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\User;
use App\Kuis;
use App\Kelas;
use App\Materi;
use App\Praktikum;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user_id = \Auth::user()->id;
		$user = User::findOrFail($user_id);
		$kuis = $user->kuis;

		$daftarKelas = Kelas::take(5)->get();
		$daftarMateri = Materi::take(5)->get();
		$daftarKuis = Kuis::take(5)->get();


		return view('home')
			->with('user', $user)
			->with('kuis', $kuis)
			->with('daftarKelas', $daftarKelas)
			->with('daftarMateri', $daftarMateri)
			->with('daftarKuis', $daftarKuis)
			;
	}
	

}
