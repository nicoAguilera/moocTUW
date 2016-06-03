<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		@if (Route::currentRouteNamed('welcome'))
			{{ $app_name }} | {{ $app_description }}
		@else
			{{ $title }} - {{ $app_name }}
		@endif
	</title>

	<!--  Bootstrap -->
	<link href="{{ asset('MDB/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Material Design Bootstrap -->
    <link href="{{ asset('MDB/css/mdb.min.css') }}" rel="stylesheet">
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->

    <style type="text/css">
    	@media (min-width: 544px) {
			.navbar-right {
				float: right !important;
				margin-right: -15px;
			}
		}
    </style>

	<!-- /CSS -->

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<script src="https://use.fontawesome.com/0f001b167c.js"></script>
	<!-- /Fonts -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	@include ('layouts._navbar')

	@include ('layouts._alerts')

	@yield ('content')

	<!--  Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-rc1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="{{ asset('MDB/js/tether.min.js') }}"></script>
	<script src="{{ asset('MDB/js/mdb.min.js') }}"></script>
	<!-- /Scripts -->
</body>
</html>
