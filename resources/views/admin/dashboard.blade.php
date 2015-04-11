@extends('admin')
@section('admin_content')
<h1>
    Dashboard
    <small>
        for {{ ucfirst(Auth::user()->username) }}
    </small>
</h1>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">User Statistics</div>
            <table class="table">
                <thead>
                <th>Statistic</th>
                <th>Value</th>
                </thead>
                <tr>
                    <td>Total Users</td>
                    <td>{{ \App\User::all()->count() }}</td>
                </tr>

            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">User Statistics</div>
            <table class="table">
                <thead>
                    <th>Event</th>
                    <th>Time</th>
                </thead>
            </table>
        </div>
    </div>
@endsection