<!DOCTYPE html>
<html lang="en">
<head>	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A Blog Laravel 5">
	<meta name="author" content="Akhmad Dharma Kasman">

 <title>Toko Online Laravel 5</title>

    <!-- Bootstrap Core CSS -->
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/toko.css') }}" rel="stylesheet">

	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

       <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">Toko Online Laravel 5</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                </ul>
			<nav class="navbar-form navbar-right" role="search">
			@if (Auth::guest())
				  <a href="{{ url('/auth/login') }}" class="btn btn-info" role="button">Login</a>
			@else 
				  <a href="{{ url('/dashboard') }}" class="btn btn-warning" role="button">Dashboard</a>
				  <a href="{{ url('/auth/logout') }}" class="btn btn-success" role="button">Logout</a>
			@endif
		   </nav>	
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>Toko Online Laravel!</h1>
            <p>Selamat datang di toko online dengan platform Laravel 5.</p>
            <p><a class="btn btn-primary btn-large">Selamat Berbelanja!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
				@yield('content')
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center">Copyright &copy; Akhmad Dharma Kasman 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
<script src="{{ asset('/js/jquery.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
</body>

</html>
