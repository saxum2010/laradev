@extends('app')

@section('content')
<h1>Edit: {{$article->title}}</h1>
<hr>
{!! Form::model($article,['method'=>'PATCH', 'action'=>['ArticlesControlles@update',$article->id]]) !!}
	@include('articles.form', ['submitButtonText'=>'Изменить'])
{!! Form::close() !!}

@include('errors.list')

@stop