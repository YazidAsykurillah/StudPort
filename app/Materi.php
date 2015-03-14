<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Praktikum;							//load App\Praktikum to be used in relationship.

class Materi extends Model {

	protected $table = 'materi';

	protected $fillable = ['title', 'file'];


	public function praktikum(){				//relationship with praktikum.

		return $this->hasMany('App\Praktikum');
	}

}
