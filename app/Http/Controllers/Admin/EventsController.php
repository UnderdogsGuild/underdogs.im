<?php namespace App\Http\Controllers\Admin;

use App\Exceptions\DataStorageException;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Event;
use Illuminate\Support\Facades\Input;

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
        return redirect(url('admin/events/active'));
	}

    public function indexActive()
    {
        $events = Event::findActive()->paginate(50);
        return view('admin.events.index-active')->with('events', $events);
    }

    public function indexUnpublished()
    {
        $events = Event::findInactive()->paginate(50);
        return view('admin.events.index-unpublished')->with('events', $events);
    }

    public function indexDeleted()
    {
        $events = Event::onlyTrashed()->paginate(50);
        return view('admin.events.index-deleted')->with('events', $events)->with('notdeletable', true);
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
        $validator = \Validator::make(
            [
                'title' => Input::get('title'),
                'content' => Input::get('content'),
                'published_at' => Input::get('published_at'),
                'start_at' => Input::get('start_at'),
                'end_at' => Input::get('end_at'),
            ],
            [
                'title' => 'required|min:3',
                'content' => 'required|min:3',
                'published_at' => 'required|date_format:m/d/Y h:i A',
                'start_at' => 'required|date_format:m/d/Y h:i A',
                'end_at' => 'required|date_format:m/d/Y h:i A',
            ]
        );
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $event = new Event();
        $event->title = Input::get('title');
        $event->content = Input::get('content');
        $event->published_at = Carbon::createFromFormat('m/d/Y h:i A', Input::get('published_at'), \Auth::user()->timezone)->tz('utc');
        $event->start_at = Carbon::createFromFormat('m/d/Y h:i A', Input::get('start_at'), \Auth::user()->timezone)->tz('utc');
        $event->end_at = Carbon::createFromFormat('m/d/Y h:i A', Input::get('end_at'), \Auth::user()->timezone)->tz('utc');
        if($event->save()) {
            flash()->success('Event added.');
            return redirect('/admin/events/active');
        }
        throw new DataStorageException(Auth::user(), $event);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $event = Event::find($id);
        if(!$event->count()) {
            abort(404, 'Event not found.');
        }
        return view('admin.events.edit')->with('event', $event);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$event = Event::find($id);
        if(!$event->count()) {
            abort(400, 'Event not found.');
        }
        $validator = \Validator::make(
            [
                'title' => Input::get('title'),
                'content' => Input::get('content'),
                'published_at' => Input::get('published_at'),
                'start_at' => Input::get('start_at'),
                'end_at' => Input::get('end_at'),
            ],
            [
                'title' => 'required|min:3',
                'content' => 'required|min:3',
                'published_at' => 'required|date_format:m/d/Y h:i A',
                'start_at' => 'required|date_format:m/d/Y h:i A',
                'end_at' => 'required|date_format:m/d/Y h:i A',
            ]
        );
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $event->title = Input::get('title');
        $event->content = Input::get('content');
        $event->published_at = Carbon::createFromFormat('m/d/Y h:i A', Input::get('published_at'), \Auth::user()->timezone)->tz('utc');
        $event->start_at = Carbon::createFromFormat('m/d/Y h:i A', Input::get('start_at'), \Auth::user()->timezone)->tz('utc');
        $event->end_at = Carbon::createFromFormat('m/d/Y h:i A', Input::get('end_at'), \Auth::user()->timezone)->tz('utc');
        if($event->save()) {
            flash()->success('Event modified.');
            return redirect('/admin/events/active');
        }
        throw new DataStorageException(Auth::user(), $event);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if(Event::destroy($id)) {
            flash()->success('Event deleted.');
            return redirect(url('admin/events/active'));
        }
        throw new DataStorageException(\Auth::user(), Event::find($id));
	}

}
