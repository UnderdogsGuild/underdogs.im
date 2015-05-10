<table class="table table-striped">
    <thead>
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
                <td>
                    <a href="/admin/events/edit/{{$event->id}}">
                        {{ $event->id }}
                    </a>
                </td>
                <td>
                    <a href="/admin/events/edit/{{$event->id}}">
                    {{ $event->title }}
                    </a>
                </td>
                <td>
                    <a href="/admin/events/edit/{{$event->id}}">
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