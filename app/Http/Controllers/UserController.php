<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$siswa = User::where('isTeacher','=',0)->where('kelas_id','!=',0)->get();
		//print_r($siswa);
		return View('user.index')->with('siswa', $siswa);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		
		$siswa = User::findOrFail($id);
		

		return View('user/show')->with('siswa', $siswa);
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


	public function hapusSiswa(Request $request){
		if($request->ajax()){
			
			$siswa = User::findOrFail($request->id);
			if($siswa->delete()){
				return response("deleted");
			}
			else{
				return response(500);
			}
		}
		else{
			return response("not ajax");
		}
	}

}
