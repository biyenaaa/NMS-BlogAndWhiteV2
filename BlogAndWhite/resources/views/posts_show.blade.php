@extends('layouts.template')

@section('title', 'Home')

@section('content')


<div class="container wrapper">

		<!-- <div style="padding-top: 20px;" class="col col-sm-10 card-group container form-group"> -->
    	<label for="exampleFormControlTextarea1 container"><h1>{{$post->title}}</h1></label>
    	<span class="align-middle">by: {{$post->username}}</span>
    	<textarea readonly class="form-control rounded-0 " id="exampleFormControlTextarea1" rows="10"><{{$post->content}}</textarea>
    	<span class="float-sm-right">
    		Date Posted: {{$post->date_published}}
    	</span>
    	
	<div class="divider"></div>	

<br>

@stop