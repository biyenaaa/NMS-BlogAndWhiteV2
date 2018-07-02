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
				    <!-- Button to Open the Modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					  Edit
					</button>
				  </div>
				</div>
				<!-- The Modal -->
				<div class="modal container-fluid" id="myModal">
				  <div class="modal-dialog">
				    <div class="modal-content">

				      <!-- Modal Header -->
				      <div class="modal-header">
				        <h4 class="modal-title">{{ $post->title }}</h4>
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				      </div>

				      <!-- Modal body -->
				      <div class="modal-body">
				        <form method="post" action="{!! url('/edit'); !!}" name="edit-blog-post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="container-fluid">
							<h4>Edit blog</h4>
							<p>Title: </p>
							<input type="text" size="35" name="title" value="{!! $post->title !!}">

							<br><br>

							<p>Blog: </p>
							<textarea name="content" cols="60" rows="15" placeholder="Enter text here..." required >{{ $post->content }}</textarea>
						</div>
				      </div>
				      <!-- Modal footer -->
				      <div class="modal-footer">
				        <div class="container-fluid">
							<input type="hidden" name="postId" value="{!! $post->id !!}">
							<input type="submit" class="btn btn-outline-dark">
						</div>
				      </div>
				      </form>
				    </div>
				  </div>
				</div>

			@endforeach
		</div>
	@endif
	
@stop


