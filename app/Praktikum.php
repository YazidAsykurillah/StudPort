<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Materi;
use App\User;
class Praktikum extends Model {

	protected $table = 'praktikum';

	protected $fillable = ['materi_id', 'title', 'steps', 'files', 'tools'];

	public function materi(){

		return $this->belongsTo('App\Materi');
	}
	
	public function user(){
		
		return $this->belongsToMany('App\User')->withPivot('foto');
	}

}
