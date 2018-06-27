@extends('layouts.template')

@section('title', 'Home')

@section('content')
<h1>land</h1>
	@foreach ($posts as $post)
	{{ $post->title }} <br>
	@endforeach
@stop