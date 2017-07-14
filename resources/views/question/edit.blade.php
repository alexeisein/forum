@extends('layouts.app')
@section('title', config('app.name').' | '.$questions->title)

    {{ HTML::script('js/questions.js') }}

    {{ HTML::script('https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=e9fix1c1togpupgglxxvjeo0nd67ents8f43hjae965s9lj5') }}
    {{ HTML::script('js/tinymce.js') }}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default col-md-4">
                    <div class="panel-heading">Ask a question</div>
                        <div class="panel-body">
                            {{ Form::open(['route' => 'questions.store']) }}

                            <div class="form-group">
                               {{ Form::label('title', 'Title: ', [
                               'class' => 'control-label'
                               ]) }}

                               {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Type question title'])}}
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
                    <div class="panel-heading">Your Questions</div>
                        <div class="panel-body">
                        <div>
                          
                        </div>
                            {{ Form::model($questions,['method' => 'PUT', 'route' => ['questions.update', $questions->id]]) }}

                            <div class="form-group">
                               {{ Form::label('title', 'Title: ', [
                               'class' => 'control-label'
                               ]) }}

                               {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Type question title'])}}
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
                                {{ Form::submit('SAVE', ['class' => 'btn btn-success']) }}
                                <a href="{{route('questions.index')}}" class="btn btn-warning">RETURN BACK</a>
                            </div>
                            {{ Form::close() }}

                            {{ Form::open(['method' => 'DELETE', 'route' => ['questions.destroy', $questions->id]]) }}

                            {{ Form::submit('Delete this question', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
