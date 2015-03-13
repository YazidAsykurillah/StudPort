<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Kelas extends Model {

	protected $table = 'kelas';

	protected $fillable = ['name'];

	public function user(){
		return $this->hasMany('App\User');
	}

}
