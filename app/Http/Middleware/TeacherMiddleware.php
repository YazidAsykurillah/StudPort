<?php namespace App\Http\Middleware;

use Closure;

class TeacherMiddleware {

	

	public function handle($request, Closure $next)
	{
		if(\Auth::user()->isTeacher != 1){
			if($request->ajax()){

				return "404 : You are not allowed to that action :P";
			}
			return redirect('home')->with('errorMessage', "Permission denied!");
		}
		return $next($request);
	}

}
