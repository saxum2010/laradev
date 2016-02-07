@extends('app')

@section('content')
<h1>Create new Article</h1>
<hr>
{!! Form::model($article = new \App\Article, ['url'=>'articles']) !!}
	@include('articles.form', ['submitButtonText'=>'Добавить'])
{!! Form::close() !!}

@include('errors.list')

@stop