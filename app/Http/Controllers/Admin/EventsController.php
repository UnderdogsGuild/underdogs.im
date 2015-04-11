<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Event;

class EventsController extends Controller {
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('\App\Http\Middleware\Authenticate');
        $this->middleware('\App\Http\Middleware\CheckPermission');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return redirect('/admin/events/active');
	}

    public function indexActive()
    {
        $events = Event::where('published_at', '<=', Carbon::now())->paginate(50);
        return view('admin.events.index-active')->with('events', $events);
    }

    public function indexUnpublished()
    {
        $events = Event::where('published_at', '>', Carbon::now())->paginate(50);
        return view('admin.events.index-unpublished')->with('events', $events);
    }

    public function indexDeleted()
    {
        $events = Event::onlyTrashed()->paginate(50);
        return view('admin.events.index-deleted')->with('events', $events);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.events.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return \Request::input('content');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
