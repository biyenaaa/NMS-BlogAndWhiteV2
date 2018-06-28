@extends('layouts.template')
@section('title', 'Manage Comments')

@section('content')

	<div class="page-header text-center"><h1>Comments</h1></div>
	<div class=" container col col-sm-8 ">
		<table class="table table-bordered table-hover">
			<thead>
			    <tr>
			      <th scope="col">Name</th>
			      <th scope="col">Post</th>
			      <th scope="col">Comment</th>
			      <th scope="col">Date</th>
			      <th scope="col">Visible</th>
			    </tr>
	  		</thead>
			@foreach ($comments as $comment)
				<tr>
					<td>{{ $comment->name }}</td>
					<td> {{ $comment->title}} </td>
					<td>{{ $comment->comment_content }}</td>
					<td>{{ $comment->date_commented }}</td>
						<form action="{!! url('/admin/manage_comments/update_comment'); !!}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="commentId" value="{!! $comment->id !!}">
							@if ($comment->status == '0')
								<input type="hidden" name="status" value="1">
								<td> <button class="btn btn-outline-dark" type="submit">display</button> </td>
							@else
								<input type="hidden" name="status" value="0">
								<td> <button class="btn btn-outline-danger" type="submit">hide</button> </td>
							@endif
						</form>
				</tr>
			@endforeach
		</table>
	</div>
@stop