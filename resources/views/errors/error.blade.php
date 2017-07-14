@if($errors->any())
 	<div class="alert alert-danger">
    	@foreach($errors->all() as $error)
       		<ul class="list-unstyled">
            	<li class="text-center"><b>{{$error}}</b></li>
            </ul>
    	@endforeach
    </div>
@endif