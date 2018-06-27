@extends('layouts.template')
@section('title', 'Manage Accounts')

@section('content')

	<div class="page-header text-center"><h1>Blogs</h1></div>
	<div class=" container col col-sm-8 ">
		<table class="table table-bordered table-hover">
			<thead>
			    <tr>
			      <th scope="col">Title</th>
			      <th scope="col">Author</th>
			      <th scope="col">Date Published</th>
			      <th scope="col">Post</th>
			    </tr>
	  		</thead>
			@foreach ($posts as $post)
				<tr>
					<td>{{ $post->title }}</td>
					<td> {{ $post->username}} </td>
					<td>{{ $post->date_published }}</td>
						<form action="publish.php" method="get">
							<input type="hidden" name="postId" value="{!! $post->post_id !!}">
							@if ($post->status == '0')
								<td> <input class="btn btn-outline-dark" type="submit" name="enable" value="publish"> </td>
							@else
								<td> <input class="btn btn-outline-danger" type="submit" name="disable" value="unpublish" formaction="unpublish.php"> </td>
							@endif
						</form>
				</tr>
			@endforeach
		</table>
	</div>
@stop