@extends('app-dark')
@section('content')
    <div class="container-fluid">
        <div class="welcome-container">
            <a data-toggle="modal" href="#welcome-modal">
                <svg id="sir" height="216" width="216" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g transform="scale(0.2)">
                        <image x="0" y="0" height="1140" width="1040" xlink:href="/api/logo/00BD72/uds.svg"></image>
                    </g>
                </svg>
            </a>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="welcome-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Welcome!</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <b>We're the Underdogs.</b> Our site is currently being revamped to serve our needs for communicating better. So it's a little...empty right now.
                        If you're looking to join us in FFXIV on Leviathan, get in touch with Mirakell Wilo, our FC leader.
                    </p>
                    <p>
                        For more information on our FC, check out our post on the <a href="http://forum.square-enix.com/ffxiv/threads/200052-Looking-for-new-members-for-2.4-and-onwards!?p=2537001">FF forums</a>.
                    </p>
                    <p>
                        If you're an FC member, log right in like you've always done. Then you can enjoy the nothingness! For the moment, we'll only be listing upcoming FC events.
                    </p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">Close</a>
                    <a class="btn btn-success" href="/auth/register" data-toggle="tooltip" data-placement="top" title="There's not much inside yet.">Join Us</a>
                    <a class="btn btn-primary" href="/auth/login">Login</a>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script type="text/javascript">
            $(window).load(function() {
                $('#welcome-modal').modal('show');
            });
        </script>
    @endsection
@endsection