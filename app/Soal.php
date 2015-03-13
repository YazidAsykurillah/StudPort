<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kuis;
class Soal extends Model {

	protected $table = 'soals';

	protected $fillable = ['soal', 'opsiA', 'opsiB', 'opsiC', 'opsiD', 'opsiBenar', 'kuis_id'];

	public function kuis(){

		return $this->belongsTo('App\Kuis');
	}

}
