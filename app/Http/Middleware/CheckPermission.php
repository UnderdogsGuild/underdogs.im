<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;
use Auth;
use Config;

class CheckPermission {

    protected $auth;

    /**
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param $request
     * @return mixed
     */
    private function getPermission($request)
    {
        $neededCall = $request->route()->getAction()['uses'];
        return Config::get('permissions.' . $neededCall);
    }
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $permissionName = $this->getPermission($request);
        if(is_null($permissionName))
        {
            //Doesn't Require Any Permissions from Config. Let it through.
            return $next($request);
        }
        else {
            if(\App\Services\PermissionsService::canString($permissionName))
            {
                return $next($request);
            }
        }
        //Couldn't give them permission. If they're not logged in, let them try that.
        if(!Auth::check())
        {
            \App::abort(401, '401: Not authenticated.');
        }
        \App::abort(403, 'Access denied.');
	}


}
