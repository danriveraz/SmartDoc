<!doctype html>
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
    <title>POCKET</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

    <!--Scripts-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/require.min.js')}}"></script>

    <script>
      requirejs.config({
          baseUrl: '.'
      		});
    </script>
    <!-- Dashboard Core -->
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <!-- c3.js Charts Plugin -->
    <link href="{{asset('assets/plugins/charts-c3/plugin.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/plugins/charts-c3/plugin.js')}}"></script>
    <!-- Google Maps Plugin -->
    <link href="{{asset('assets/plugins/maps-google/plugin.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/plugins/maps-google/plugin.js')}}"></script>
    <!-- Input Mask Plugin -->
    <script src="{{asset('assets/plugins/input-mask/plugin.js')}}"></script>

    <!--Fileupload-->
    {!!Html::style('stylesheets\jquery.fileupload-ui.css')!!}
    {!!Html::script("javascripts\bootstrap-fileupload.js")!!}

    <!--Fancybox-->
    {!!Html::style('stylesheets\jquery.fancybox.css')!!}
    {!!Html::script("javascripts\jquery.fancybox.pack.js")!!}

    <!--Estilos para imagen perfil -->    
    {!!Html::style('stylesheets/style.css')!!}
    {!!Html::style('stylesheetspropio\stylePropio.css')!!}
    <!-- End scripts-->

  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header">
          <div class="container">
            <div class="d-flex">
              <a class="navbar-brand" href="{{url('/WelcomeAdmin')}}">
                <img src="{{asset('images/logoEmail.png')}}" class="navbar-brand-img" alt="logo">
              </a>
              <div class="ml-auto d-flex order-lg-2">
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url({{asset('images/admin/'.$user->imagen)}}"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{Auth::User()->nombreCompleto}}</span>
                      <small class="text-muted d-block mt-1">Administrator</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="{{url('Perfil')}}">
                      <span>Editar perfil</span>
                    </a>
                    <a class="dropdown-item" href="{{url('Configuracion')}}">
                      <span>Configuración</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">¿Neceista ayuda? </a>
                    <a class="dropdown-item" href="{{url('Auth/logout')}}">Salir</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header-nav d-none d-lg-flex">
          <div class="container">
            <div class="row align-items-center">
              <div class="col">
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a href="{{url('/WelcomeAdmin')}}" class="nav-link"><i class="fa fa-home"></i>Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link"><i class="fa fa-users"></i>Mi Personal</a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link"><i class="fa fa-smile-o"></i>Procedimientos</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link"><i class="fa fa-suitcase"></i>Inventario</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link"><i class="fa fa-truck"></i>Laboratorio</a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link"><i class="fa fa-file-text"></i>Historias Clinicas</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="page-content">
          <div class="container">
            <div class="">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
            PocketCompany © 2018  All rights reserved.
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>