<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Kuis;
class Kuis extends Model {

	
	protected $table = 'kuis';

	protected $fillable = ['title', 'objectives', 'displaying', 'timer'];

	public function user(){						//M2M relationship with user.

		return $this->belongsToMany('App\User')->withPivot('skor');
	}

	public function soal(){

		return $this->hasMany('App\Soal');
	}

}
