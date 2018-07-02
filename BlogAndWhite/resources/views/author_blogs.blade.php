@extends('layouts.template')

@section('title', 'My Blogs')

@section('content')
	@if (count($posts)==0)
		<div style="margin-top: 10%;" class="container"><center> You have no blogs yet </center></div>
		<center><a class="nav-link" href="{!! url('/blog_form'); !!}"> Create My First Blog <span class="sr-only"></span></a></center>
	@else
		<div class="container-fluid">
			<div class="accordion" id="accordionExample">
				@foreach ($posts as $post)
					<div class="container">
						<h4>{{ $post->title }} </h4>
						<p>{{ $post->date_published }} </p>
						<button type="button" href="#" class="btn btn-info" data-toggle="collapse" data-target="#demo">View</button>
						<div id="demo" class="collapse">
							{{ $post->content }}
						</div>
					</div>
				@endforeach

			</div>
		</div>
	@endif
	
@stop
