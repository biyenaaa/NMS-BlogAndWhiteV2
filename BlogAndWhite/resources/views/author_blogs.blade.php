@extends('layouts.template')

@section('title', 'My Blogs')

@section('content')

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
	
@stop
