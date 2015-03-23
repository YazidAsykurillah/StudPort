<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Materi;
use App\Praktikum;
use App\Kuis;
use App\Soal;
use App\User;
class StudPortController extends Controller {

	//Block Materi
	public function materi(){
		$materi = Materi::paginate(10);
		$materi->setPath('');
		return View('studport/materi')->with('materi', $materi);
	}

	public function viewMateri($id){

		$materi = Materi::findOrFail($id);
		$praktikum = $materi->praktikum;
		return View('studport/viewMateri')
			->with('praktikum', $praktikum)
			->with('materi', $materi);
	}

	public function downloadFileMateri($idMateri){

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

	//END Block Materi



	//Block Praktikum
	public function praktikum(){
		$praktikum = Praktikum::paginate(10);
		$praktikum->setPath('');
		return View('studport/praktikum')->with('praktikum', $praktikum);
	}

	public function viewPraktikum($id)
	{
		$praktikum = Praktikum::findOrFail($id);
		$siswa = $praktikum->user;
		return View('studport/viewPraktikum')
		->with('siswa', $siswa)
		->with('praktikum', $praktikum);
	}

	public function downloadFilepraktikum($idpraktikum){

		$praktikum = Praktikum::findOrFail($idpraktikum);
		$praktikumTitle =$praktikum->title;
		$filepraktikum = $praktikum->files;

		$pathTofile = public_path().'/files/'.$filepraktikum;			//get the file location.
		$fileExtension = \File::extension($pathTofile);				//get the file extension
		if(\File::exists($pathTofile)){
			return response()->download($pathTofile, $praktikumTitle.".".$fileExtension);
		}
		else{
			return "File tidak terdapat dalam sistem";
		}

	}

	//END Block Praktikum


	//Block Kuis

	public function kuis(){

		$kuis = Kuis::paginate(10);
		$kuis->setPath('');
		return View('studport/kuis')->with('kuis', $kuis);
	}

	public function viewKuis($id)
	{
		$kuis = Kuis::findOrFail($id);
		$soal = $kuis->soal;
		return View('studport/viewKuis')
			->with('kuis', $kuis)
			->with('soal', $soal);
	}


	public function postAnswer(Request $request){
		

		if($request->ajax()){

			$id_soal = $request->id_soal;
			$answer = $request->answer;
			$soal = Soal::find($id_soal);
			$opsiBenar = $soal->opsiBenar;
			if($answer == $opsiBenar){

				return "answerRight";
			}
			else{

				return "answerWrong";
			}
		}
		else{
			
			return "Hey, seems you are not using ajax, maybe your browser does not support this.";
		}
	}

	public function finishKuis(Request $request){

		$kuis_id = $request->kuis_id;
		$user_id = $request->user_id;
		$skor =$request->skor;
		if($skor == 0){
			$skor = 0;
		}
		$data = [
			'kuis_id'=>$kuis_id,
			'user_id'=>$user_id,
			'skor'=>$skor,
		];
		\DB::table('kuis_user')->insert($data);
		$messageResult = "";
		if($skor < 60){

			$messageResult = "<i class='glyphicon glyphicon-thumbs-down'></i>&nbsp;Kamu harus lebih banyak belajar";
		}
		else if($skor >=60 && $skor<=80){
			$messageResult = "<i class='glyphicon glyphicon-thumbs-up'></i>&nbsp;Bagus...!";
		}
		else{
			$messageResult = "<i class='glyphicon glyphicon-star-empty'></i>&nbsp;Hebat...!";
			
		}
		return redirect()->back()->with('kuisMessage', "$messageResult , skor kamu $skor");

	}


	// Function to change profile picture

	public function changePhoto(Request $request){

		$this->validate($request,[
				'profile_picture'=>'required|mimes:jpg,jpeg,png',
				'id'=>'required|integer'
			]);

		$user = User::find($request->id);
		$orginalFile = public_path().'/images/'.$user->profile_picture;

		$fileName = preg_replace('/\s+/','',$request->file('profile_picture')->getClientOriginalName());
		$mt_rand = mt_rand();							//create a mt_rand to prevent duplication
		$fileToInsert = $mt_rand."_".$fileName;			//this is the file to insert  into the table

		//update the user profile picture.
		$user->profile_picture = $fileToInsert;
		$user->save();

		//now upload the file 
		$destinationPath = public_path().'/images';
		$request->file('profile_picture')->move($destinationPath, $fileToInsert);

		//delete the original file
		\File::delete($orginalFile);

		//everything goes fine, time to return it back.
		return redirect()->back();

	}

	//Function to upload praktikum photo
	public function uploadPraktikumPhoto(Request $request){
		$this->validate($request,[

				'user_id'=>'required|integer',
				'praktikum_id'=>'required|integer',
				'foto'=>'required|mimes:jpg,jpeg,png'
			]);

		$fileName = preg_replace('/\s+/','',$request->file('foto')->getClientOriginalName());
		$mt_rand = mt_rand();							//create a mt_rand to prevent duplication
		$fileToInsert = $mt_rand."_".$fileName;			//this is the file to insert  into the table

		$data = [
			'praktikum_id'=>$request->praktikum_id,
			'user_id'=>$request->user_id,
			'foto'=>$fileToInsert,
		];

		//insert data to table
		\DB::table('praktikum_user')->insert($data);

		//now upload the file 
		$destinationPath = public_path().'/images';
		$request->file('foto')->move($destinationPath, $fileToInsert);
		
		return redirect()->back()->with('resultMessage', "Berhasil menggungah foto praktikum");
	}

}
