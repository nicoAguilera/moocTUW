<!DOCTYPE html>
<html>
<head>
	<title>MOOC</title>
	<link rel="stylesheet" type="text/css" href="{{asset('ContentTools/content-tools.min.css')}}">
	<style>
        .author {
            font-style: italic;
            font-weight: bold;
        }
    </style>
</head>
<body>
	<div data-editable data-name="heading">
		<h1>Plantilla</h1>
	</div>
	<div data-editable data-name="main-content">
		<!--h1 data-editable data-name="heading">Plantilla</h1-->	
		<blockquote>
			Hola mundo!!!
		</blockquote>
		<p class="author">Nicolás Aguilera</p>
	</div>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<script src="{{asset('ContentTools/content-tools.min.js')}}"></script>
	<script src="{{asset('ContentTools/editor.js')}}"></script>
</body>
</html>