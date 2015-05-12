<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Underdogs Guild</title>

        <link href="/css/app.css" rel="stylesheet">

        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="{{ elixir("css/app.css") }}">
        <script src="{{ elixir("js/app.js") }}"></script>
        @yield('head')
    </head>
    <body style="background: #0B4239">
        @include('snippets.nav')
        <div class="container">
            @include('snippets.messages')
            @include('flash::message')
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> We've got some problems.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        @yield('content')
        <!-- Scripts -->
        @yield('scripts')
    </body>
</html>
