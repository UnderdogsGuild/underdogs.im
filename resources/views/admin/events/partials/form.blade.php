    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" name="title" id="title" placeholder="My Awesome Event" value="{{(isset($event) ? $event->title : '')}}">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <input type="hidden" class="form-control" name="content" id="content">
    </div>
    <div class="well well-lg editable">
        {{(isset($event) ? $event->content : 'Your awesome content.')}}
    </div>
    <div class="form-group">
        <label for="content">Publish At</label>
        <div class='input-group date' id='publish-picker'>
            <input type='text' class="form-control" name="published_at" id="published_at" value="{{(isset($event) ? $event->published_at->format('m/d/Y h:i:s A') : \Carbon\Carbon::now()->format('m/d/Y h:i:s A'))}}">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
        </div>
                <span class="help-block">
                    It is currently {{\Carbon\Carbon::now()->format('m/d/Y h:i:s A')}} server time.
                </span>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#publish-picker').datetimepicker({
                locale: 'en'
            });
        });
    </script>
    <button type="submit" class="btn btn-default">Submit</button>
@section('scripts')
    <script src="/js/medium-editor.min.js"></script>
    <script>
        var editor = new MediumEditor('.editable', {

        });
        $(document).ready(function() {
            $('#content').val($('.editable').html());
        });

        $('.editable').on('input', function() {
            $('#content').val($('.editable').html());
        });
    </script>
    <script type="text/javascript" src="/js/moment.min.js"></script>
    <script src="/js/bootstrap-datetimepicker.min.js"></script>
@endsection
@section('head')
    <link href="/css/medium-editor.min.css" rel="stylesheet">
    <link href="/css/themes/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
@endsection