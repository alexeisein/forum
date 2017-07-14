@extends('layouts.main')

    @section('title', config('app.name').' | Users')

    @section('content')
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-8">
                    <div class="col-md-4">
                        <a href=""><img src="{{'https://www.gravatar.com/avatar/'.md5(strtolower(trim(Auth::user()->email)))}}" width="200px" height="250px;"></a>
                    </div>
                    <div class="col-md-8">
                        <h4><span class="glyphicon glyphicon-user"></span> {{Auth::user()->fullname}}</h4>
                        <h5><span class="glyphicon glyphicon-user"></span> {{Auth::user()->username}}</h5>
                        <p class="text-muted"><strong>Joined:</strong> <span class="glyphicon glyphicon-time"></span> {{Auth::user()->created_at->diffForHumans()}}</p>

                    </div>
                    @foreach(Auth::user()->questions as $userQuestions)
                        <div class="col-md-8">
                            <li><a href="">{{$userQuestions->title}}</a></li>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection