@extends('layouts.template')

@section('title', 'Edit Blog')

@section('content')
<br>
	<div class="col-12 col-sm-9">
		<form method="post" action="{!! url('/edit'); !!}" name="edit-blog-post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="container-fluid">
				<h4>Edit blog</h4>
				<p>Title: </p>
				<input type="text" size="35" name="title" value="{!! $posts->title !!}">

				<br><br>

				<p>Blog: </p>
				<textarea name="content" cols="100" rows="15" placeholder="Enter text here..." required >{{ $posts->content }}</textarea>

				<div class="container-fluid">
					<input type="hidden" name="postId" value="{!! $posts->id !!}">
					<input type="submit" class="btn btn-outline-dark">
				</div>


			</div>

		</form>
	</div>

@stop