@extends('layouts.template')

@section('title', 'Home')

@section('content')

<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
	<div class="col-md-12 px-0 headerblog">
		<h1 class="display-4 font-italic">Blog&White</h1>
		<p class="lead my-3">Share. Relive. Experience.</p>
	</div>
</div>

	<div class="row mb-2">
	
	@foreach ($posts as $post)
	<div class="col-md-6">
		<div class="card flex-md-row mb-4 box-shadow h-md-250 bg-light">
			<div class="card-body d-flex flex-column align-items-start">
				<strong class="d-inline-block mb-2 text-primary">{{ $post->username }}</strong>
				<h3 class="mb-0">
					<a href=post/getpost.php?post_id='.$postid.' class="text-dark">{{ $post->title }}</a>
				</h3>
				<div class="mb-1 text-muted">{{ $post->date_published }}</div>
				<!--<p class="card-text mb-auto">'.limitTextWords($content, 50, true, true).'</p>-->
				<form action="#" method="GET">
					<input type="hidden" name="post_id" value="'.$postid.'">
					<button type="submit" class="btn btn-outline-dark">Continue Reading</a></button>
				</form>
			</div>
		</div>
	</div>



		@endforeach
	</div>

	@stop
