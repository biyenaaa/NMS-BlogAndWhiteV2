<?php 
  $session=Session::get('loggedIn');
  $username = $session['username'];
?>

<!DOCTYPE html>
<html>
<head>
	<title> @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="style/images/logo.png">
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
</head>
<body style="padding-bottom:10%">


    @section('navbar')
     <div class="navig"> 
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="{!! url('/'); !!}">Blog & White</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            
            @if(isset($username))
               
               @if(Session::get('isAdmin'))
                  <!-- Navigation for Author accounts -->
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="{!! url('/admin'); !!}"> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{!! url('/admin/manage_posts'); !!}"> Blogs <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{!! url('/admin/manage_accounts'); !!}"> Authors <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{!! url('/admin/manage_comments'); !!}"> Comments <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{!! url('/author/my_blogs'); !!}"> My Blogs <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{!! url('/blog_form'); !!}"> Write a Blog <span class="sr-only"></span></a>
                    </li>
                  </ul>

                  <span class="navbar-text">
                    {{$username}}
                  </span>
                  <a href="{!! url('/logout'); !!}">
                  <button type="button" class="btn btn-sm">
                    <span class="glyphicon glyphicon-log-out">Log out</span> 
                  </button>
                  </a>

                @else
                  <!-- Navigation for Admin -->
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="{!! url('/author/my_blogs'); !!}"> My Blogs <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{!! url('/blog_form'); !!}"> Write a Blog <span class="sr-only">(current)</span></a>
                    </li>
                  </ul>

                  <span class="navbar-text">
                    {{$username}}
                  </span>
                  <a href="{!! url('/logout'); !!}">
                  <button type="button" class="btn btn-sm">
                    <span class="glyphicon glyphicon-log-out">Log out</span> 
                  </button>
                  </a>
                  
              @endif

            @else

              <!-- Navigation for visitor -->
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    Welcome
                  </li>
                </ul>

                <span class="navbar-text">
               {{$username}}
                </span>
                <a href="{!! url('/login'); !!}">
                <button type="button" class="btn btn-sm">
                  <span class="glyphicon glyphicon-log-out">Sign In</span> 
                </button>
                </a>
                <a href="{!! url('/register'); !!}">
                <button type="button" class="btn btn-sm">
                  <span class="glyphicon glyphicon-log-out">Sign Up</span> 
                </button>
                </a>
            @endif
          </div>
        </nav>
      </div>

           
            
            <!-- Navigation for Admin -->
            <!-- <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="../author/author_blogs.php"> Posts <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../author/author_blogs.php"> Accounts <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../author/author_blogs.php"> Comments <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../author/author_blogs.php"> My Blogs <span class="sr-only"></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../author/create_blogs.php"> Write a Blog <span class="sr-only"></span></a>
              </li>
            </ul> -->


            


    <div class="container">
      @yield('content')

    </div>


    
    @section('footer')
    <style>
    .footer {
        position: fixed;
        bottom: 0%;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 9%;
        background-color: #f5f5ef;
        color: black;
        text-align: center;
        font-size: 2vh;
        float: bottom;
    }

    </style>
    <div class="text-muted footer">
      <span>
        Blog & White <br/>
        Aika Vien Dayrit |
          Chaserylle Know-well Sison | 
          Lovelyn Paris,
          <br/>
          2018
      </span>
    </div>
        
        </body>
    </html>
