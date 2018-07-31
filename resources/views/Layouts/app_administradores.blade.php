<!doctype html>
<html lang="en">
<!--Realizado por Daniel Alejandro Rivera, ing-->
  <head>
    <!--Para el datatable -->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
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
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assetsNew/images/icon(2).png')}}" />
    <!-- Generated: 2018-03-27 13:25:03 +0200 -->
    <title>SmartDoc</title>
    <link type="image/x-icon" rel="shortcut icon" src="{{asset('assetsNew/images/icon(2).png')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

    <!--Scripts-->

    <!-- PARA DATATABLE CON ICONOS -->

    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <!--<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>-->
    {!!Html::script("javascripts\datatable-editable.js")!!}
    {!!Html::script("javascripts\jquery.dataTables.js")!!}
    {!!Html::script("javascripts\jquery.dataTables.min.js")!!}
    {!!Html::style('stylesheets\datatables.css')!!}
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css"> -->
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js">
    </script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js">
    </script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>

    {!!Html::style('css\buttons.dataTables.css')!!}
    <!-- FIN -->

    <script src="{{asset('assets/js/require.min.js')}}"></script>
    
    <script>
    // ajax para verificar que el usuario esté logueado y así no dejar ver la página
     $(document).ready(function(){
        console.log("ejecuta al cargar");
            $.ajax({
              type: "POST",
              url: '{{url('Auth/verificarUser')}}',
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              success: function (data) { //anunciar creado autor
                console.log("sigue logueado");
              }, error: function(xhr,status, response) {
                console.log("ya no está logueado");
                window.history.forward();
              }
        });
    });
    </script>


    <script>
      requirejs.config({
          baseUrl: '.'
      		});
    </script>
    <!-- Dashboard Core -->
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
    <!-- c3.js Charts Plugin-->
    <link href="{{asset('assets/plugins/charts-c3/plugin.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/plugins/charts-c3/plugin.js')}}"></script>
    <!-- Google Maps Plugin-->
    <link href="{{asset('assets/plugins/maps-google/plugin.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/plugins/maps-google/plugin.js')}}"></script>
    <!-- Input Mask Plugin-->
    <script src="{{asset('assets/plugins/input-mask/plugin.js')}}"></script>

    <!--Fileupload-->
    {!!Html::style('stylesheets\jquery.fileupload-ui.css')!!}
    {!!Html::script("javascripts\bootstrap-fileupload.js")!!}

    <!--Fancybox-->
    {!!Html::style('stylesheets\jquery.fancybox.css')!!}
    {!!Html::script("javascripts\jquery.fancybox.pack.js")!!}

    <!--Estilos para imagen perfil-->
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
                <img src="{{asset('images/logo smartdoc 240x50.png')}}" class="navbar-brand-img" alt="logo">
              </a>
              <div class="ml-auto d-flex order-lg-2">
                
                <div class="dropdown">
                  <a href="#"  class="espacio nav-link pr-0" data-toggle="dropdown" >
                    <span class="avatar" style="background-image: url({{asset('images/admin/'.$empresa->imagen)}}"></span>
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
                    <a class="dropdown-item" href="{{url('Auth/logout')}}">Salir</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header-nav d-none d-lg-flex">
          <div class="container-fluid main-nav clearfix">
            <div class="nav-collapse">
              <div class="col">
                <ul class="nav layout-icons">
                  <li class="nav-item">
                    <a href="{{url('/WelcomeAdmin')}}" class="nav-link" title="Agenda">
                      <span aria-hidden="true">
                        <img src="{{asset('images/layout-icons/1.png')}}">
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/Personal')}}" class="nav-link" title="Personal">
                      <span aria-hidden="true">
                        <img src="{{asset('images/layout-icons/2.png')}}">
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('/Procedimiento')}}" class="nav-link" title="Procedimientos">
                        <span aria-hidden="true">
                        <img src="{{asset('images/layout-icons/3.png')}}">
                      </span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('/Servicio')}}" class="nav-link" title="Servicios">
                        <span aria-hidden="true">
                        <img src="{{asset('images/layout-icons/4.png')}}">
                      </span>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/Laboratorio')}}" class="nav-link" title="Laboratorio">
                      <span aria-hidden="true">
                        <img src="{{asset('images/layout-icons/5.png')}}">
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('/HistoriaClinica')}}" class="nav-link" title="Historias Clinicas">
                      <span aria-hidden="true">
                        <img src="{{asset('images/layout-icons/6.png')}}">
                      </span>
                    </a>
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
          <div class="row align-items-center flex-row-reverse">
            <div class="col-auto ml-auto">
              <div class="row align-items-center">
                <div class="col-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">SmartDoc</li><a href="" target="_blank">- Politicas de Privacidad</a>
                  </ul>
                </div>

              </div>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2018 <a href="."></a>. Theme by <a href="" target="_blank">PocketCompany</a> All rights reserved.
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '222eac38faf35490a0ebfeddd86f5d0a5ab3dda2';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<style type="text/css">
  .nav-item > a img {
      width: 56px;
      height: 56px;
              display: block;
  }

  .nav-item > a.current {
    color: #2d0031; 
    border-bottom: solid #316cbe;
  }
</style>
  </body>
</html>
