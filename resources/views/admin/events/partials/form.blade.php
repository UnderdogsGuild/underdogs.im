    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" name="title" id="title" placeholder="My Awesome Event" value="{{ !empty(old('title')) ? old('title') : (isset($event) ? $event->title : old('title')) }}">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control summernote" name="content" id="content">{{ !empty(old('content')) ? old('content') : (isset($event) ? $event->content : old('content')) }}</textarea>
    </div>
    <div class="form-group">
        <label for="content">Publish At</label>
        <div class='input-group date' id='publish-picker'>
            <input type='text' class="form-control" name="published_at" id="published_at" autocomplete="off">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
        </div>
                <span class="help-block">
                    It is currently {{\Carbon\Carbon::now(Auth::user()->timezone)->format('m/d/Y h:i:s A')}} in your chosen timezone ({{\Auth::user()->timezone != null ? \Auth::user()->timezone : 'UTC'}}). Schedule your event in this timezone. It'll be automagically converted for everyone else.
                </span>
    </div>
    <div class="form-group">
        <label for="content">Start At</label>
        <div class='input-group date' id='start-picker'>
            <input type='text' class="form-control" name="start_at" id="end_at" autocomplete="off">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
        </div>
                <span class="help-block">
                    It is currently {{\Carbon\Carbon::now(Auth::user()->timezone)->format('m/d/Y h:i:s A')}} in your chosen timezone ({{\Auth::user()->timezone != null ? \Auth::user()->timezone : 'UTC'}}). Schedule your event in this timezone. It'll be automagically converted for everyone else.
                </span>
    </div>
    <div class="form-group">
        <label for="content">End At</label>
        <div class='input-group date' id='end-picker'>
            <input type='text' class="form-control" name="end_at" id="end_at" autocomplete="off">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
        </div>
                <span class="help-block">
                    It is currently {{\Carbon\Carbon::now(Auth::user()->timezone)->format('m/d/Y h:i:s A')}} in your chosen timezone ({{\Auth::user()->timezone != null ? \Auth::user()->timezone : 'UTC'}}). Schedule your event in this timezone. It'll be automagically converted for everyone else.
                </span>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    @section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#publish-picker').datetimepicker({
                locale: 'en',
                defaultDate: '{{ !empty(old('published_at')) ? old('published_at') : (isset($event) ? $event->published_at->timezone(Auth::user()->timezone)->format('m/d/Y h:i:s A') : \Carbon\Carbon::now(Auth::user()->timezone)->format('m/d/Y h:i:00 A')) }}'
            });
            $('#start-picker').datetimepicker({
                locale: 'en',
                defaultDate: '{{ !empty(old('start_at')) ? old('start_at') : (isset($event) ? $event->start_at->timezone(Auth::user()->timezone)->format('m/d/Y h:i:s A') : \Carbon\Carbon::now(Auth::user()->timezone)->format('m/d/Y h:i:00 A')) }}'
            });
            $('#end-picker').datetimepicker({
                locale: 'en',
                defaultDate: '{{ !empty(old('end_at')) ? old('end_at') : (isset($event) ? $event->end_at->timezone(Auth::user()->timezone)->format('m/d/Y h:i:s A') : \Carbon\Carbon::now(Auth::user()->timezone)->format('m/d/Y h:i:00 A')) }}'
            });
        });
    </script>
    @endsection