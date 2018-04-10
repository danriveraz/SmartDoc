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
    <title>Welcome</title>
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
                    <a class="dropdown-item" href="#">
                      <span>Editar perfil</span>
                    </a>
                    <a class="dropdown-item" href="#">
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
                    <a href="./index.html" class="nav-link active"><i class="fe fe-home"></i> Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-box"></i> Mi Personal</a>
                    <div class="nav-submenu nav">
                      <a href="./cards.html" class="nav-item ">Cards design</a>
                      <a href="./charts.html" class="nav-item ">Charts</a>
                      <a href="./pricing-cards.html" class="nav-item ">Pricing cards</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-calendar"></i> Components</a>
                    <div class="nav-submenu nav">
                      <a href="./maps.html" class="nav-item ">Maps</a>
                      <a href="./icons.html" class="nav-item ">Icons</a>
                      <a href="./store.html" class="nav-item ">Store</a>
                      <a href="./blog.html" class="nav-item ">Blog</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-file"></i> Pages</a>
                    <div class="nav-submenu nav">
                      <a href="./profile.html" class="nav-item ">Profile</a>
                      <a href="./login.html" class="nav-item ">Login</a>
                      <a href="./register.html" class="nav-item ">Register</a>
                      <a href="./forgot-password.html" class="nav-item ">Forgot password</a>
                      <a href="./400.html" class="nav-item ">400 error</a>
                      <a href="./104.html" class="nav-item ">401 error</a>
                      <a href="./403.html" class="nav-item ">403 error</a>
                      <a href="./404.html" class="nav-item ">404 error</a>
                      <a href="./500.html" class="nav-item ">500 error</a>
                      <a href="./503.html" class="nav-item ">503 error</a>
                      <a href="./email.html" class="nav-item ">Email</a>
                      <a href="./empty.html" class="nav-item ">Empty page</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="./form-elements.html" class="nav-link"><i class="fe fe-check-square"></i> Forms</a>
                  </li>
                  <li class="nav-item">
                    <a href="./gallery.html" class="nav-link"><i class="fe fe-image"></i> Gallery</a>
                  </li>
                  <li class="nav-item">
                    <a href="./docs/index.html" class="nav-link"><i class="fe fe-file-text"></i> Documentation</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="page-content">
          <div class="container">
            <div class="page-header">
              
            </div>
            <div class="row row-cards row-deck">
              <div class="">
                @yield('content')
              </div>
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