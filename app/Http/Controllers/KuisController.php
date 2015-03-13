<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Kuis;

class KuisController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$kuis = Kuis::all();
		
		return View('kuis.index')->with('kuis', $kuis);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View('kuis.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[

				'title'=>'required|unique:kuis,title|min:5'
		]);

		Kuis::create($request->all());
		return redirect('kuis')->with('successMessage', "Kuis $request->title berhasil ditambahkan");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$kuis = Kuis::findOrFail($id);
		$soal = $kuis->soal;
		return View('kuis.show')->with('kuis', $kuis)->with('soal', $soal);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$kuis = Kuis::findOrFail($id);
		return View('kuis.edit')->with('kuis', $kuis);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$this->validate($request,
		 	[
		 		'title' => 'required|unique:kuis,title,'.$id.'',
		 		'objectives'=>'required|min:5'
	    	]
	    );
		$kelas = Kuis::whereId($id)->first();
		$kelas->fill($request->input())->save();
		return Redirect('kuis')
		->with('successMessage', "Berhasil merubah kuis");
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


	public function hapusKuis(Request $request){				//delete kuis via ajax.
		if($request->ajax()){
			
			$kuis = Kuis::findOrFail($request->id);
			$countSoal = $kuis->soal->count();
			if($countSoal > 0){							//there at least 1 soal, the quiz should not be able to be deleted.
				
				return response("$kuis->title tidak bisa dihapus, karena terdapat soal dalam kuis");
			}
			else{

				$kuis->delete();
				return response("deleted");
			}
		}
		else{
			return response("not ajax");
		}
	}

}
