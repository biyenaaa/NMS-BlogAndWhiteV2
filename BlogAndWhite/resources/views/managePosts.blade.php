
@extends('layouts.template')
@section('title', 'Manage Posts')

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
						<form action="{!! url('/admin/manage_posts/update_post'); !!}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="postId" value="{!! $post->id !!}">
							@if ($post->status == '0')
								<input type="hidden" name="status" value="1">
								<td> <button class="btn btn-outline-dark" type="submit">publish</button> </td>
							@else
								<input type="hidden" name="status" value="0">
								<td> <button class="btn btn-outline-danger" type="submit">unpublish</button> </td>
							@endif
						</form>
				</tr>
			@endforeach
		</table>
	</div>
@stop