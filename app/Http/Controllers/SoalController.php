<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Kuis;
use App\Soal;

class SoalController extends Controller {

	public function __construct(){

		$this->middleware('teacher');

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[

			'soal'=>'required|min:5',
			'opsiA'=>'required|different:opsiB,opsiC,opsiD',
			'opsiB'=>'required|different:opsiA,opsiC,opsiD',
			'opsiC'=>'required|different:opsiA,opsiB,opsiD',
			'opsiD'=>'required|different:opsiA,opsiB,opsiC',
			'opsiBenar'=>'required',
			'kuis_id'=>'required|integer',

		]);
		$kuis = Kuis::find($request->kuis_id);

		Soal::create($request->all());
		return Redirect('kuis/'.$request->kuis_id)->with('successMessage', " Berhasil menambahkan soal pada $kuis->title");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function createSoal($idK){

		$kuis_id = $idK;
		$kuis = Kuis::findOrFail($kuis_id);

		return View('soal.create')->with('kuis',$kuis);
	}


	public function hapusSoal(Request $request){

		if($request->ajax()){

			$soal = Soal::findOrFail($request->id);
			$soal->delete();
			return response('deleted');

		}
	}

}
