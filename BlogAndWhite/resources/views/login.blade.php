@extends('layouts.template')

@section('title', 'Signin')

@section('content')
<div class="panel panel-default">
	<div class="border-dark" style="border-color: black;">
		<div class="panel-body">
			<br><br><br>
			<center><h2>Blog & White</h2></center>
			<form class="form-login" action="{!! url('doLogin'); !!}" method="POST">
				<center>
				<table>
					<tr>
						<td><label for="uname">Username</label></td>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" method="POST">
						<td><input type="text" name="username" required><br/></td>
					</tr>

					<tr>
						<td><label for="psw">Password</label></td>
						<input type="hidden" method="POST">
						<td><input type="password" name="password" required><br/></td>
					</tr>
				</table>
				
					<br>
					<center><button type="submit" class="btn btn-outline-dark">Sign-in</button></center></td>
					<br>
					<center class="psw">Don't have an account? <a href="../registration/register.php">Sign-up</a></center>
				</center>
			</form>
	</div>
</div>

@stop