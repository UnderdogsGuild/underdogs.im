<table class="table table-striped">
    <thead>
    @if(!isset($notdeletable))
    <th></th>
    @endif
    <th>
        ID
    </th>
    <th>
        Title
    </th>
    <th>
        Published At
    </th>
    </thead>
    @foreach($events as $event)
        <a href="/admin/events/edit/{{$event->id}}">
            <tr>
                @if(!isset($notdeletable))
                <td>
                    <a href="{{ url('admin/events/' . $event->id . '/delete') }}"><i class="fa fa-times-circle"></i></a>
                </td>
                @endif
                <td>
                    <a href="/admin/events/{{$event->id}}/edit">
                        {{ $event->id }}
                    </a>
                </td>
                <td>
                    <a href="/admin/events/{{$event->id}}/edit">
                    {{ $event->title }}
                    </a>
                </td>
                <td>
                    <a href="/admin/events/{{$event->id}}/edit">
                        {{ $event->published_at->timezone(Auth::user()->timezone)->format('m/d/Y h:i:s A') }}
                    </a>
                </td>
            </tr>
        </a>
    @endforeach
</table>
<div class="text-center ud-paginate">
    {!! $events->render() !!}
</div>