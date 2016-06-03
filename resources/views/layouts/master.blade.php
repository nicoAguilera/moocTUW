<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Font Awesome -->
      <script src="https://use.fontawesome.com/0f001b167c.js"></script>

      <!--Import materialize.css-->
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">



      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <title>
        @if (Route::currentRouteNamed('home'))
          {{ $app_name }} | {{ $app_description }}
        @else
          {{ $title }} - {{ $app_name }}
        @endif
      </title>
    </head>

    <body>
      @include ('layouts._navbar_matcss')

      @include ('layouts._alerts')

      @yield ('content')


      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

      <script type="text/javascript">
        $( document ).ready(function(){
          $(".button-collapse").sideNav();
        });
      </script>
    </body>
</html>