<!DOCTYPE html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">

      <!-- Estilos para todo el proyecto -->
      <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

      <title>
        @if (Route::currentRouteNamed('welcome'))
          {{ $app_name }} | {{ $app_description }}
        @else
          {{ $title }} - {{ $app_name }}
        @endif
      </title>

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>
      @include ('layouts._header')

      <main>
        @include('layouts._breadcrumbs')

        @include ('layouts._alerts')

        @yield ('content')
      
      </main>

      <!-- SCRIPT -->
      <!-- jQuery -->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      
      <!-- Materialize -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

      <!-- Font Awesome -->
      <script src="https://use.fontawesome.com/0f001b167c.js"></script>

      <!-- Inicializo la barra de navegación lateral para pantallas chicas -->
      <script type="text/javascript">
        $( document ).ready(function(){
          $(".button-collapse").sideNav();
        });
      </script>
      <!-- /SCRIPT -->

    </body>
</html>