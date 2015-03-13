<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	
	public function index()
	{
		$kelas = Kelas::all();
		
		return View('kelas.index')->with('kelas', $kelas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View('kelas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[

				'name'=>'required|unique:kelas,name|min:2'
		]);

		Kelas::create($request->all());
		return redirect('kelas')->with('successMessage', "Kelas $request->name berhasil ditambahkan");


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$kelas = Kelas::findOrFail($id);
		$siswa = $kelas->user->where('isTeacher',0);
		return View('kelas.show')->with('kelas', $kelas)->with('siswa', $siswa);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$kelas = Kelas::find($id);
		return View('kelas.edit')->with('kelas', $kelas);
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
		 		'name' => 'required|unique:kelas,name,'.$id.'',
	    	]
	    );
		$kelas = Kelas::whereId($id)->first();
		$kelas->fill($request->input())->save();
		return Redirect('kelas')
		->with('successMessage', "Berhasil merubah kelas");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		if($request->ajax()){
			$kelas = Kelas::find($request->id);
			$countUser = $kelas->user->count();
			if($countUser > 0){

				return response("Kelas tidak bisa dihapus karena terdapat siswa dalam kelas");
			}
			else{

				$kelas->delete();
				return response("deleted");
			}
		}
		else{

			return "not ajax";
		}
	}

}
