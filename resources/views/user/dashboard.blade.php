@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div class="col-xs-6 col-md-6">
                            <a href="{{ route('user.profile') }}" class="thumbnail">
                              <img src="{{ asset('images/profile/myprofile.jpg') }}" alt="ask a question">
                            </a>
                            <a class="btn btn-primary col-xs-12 col-md-12" href="{{ route('user.profile') }}">My Profile</a>
                        </div>

                        <div class="col-xs-6 col-md-6">
                            <a href="{{ route('user.settings') }}" class="thumbnail">
                              <img src="{{ asset('images/profile/settings.jpg') }}" alt="ask a question">
                            </a>
                            <a class="btn btn-primary col-xs-12 col-md-12" href="{{ route('user.settings') }}">Account Settings</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
