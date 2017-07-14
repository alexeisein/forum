@extends('layouts.main')

	@section('title', '| Profile Settings')

	@section('content')
		<div class="container">
	        <div class="row">
	            <div class="col-md-12">
	                <div class="panel panel-default">
	                    <div class="panel-heading">profile</div>

	                    <div class="panel-body">
	                        <div class="row">

	                          <div class="col-xs-6 col-md-3">
							    <a href="{{ route('questions.index') }}" class="thumbnail">
							      <img src="{{ asset('images/profile/askquestion.jpg') }}" alt="ask a question">
							   	</a>
							   	<a class="btn btn-primary col-xs-12 col-md-12" href="{{ route('questions.index') }}">Ask Question</a>
							  </div>

							  <div class="col-xs-6 col-md-3">
							    <a href="#" class="thumbnail">
							      <img src="{{ asset('images/profile/uploadphoto.jpg') }}" alt="upload photo">
							   	</a>
							   	<a class="btn btn-primary col-xs-12 col-md-12" href="">Upload Photo</a>
							  </div>

							  <div class="col-xs-6 col-md-3">
							    <a href="#" class="thumbnail">
							      <img src="{{ asset('images/profile/previewprofile.jpg') }}" alt="ask a question">
							   	</a>
							   	<a class="btn btn-primary col-xs-12 col-md-12" href="">Preview Profile</a>
							  </div>

							  <div class="col-xs-6 col-md-3">
							    <a href="#" class="thumbnail">
							      <img src="{{ asset('images/profile/editprofile.jpg') }}" alt="ask a question">
							   	</a>
							   	<a class="btn btn-primary col-xs-12 col-md-12" href="">Edit Profile</a>
							   	<br>
							  </div>

							  <div class="col-xs-6 col-md-3">
							    <a href="#" class="thumbnail">
							      <img src="{{ asset('images/profile/cancel.jpg') }}" alt="ask a question">
							   	</a>
							   	<a class="btn btn-primary col-xs-12 col-md-12" href="">Cancel Profile</a>
							  </div>

							

							  
							</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	@endsection