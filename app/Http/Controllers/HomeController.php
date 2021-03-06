<?php namespace App\Http\Controllers;

use App\Event;
use Illuminate\Support\Facades\App;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

    /**
     * Create a new controller instance.
     */
	public function __construct()
	{
        $this->middleware('\App\Http\Middleware\CheckPermission');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return string
	 */
	public function index()
	{
        $events = Event::findActive()->paginate(10);
		return view('home')->with('events', $events);
	}

}
