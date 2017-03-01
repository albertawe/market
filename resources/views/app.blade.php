<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/css/jquery-ui.css') }}">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Toko Online Laravel 5</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				@if (Auth::guest())
					<li><a href="{{ url('/') }}">Home</a></li>
				@else
					<li><a href="{{ url('/dashboard') }}">Home</a></li>
					<li><a href="{{ url('dashboard/product') }}">Data Produk</a></li>
					<li><a href="{{ url('/dashboard/laporan') }}">Laporan Transaksi</a></li>
				@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
					@else
					<li><a href="{{ url('/') }}">Lihat Toko</a></li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
<script src="{{ asset('/js/jquery-1.10.2.js') }}"></script>
<script src="{{ asset('/js/jquery-ui.js') }}"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
	 $( "#datepicker2" ).datepicker();
  });
  </script>

</body>
</html>
