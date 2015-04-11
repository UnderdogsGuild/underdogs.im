@extends('app')
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li role="presentation" class="{{ \App\Services\NavigationService::adminNavigation() }}">
                    <a href="/admin">
                        Admin Home
                    </a>
                </li>
                <li role="presentation" class="{{ \App\Services\NavigationService::adminNavigation('admin/users') }}">
                    <a href="/admin/users">
                        Users
                    </a>
                </li>
                <li role="presentation" class="{{ \App\Services\NavigationService::adminNavigation('admin/events') }}">
                    <a href="/admin/events">
                        Events
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
        @yield('admin_content')
        </div>
	</div>
</div>
@endsection
