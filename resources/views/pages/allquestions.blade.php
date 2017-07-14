@extends('layouts.main')

	@section('title', config('app.name').' | All Questions')

	@section('content')
		<div class="container">
			<div class="col-md-8">
				@forelse($questions as $question)
					<div class="col-md-12">
						<a href="{{ route('posts.single', $question->slug)}}"><h3>{{ $question->title }}</h3></a><hr>
					</div>
					<div class="col-md-12">
						<p class="text-info">

	  						{{ substr(strip_tags($question->body), 0, 300)  }}
							{{ strlen(strip_tags($question->body)) > 300 ? '[...]' : '' }}
	  					</p>
					</div>
	  				
	  				<div class="col-md-12" style="border: 1px solid #d9d9d9; padding-top: 5px;">
	  					<div class="col-md-4">
		  					<p class="text-muted"><span class="glyphicon glyphicon-time"></span> {{ $question->created_at->diffForHumans() }}
		  					</p>
		  				</div>
		  				@if($question->replies->count() > 0)
			  				<div class="col-md-4">
			  					<p class="text-muted"><span class="glyphicon glyphicon-comment"></span> Answers ({{ $question->replies->count() }})
			  					</p>
			  				</div>
			  			@else
			  				<div class="col-md-4">
			  					<p class="text-muted"><span class="glyphicon glyphicon-comment"></span><a href="{{route('posts.single',$question->slug)}}"> Be the first to answer</a>
			  					</p>
			  				</div>
			  			@endif
		  				<div class="col-md-4">
		  					<p class="text-muted"><b>Asked By: </b>{{ $question->user->fullname }}
		  					</p>
		  				</div>
	  				</div>

	  			@empty
	  			<h3>No Questions!</h3>
  				@endforelse
			</div>
		    
		</div>
	@endsection