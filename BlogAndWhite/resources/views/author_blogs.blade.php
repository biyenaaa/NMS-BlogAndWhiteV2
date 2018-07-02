@extends('layouts.template')

@section('title', 'My Blogs')

@section('content')
	@if (count($posts)==0)
		<div style="margin-top: 10%;" class="container"><center> You have no blogs yet </center></div>
		<center><a class="nav-link" href="{!! url('/blog_form'); !!}"> Write a Blog <span class="sr-only"></span></a></center>
	@else
		<div class="container-fluid col-md-8">
			@foreach ($posts as $post)
				<div class="card ">
				  <div class="card-body">
				    <h4 class="card-title">{{ $post->title }}</h4>
				    <p class="card-text">
				    	{{ $post->date_published }}
				    </p>
				    <a href="/posts/{{$post->id}} "><button type="button"  class="btn btn-info">View</button></a>
				    <a href="/editblog/{{$post->id}} "><button type="button"  class="btn btn-info">Edit</button></a>
				  </div>
				</div>
			@endforeach
		</div>
	@endif
	
@stop
