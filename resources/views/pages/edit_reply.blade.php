@extends('layouts.main')

    @section('title', config('app.name').' | '.strip_tags($replies->body))

    {{ HTML::script('https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=e9fix1c1togpupgglxxvjeo0nd67ents8f43hjae965s9lj5') }}
    {{ HTML::script('js/tinymce_replies.js') }}

    @section('content')

    <script type="text/javascript">
        function focusAns() {
            document.getElementById('body').focus();
        }
    </script>

    <script type="text/javascript">
        function goBack() {
           window.history.back(); 
        }
    	
    </script>
    
        <div class="container">
            <div class="col-md-8">
                <div class="col-md-12" style="border: 1px solid #d9d9d9; border-radius: 10px; margin-top: 10px;">
                    <div>
                        {{ Form::model($replies,['method'=>'PUT','route'=>['replies.update', $replies->id]])}}

                            <div class="form-group col-md-12" style="margin-top: 15px;">
                                {{Form::textarea('body', null, ['class' => 'form-control col-md-12', 'placeholder'=>'Reply to this question', 'id'=>'body'])}}
                            </div>

                            <div class="col-md-1 form-group">
                                {{Form::submit('OK', ['class' =>'btn btn-success'])}}
                            </div>
                        {{Form::close() }}
                    </div>

                    <div class="col-md-1">
                        <p class="btn btn-default" onclick="goBack()">ESC</p>
                    </div>
                    
                </div>

            </div>
            
        </div>
    @endsection