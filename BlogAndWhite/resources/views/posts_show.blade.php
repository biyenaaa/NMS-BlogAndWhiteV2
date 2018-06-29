@extends('layouts.template')

@section('title', 'Home')

@section('content')


<div class="container wrapper">

		<!-- <div style="padding-top: 20px;" class="col col-sm-10 card-group container form-group"> -->
    	<label for="exampleFormControlTextarea1 container"><h1>{{$post->title}}</h1></label>
    	<span class="align-middle">by: {{$post->username}}</span>
    	<textarea readonly class="form-control rounded-0 " id="exampleFormControlTextarea1" rows="10">{{$post->content}}</textarea>
    	<span class="float-sm-right">
    		Date Posted: {{$post->date_published}}
    	</span>

<!--Displays Comments-->    	
<div class="divider"></div>	
	<br>
	<div style="padding-top: 10px">
		@foreach ($comments as $comment)
				<form class="comments" method="GET">
					<input type="hidden" name="post_id" value="{!! $post->id !!}">
				</form>
				<div class="card col-8">
	  				<div class="card-body">
		    			<h5 class="card-title">{{ $comment->username }}</h5>
		    			<p class="card-text">{{ $comment->comment_content }}</p>
	  				</div>
	  			<h6 class="card-subtitle mb-2 text-muted text-right">{{ $comment->datecommented }}</h6>
				</div>
				<br>
		@endforeach
	</div>
</div>

<!--Leave a comment-->
<div class="divider"></div>
	<h6>Leave a comment:</h6>
		<form class="comment" action="{!! url('/comment'); !!}" method="POST">
			<input type="hidden" name="post_id" value="{!! $post->id !!}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div><input type="text" name="name" placeholder="Name" required></div><br>
			<div><textarea rows="5" cols="60" name="comment_content" placeholder="Comment" required></textarea></div>
			<input type="hidden" name="token" value="{{ csrf_token() }}">

			<button type="submit" class="btn btn-outline-dark">Comment</button>
		</form>
</div>

@stop