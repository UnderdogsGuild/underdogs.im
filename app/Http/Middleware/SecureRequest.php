<?php namespace App\Http\Middleware;

use Closure;

class SecureRequest {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(Request::secure() || App::environment() == "local")
        {
            return $next($request);
        }
        Redirect::secure(
            Request::path()
        );
	}

}
