<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Materi;
class Praktikum extends Model {

	protected $table = 'praktikum';

	protected $fillable = ['materi_id', 'title', 'steps', 'files', 'tools'];

	public function materi(){

		return $this->belongsTo('App\Materi');
	}
	

}
