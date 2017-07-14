@extends('layouts.main')

    @section('title', config('app.name').' | '.$questions->title)

    {{ HTML::script('js/replies.js') }}

    {{ HTML::script('https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=e9fix1c1togpupgglxxvjeo0nd67ents8f43hjae965s9lj5') }}
    {{ HTML::script('js/tinymce_replies.js') }}

    @section('content')
        <div class="container">
            <div class="col-md-8">
                <div class="col-md-2">
                    <img src="/images/default-user.png" width="40" height="40">
                </div>
                <div class="col-md-10" style=" margin-bottom: 5px;">
                    <div class="title">
                        <h3>{{ htmlspecialchars($questions->title)  }}</h3>
                        <div>
		                	<b>URL:</b><a href="{{route('posts.single', $questions->slug) }}" target="_blank"> {{ ($questions->slug)  }}
		                	</a>
		                </div>
                    </div><hr>

                    <div class="body">
                        <p>{!! $questions->body !!}</p>
                        <hr>
                        <p><b>Category: </b>{{ htmlspecialchars($questions->category->name)}}</p>
                        <hr>
                        <p class="text-muted"><span class="glyphicon glyphicon-time text-muted"></span> {{$questions->created_at->diffForHumans() }}
                        <span class="text-muted text-right"> | 
                        {{($questions->updated_at->diffForHumans() != $questions->created_at->diffForHumans() ? 'Edited '.$questions->updated_at->diffForHumans().' | ' : '') }}
                        </span>
                        <span class="text-muted"> Asked by: {{htmlspecialchars($questions->user->fullname) }}</span>
                        </p>
                    </div><hr>

                    <div class="col-md-12">
                        <div class="col-md-4"><a href="" class="text-muted"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a></div>
                        <div class="col-md-4"><a class="text-muted" onclick="focusAns()" style="cursor: pointer;"><span class="glyphicon glyphicon-comment"></span> Answer</a></div>
                        <div class="col-md-4"><a href="" class="text-muted"><span class="glyphicon glyphicon-share"></span> Share</a></div><br><hr>
                    </div>

                    @forelse($questions->replies as $reply)
                        <div class="col-md-11 col-md-offset-1" style="background-color: #f6f7f9; padding: 10px; border:1px solid #d9d9d9;margin-bottom: 1px;">
                        	
                            <div style="float: left; margin-right: 2%;">
                                <img src="{{ 'https://www.gravatar.com/avatar/'.md5(strtolower(trim($reply->user->email))) }}" width="40" height="40">
                            </div>
                            <div style="float: left; width: 80%; margin-right: 2%;">
                                <div>
                                    <p><a href=""><b>{{htmlspecialchars($reply->user->fullname)}}</b></a>
                                        {!! $reply->body !!}</p>
                                </div>
                                <div>
                                    <span class="text-muted">
                                     <span class="glyphicon glyphicon-time"></span> 
                                    {{$reply->created_at->diffForHumans()}}
                                    {{ ($reply->created_at != $reply->updated_at ? ' | Edited '.$reply->updated_at->diffForHumans() : '')}}
                                    </span>
                                </div>
                            </div>
                            <div style="float: left; width: 8%;">
                                <ul class="nav nav-tabs">
                                  <li>
                                    <a data-toggle="dropdown">
                                    <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" style="min-width: 0;">
                                      <li><a href="{{ route('replies.edit', $reply->id) }}" class="btn btn-default">edit</a>
                                      </li>

                                      <li>
                                          {{Form::open(['method'=>'DELETE', 'route'=>['replies.destroy', $reply->id]] )}}
                                          {{Form::submit('delete', ['class'=>'btn btn-default'])}}
                                          {{Form::close() }}
                                      </li>
                                    </ul>
                                  </li>
                                </ul>
                            </div>
                            <div style="clear: both;"></div>
                        </div>

                    @empty
                        <div class="text-center text-muted">
                            <small><em>No replies to this post !</em></small>
                        </div>
                    @endforelse
	                
            	</div>

                    <div class="col-md-12" style="border: 1px solid #d9d9d9; border-radius: 10px; margin-top: 50px;">
                    <p class="text-center"><em>reply to this question</em></p>
                            <div>

                                {{ Form::open(['route'=>'replies.store', 'files'=>true])}}
                                <div class="form-group col-md-12">
                                    {{Form::textarea('body', null, ['class' => 'form-control col-md-12', 'placeholder'=>'Reply to this question', 'id'=>'body', 'rows' => 5])}}
                                </div>

                                <div class="form-group">
                                    {{Form::hidden('question_id', Crypt::encrypt($questions->id)) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::submit('Reply', ['class' => 'btn btn-success btn-block'])}}
                                </div>

                                {{Form::close() }}
                            </div>

                        <div style="clear: both;"></div>
                    </div>
            </div>

            <div class="well col-md-3 col-md-offset-1">

                <h4>Trending !</h4>

            </div>
            
        </div>
    @endsection