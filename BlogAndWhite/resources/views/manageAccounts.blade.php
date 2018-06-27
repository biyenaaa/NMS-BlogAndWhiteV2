@extends('layouts.template')
@section('title', 'Manage Accounts')

@section('content')

	<div class="page-header text-center"><h1>Accounts</h1></div>
	<div class=" container col col-sm-8 ">
		<table class="table table-bordered table-hover">
			<thead>
		    	<tr>
			      <th scope="col">Username</th>
			      <th scope="col">Date Joined</th>
			      <th scope="col">Account</th>
			    </tr>
  			</thead>
			@foreach ($accounts as $account)
				<tr>
					<td>{{ $account->username }}</td>
					<td> {{ $account->date_registered }} </td>
						<form action="{!! url('/admin/manage_accounts/update_account'); !!}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="accId" value="{!! $account->id !!}">
							@if ($account->status == '0')
								<input type="hidden" name="status" value="1">
								<td> <button class="btn btn-outline-dark" type="submit">enable</button> </td>
							@else
								<input type="hidden" name="status" value="0">
								<td> <button class="btn btn-outline-danger" type="submit">disable</button> </td>
							@endif
						</form>
				</tr>
			@endforeach
		</table>
	</div>
@stop