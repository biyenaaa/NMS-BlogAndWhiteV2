@extends('layouts.template')
@section('title', 'Registration')

@section('content')

<div class="navig"> 
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
		<!-- <div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<?php
					if(isset($checkUser)and$acc_type=='0'){
						echo '
						<li class="nav-item">
						<a class="nav-link" href="../author/author_blogs.php"> My Blogs <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="../author/create_blogs.php"> Write a Blog <span class="sr-only">(current)</span></a>
						</li>';
					}
					if(isset($checkUser)and$acc_type=='1'){
						echo '
						<li class="nav-item">
						<a class="nav-link" href="../admin/blogs.php">Blogs <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="../admin/authors.php"> Authors <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
						<a class="nav-link" href="../admin/comments.php"> Comments <span class="sr-only">(current)</span></a>
						</li>';
					}
				?>
				</ul>
				<?php
				if(isset($checkUser)){
					echo '
					<span class="navbar-text">
					logged in as '.$checkUser.'
					</span>
					<div class="divider"></div>
					<a href="../logout.php">
					<button type="button" class="btn btn-sm">
					<span class="glyphicon glyphicon-log-out">Log out</span> 
					</button>
					</a>
					';}
					else{
						echo '
						<a href="../login/login.php">
						<button type="button" class="btn btn-sm">
						<span class="glyphicon glyphicon-log-in">Log in</span> 
						</button>
						</a>
						<div class="divider"></div>
						<a href="../registration/register.php">
						<button type="button" class="btn btn-sm">
						<span class="glyphicon glyphicon-log-out">Sign up</span> 
						</button>
						</a>';
					}
					?>
				</div> -->
		</div>
		<br>

		<main role="main" class="container">
			<div class="row">
				<div class="container-fluid">

					<h4>Registration</h4>
					
					<form action="{!! url('/registerProcess'); !!} method="post" name="registration">
						
							<div class="col-sm-6">
								<div class="form-group">
									<label for="username"> Username</label>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input class="form-control" type="text" id="name" name="username" required>
								</div>

								<div class="form-group">
									<label for="password"> Password</label>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input class="form-control" type="password" name="password" required>
								</div>

								<div class="form-group">
									<label for="email"> Email</label>
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input class="form-control" type="email" name="email" required>
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