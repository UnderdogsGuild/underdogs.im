@extends('admin')
@section('admin_content')
    <h1>
        Events
    </h1>
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="/admin/events/active">Active</a></li>
        <li role="presentation"><a href="/admin/events/unpublished">Unpublished</a></li>
        <li role="presentation"><a href="/admin/events/deleted">Deleted</a></li>
        <li role="presentation" class="active"><a href="/admin/events/create">Create</a></li>
    </ul>
    <h3>
        Create a New Event
    </h3>
    <form action="/admin/events/create" method="post">
        @include('admin.events.partials.form')
    </form>
@endsection