@extends('app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12">
            <h1>
                Upcoming Events
                <small>
                    Like Coil!
                </small>
            </h1>
            @foreach($events as $event)
            <article>
                <h3>
                    {{ $event->title }}
                    <small>
                        {{ $event->start_at->format('M d, Y') }} to {{ $event->end_at }}
                    </small>
                </h3>
                {!! $event->content !!}
            </article>
            @endforeach
        </div>
	</div>
    <div class="row">
        <div class="text-center ud-paginate">
            {!! $events->render() !!}
        </div>
    </div>
</div>
@endsection
