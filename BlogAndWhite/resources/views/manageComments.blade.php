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
						<form action="#" method="get">
							<input type="hidden" name="commentId" value="{!! $comment->comment_id !!}">
							@if ($comment->status == '0')
								<td> <input class="btn btn-outline-dark" type="submit" name="show" value="show"> </td>
							@else
								<td> <input class="btn btn-outline-danger" type="submit" name="hide" value="hide" formaction="#"> </td>
							@endif
						</form>
				</tr>
			@endforeach
		</table>
	</div>
@stop