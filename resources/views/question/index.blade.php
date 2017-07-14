@extends('layouts.app')
@section('title', config('app.name').' | Ask Questions')

    {{ HTML::script('js/questions.js') }}
    {{ HTML::script('https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=e9fix1c1togpupgglxxvjeo0nd67ents8f43hjae965s9lj5') }}
    {{ HTML::script('js/tinymce.js') }}


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default col-md-4">
                    <div class="panel-heading"><h4 class="text-center">Ask a question</h4></div>

                        @include('errors.error')

                        <div class="panel-body">
                            {{ Form::open(['route' => 'questions.store', 'files' => true, 'autocomplete' => 'off']) }}

                            <div class="form-group">
                               {{ Form::label('title', 'Title: ', [
                               'class' => 'control-label'
                               ]) }}

                               {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Type question title','id'=>'title', 'onkeyup'=>'updateSlug()'])}}
                            </div>

                            <div class="form-group">
                                {{ Form::label('category_id', 'Select Category: ', ['class' => 'control-label']) }}

                                {{ Form::select('category_id', $categoryId, null, ['class' => 'form-control']) }}

                            </div>

                            <div class="form-group">
                                {{Form::label('slug', 'URL Slug: ',['class'=>'control-label']) }}

                                {{Form::text('slug', null, ['class' => 'form-control','placeholder'=>'url-slug','id'=>'slug'])}}
                            </div>

                            <div class="form-group">
                               {{ Form::label('body', 'Body: ', ['class' => 'control-label'
                               ]) }}

                               {{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Type your question here'])}}
                            </div>

                            <div class="form-group">
                                {{ Form::submit('POST QUESTION', ['class' => 'btn btn-primary']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                </div>

                <div class="panel panel-default col-md-8">
                    <div class="panel-heading"><h4 class="text-center">The Questions you have asked</h4></div>
                        <div class="panel-body">
                        
                            @foreach($questions as $question)
                                <div class="col-md-12">
                                    <div class="col-md-9">
                                        <div><h4><a href="{{ route('posts.single', $question->slug)}}" target="_blank">{{ $question->title }}</a></h4></div>

                                        <div>
                                            <p>
                                                {{ substr(strip_tags($question->body), 0,200) }}
                                                {{ strlen(strip_tags($question->body)) > 200 ? '[...]' : '' }}
                                            </p>
                                        </div>

                                        <div class="pull-left">
                                            <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-warning">
                                            Edit this question
                                            </a>
                                        </div>

                                        <div class="col-md-offset-4">
                                            {{ Form::open(['method' => 'DELETE', 'route' => ['questions.destroy', $question->id]]) }}
                                            {{ Form::submit('Delete this question', ['class' => 'btn btn-danger']) }}
                                            {{ Form::close() }}
                                        </div>
                                    </div>

                                    <div class="well col-md-3">
                                         <p>
                                            <b>Created Date: </b><br>{{ $question->created_at->diffForHumans() }}
                                        </p><hr>
                                        <p>
                                            <b>Modified Date: </b><br>{{ $question->updated_at->diffForHumans() }}
                                        </p>
                                    </div>
                                   
                                </div>

                            @endforeach
                        </div>
                </div>
                <div>
                    {{-- {{ $questions::links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
