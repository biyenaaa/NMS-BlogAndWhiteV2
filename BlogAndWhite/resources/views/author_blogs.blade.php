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
				    
					
						<form action="{!! url('/author/deleteblog'); !!}" method="post">
							<a href="/posts/{{$post->id}} "><button type="button"  class="btn btn-info">View</button></a>
				    	<a href="/editblog/{{$post->id}} "><button type="button"  class="btn btn-info">Edit</button></a>
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="postId" value="{!! $post->id !!}">
							@if($post->status == '1')
								<input type="hidden" name="status" value="">
								<button type="submit" href="#" class="btn btn-outline-danger">Delete</button>
							@endif
						</form>

				  </div>
				</div>
			@endforeach
		</div>
	@endif
	
@stop
