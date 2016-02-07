@extends('app')
@section('content')
<h1>About</h1>

<h3>People I like</h3>

@if (count($people))
<ul>
	@foreach($people as $person)
		<li>{{$person}}</li>
	@endforeach
</ul>
@endif
	<p>
		Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam accusantium aut, recusandae quia voluptatibus id inventore necessitatibus vitae, unde harum ea tempora saepe? Non voluptate, ea velit similique soluta porro.
	</p>
@stop