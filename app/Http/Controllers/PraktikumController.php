<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Praktikum;
use App\Materi;

class PraktikumController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$praktikum = Praktikum::all();

		return View('praktikum.index')
			->with('praktikum', $praktikum);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$opsiMateri = Materi::lists('title', 'id');
		return View('praktikum.create')->with('opsiMateri', $opsiMateri);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
				'title'=>'required|min:3|unique:praktikum,title',
				'materi_id'=>'integer',
				'tools'=>'required|min:5',
				'steps'=>'required|min:10',
				'files'=>'mimes:doc,docx,xls,xlsx'

			]);


		if($request->hasFile('files')){				//request has file uploaded			

			$fileName = preg_replace('/\s+/','',$request->file('files')->getClientOriginalName());
			$mt_rand = mt_rand();							//create a mt_rand to prevent duplication
			$fileToInsert = $mt_rand."_".$fileName;			//this is the file to insert  into the table

			$data = [
				'title'=>$request->input('title'),
				'materi_id'=>$request->input('materi_id'),
				'tools'=>$request->input('tools'),
				'steps'=>$request->input('steps'),
				'files'=>$fileToInsert

			];

			$insert = Praktikum::create($data);
			$destinationPath = public_path().'/files';
			
			$request->file('files')->move($destinationPath, $fileToInsert);

			return redirect('praktikum')->with('successMessage', "Berhasil menambahkan praktikum $request->title");


		}
		else{											//request doesnot have a file uploaded.

			$insert = Praktikum::create($request->all());
			return Redirect('praktikum')->with('successMessage', "Berhasil menambahkan praktikum $request->title");
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
		$praktikum = Praktikum::findOrFail($id);
		return View('praktikum.show')->with('praktikum', $praktikum);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$praktikum = Praktikum::findOrFail($id);
		$opsiMateri = Materi::lists('title', 'id');
		return View('praktikum.edit')->with('praktikum', $praktikum)->with('opsiMateri', $opsiMateri);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$this->validate($request,[
				'title'=>'required|min:3|unique:praktikum,title,'.$id,
				'materi_id'=>'integer',
				'tools'=>'required|min:5',
				'steps'=>'required|min:10',
				'files' =>'required|mimes:doc,docx,xls'

			]);

		$praktikum = Praktikum::whereId($id)->first();

		if($request->hasFile('files')){				//request has file uploaded			

			$fileName = preg_replace('/\s+/','',$request->file('files')->getClientOriginalName());
			$mt_rand = mt_rand();							//create a mt_rand to prevent duplication
			$fileToInsert = $mt_rand."_".$fileName;			//this is the file to insert  into the table

			$orginalFile = public_path().'/files/'.$praktikum->files;				//get the original file of this praktikum (to be deleted as soon as we update it).


			$data = [
				'title'=>$request->input('title'),
				'materi_id'=>$request->input('materi_id'),
				'tools'=>$request->input('tools'),
				'steps'=>$request->input('steps'),
				'files'=>$fileToInsert

			];

			$update = $praktikum->update($data);
			$destinationPath = public_path().'/files';
			
			$request->file('files')->move($destinationPath, $fileToInsert);

			\File::delete($orginalFile);						//delete the original fille pendukung.
			return redirect()->action('PraktikumController@show', $id)->with('successMessage', "Berhasil memperbarui $praktikum->title");
			


		}
		else{											//request doesnot have a file uploaded.

			$praktikum->fill($request->all())->save();
			return redirect()->action('PraktikumController@show', $id)->with('successMessage', "Berhasil merubah $praktikum->title");
		}
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

	public function hapusPrak(Request $request){				//delete Praktikum via ajax.
		if($request->ajax()){
			
			$Prak = Praktikum::findOrFail($request->id);

			$orginalFile = public_path().'/files/'.$Prak->files;				//get the original file of this praktikum (to be deleted as soon as we update it).
			
			$Prak->delete();
			\File::delete($orginalFile);						//run delete file.
			return response('deleted');
		}
		else{
			return response("not ajax");
		}
	}
}
