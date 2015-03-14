<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Materi;

class MateriController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$materi = Materi::all();
		return View('materi.index')->with('materi', $materi);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View('materi.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		
		$this->validate($request,[

				'title'=>'required|min:3',
				'file' =>'required|mimes:doc,docx,xls'

			]);
		$title = $request->input('title');
		
		$fileName = preg_replace('/\s+/','',$request->file('file')->getClientOriginalName());
		$mt_rand = mt_rand();							//create a mt_rand to prevent duplication
		$fileToInsert = $mt_rand."_".$fileName;			//this is the file to insert  into the table

		$data = [
			'title'=>$title,
			'file'=>$fileToInsert,
		];

		$create = Materi::create($data);
		if($create){

			$destinationPath = public_path().'/files';
			
			$request->file('file')->move($destinationPath, $fileToInsert);

			return redirect('materi')->with('successMessage', "Berhasil menambahkan $title");
		}
		else{

			return "ERROR";
		}


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


	public function hapusMat(Request $request){

		if($request->ajax()){

			$materi = Materi::findOrFail($request->id);
			$countPraktikum = $materi->praktikum->count();			//check if this materi has a praktikum.
			if($countPraktikum > 0){
				return response("GAGAL: Materi $materi->title tidak bisa dihapus karena ada praktikum yang terkait.");
			}
			else{
				$materiFile = public_path().'/files/'.$materi->file;	//get the materi filename from db.
				$materi->delete();								//delete selected materi from db
				\File::delete($materiFile);
				return response('deleted');
			}

			
		}
	}


	public function downloadFile($idMateri){

		$materi = Materi::findOrFail($idMateri);
		$materiTitle =$materi->title;
		$fileMateri = $materi->file;

		$pathTofile = public_path().'/files/'.$fileMateri;			//get the file location.
		$fileExtension = \File::extension($pathTofile);				//get the file extension
		if(\File::exists($pathTofile)){
			return response()->download($pathTofile, $materiTitle.".".$fileExtension);
		}
		else{
			return "File tidak terdapat dalam sistem";
		}

	}


}
