@extends('layouts.template')
@section('title', 'Registration')

@section('content')

		<br>

		<main role="main" class="container">
			<div class="row">
				<div class="container-fluid">

					<h4>Registration</h4>
					
					<form action="{!! url('registerProcess'); !!}" method="post" name="registration">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="col-sm-6"> 
								<div class="form-group">
									<label for="username"> Username</label>
									<input class="form-control" type="text" id="name" name="username" required>
									<
									@if(Session::has('errmsg1'))
										{{ Session::get('errmsg1') }}
									@endif
								</div>

								<div class="form-group">
									<label for="email"> Email</label>
									<input class="form-control" type="email" name="email" required>
								</div>

								<div class="form-group">
									<label for="password"> Password</label>
									<input class="form-control" type="password" name="password" min="8" required>
									{{ Session::get('errmsg2') }}
								</div>

								<div class="form-group">
									<label for="password_confirmation"> Re-enter Password </label>
									<input class="form-control" type="password" name="password_confirmation" min="8" required>
									{{ Session::get('errmsg3') }}
								</div>

								<div class="form-group">
									<button class="btn btn-outline-dark"git type="submit" name="Submit">Register</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		</main>

@stop