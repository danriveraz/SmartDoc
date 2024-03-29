<!doctype html><!--Realizado por Daniel Alejandro Rivera, ing-->
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-03-27 13:25:03 +0200 -->
    <title>SmartDoc</title>
    <link type="image/x-icon" rel="shortcut icon" href="assetsNew/images/icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      		});
    </script>
    <!-- Dashboard Core -->
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <script src="./assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="./assets/plugins/input-mask/plugin.js"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="./assets/brand/tabler.svg" class="h-6" alt="">
              </div>
              {!! Form::open(['route' => ['password.postresetPassword'], 'class' => 'card' ,'method' => 'GET','enctype' => 'multipart/form-data']) !!}
              {{ csrf_field() }}
                <div class="card-body p-6">
                  <div class="card-title">Recuperar contraseña</div>
                  <p class="text-muted">Ingresa tu correo electrónico y se enviará una nueva contraseña a esa dirección.</p>
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Correo" required="true">
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Enviar nueva contraseña</button>
                  </div>
                </div>
              {{ Form::close() }}
              <div class="text-center text-muted">
                Olvídalo, quiero <a href="{{url('/')}}">volver</a> a la pantalla principal.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>