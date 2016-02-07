@if ($errors->any())
<div class="alert alert-danger" role="alert">
		@foreach($errors->all() as $error)
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<span class="sr-only">Error:</span>{{$error}} <br>
		@endforeach
</div>
@endif