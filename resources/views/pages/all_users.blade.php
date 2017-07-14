@extends('layouts.main')

    @section('title', config('app.name').' | Users')

    @section('content')
    
        <div class="container">
            <div class="col-md-12" style="border-bottom:1px solid #d9d9d9;">
                @forelse($users as $user)
                    <div class="col-md-3">
                        <div class="pull-left" style="margin-right: 5px;">
                            <a href=""><img src="images/default-user.png" width="100" height="100"></a>
                        </div>
                        <div>
                            <p>
                                <b class="text-primary">Name:</b> <a href="{{route('user.view')}}" title="{{ $user->fullname }}">
                                {{ $user->fullname }}</a><br>
                                <b class="text-primary">Username:</b> {{ $user->username }} <br>
                                <b class="text-warning">Asked:</b> {{ $user->questions->count()}}<br>
                                <b class="text-success">Answered:</b> {{ $user->replies->count()}}
                            </p>
                        </div>
                    </div>
                @empty
                <h4>No User found !</h4>
                @endforelse
            </div>
        </div>
    @endsection