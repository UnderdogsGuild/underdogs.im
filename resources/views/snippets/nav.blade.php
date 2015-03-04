        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    @if(\App\Services\PermissionsService::canString('home_controller_at_index'))
                    <a class="navbar-brand nav-logo" href="/home">
                    @else
                    <a class="navbar-brand nav-logo" href="/">
                    @endif
                        <svg id="sir-nav" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="40" height="40">
                            <g transform="scale(0.1)">
                                <image xlink:href="/api/logo/777/uds.svg" width="400" height="400" y="0" x="0" 	onmouseover="evt.target.setAttribute('xlink:href', '/api/logo/00bd72/uds.svg');" onmouseout="evt.target.setAttribute('xlink:href', '/api/logo/777/uds.svg');"></image>
                            </g>
                        </svg>
                    </a>
                    @if(\App\Services\PermissionsService::canString('home_controller_at_index'))
                        <a class="navbar-brand" href="/home">
                    @else
                        <a class="navbar-brand" href="/">
                    @endif
                        Underdogs
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav">
                        <li>
                            @if(\App\Services\PermissionsService::canString('home_controller_at_index'))
                            <a href="/home">
                            @else
                            <a href="/">
                            @endif
                                Home
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/auth/logout">Logout</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>