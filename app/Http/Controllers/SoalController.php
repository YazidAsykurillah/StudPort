<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Kuis;
use App\Soal;

class SoalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		
		

		
	

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
			'opsiA'=>'required',
			'opsiB'=>'required',
			'opsiC'=>'required',
			'opsiD'=>'required',
			'opsiBenar'=>'required',
			'kuis_id'=>'required|integer',

		]);
		$kuis = Kuis::find($request->kuis_id);

		Soal::create($request->all());
		return Redirect('kuis')->with('successMessage', " Berhasil menambahkan soal pada $kuis->title");
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

}
