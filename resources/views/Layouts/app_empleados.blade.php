<!doctype html>
<!--Realizado por Daniel Alejandro Rivera, ing-->
<html lang="en">
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
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assetsNew/images/icon(2).png')}}" />
    <!-- Generated: 2018-03-27 13:25:03 +0200 -->
    <title>SmartDoc</title>
    <link type="image/x-icon" rel="shortcut icon" href="{{asset('assetsNew/images/icon(2).png')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

    <!--Scripts-->
    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    {!!Html::style('assets\css\croppie.css')!!}
    {!!Html::script("assets\js\croppie.js")!!}
    
    {!!Html::style('stylesheets\datatables.css')!!}
    {!!Html::script("javascripts\datatable-editable.js")!!}
    {!!Html::script("javascripts\jquery.dataTables.js")!!}
    {!!Html::script("javascripts\jquery.dataTables.min.js")!!}
    {!!Html::script("javascripts\jquery.dataTables.min.js")!!}
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
  <body class="page-header-fixed bg-1" style="padding-top: 148px;">
    <div class="modal-shiftfix" >
      <div class="page-main">
        <div class="navbar navbar-fixed-top scroll-hide">
        <div class="header">
          <div class="container-fluid top-bar">
            <div class="d-flex">
              <a class="navbar-brand" href="{{url('/WelcomeAdmin')}}">
                <img src="{{asset('images/logo smartdoc 240x50.png')}}" class="navbar-brand-img" alt="logo" title="Inicio">
              </a>
              <div class="ml-auto d-flex order-lg-2">

                <div class="dropdown">
                  <a href="#"  class="espacio nav-link pr-0" data-toggle="dropdown" >
                    <span class="avatar" style="background-image: url({{asset('images/admin/'.$user->imagenPerfil)}}">
                    </span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{Auth::User()->nombreCompleto}}</span>
                      <small class="text-muted d-block mt-1">Trabajador</small>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <li class="dropdown-item"><a href="{{url('Perfil')}}">
                    <i class="fa fa-user-circle"></i>Mi Perfil</a>
                    </li>
                    <li class="dropdown-item"><a href="{{url('Configuracion')}}">
                    <i class="fa fa-gear"></i>Ajustes</a>
                    </li>
                    <li class="dropdown-item"><a href="{{url('Auth/logout')}}">
                    <i class="fa fa-sign-out"></i>Salir</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="container-fluid main-nav clearfix">
            <div class="nav-collapse" style="margin-bottom: -0.5%;">
              <div class="col">
                <ul class="nav layout-icons">
                  <li class="nav-item">
                    @if($flag == "agenda")
                    <a href="{{url('/WelcomeTrabajador')}}" class="nav-link current" title="Agenda">
                    @else
                    <a href="{{url('/WelcomeTrabajador')}}" class="nav-link" title="Agenda">
                    @endif
                      <span aria-hidden="true">
                        <img src="{{asset('images/layout-icons/1.png')}}">
                      </span>
                      <label>Agenda</label>
                    </a>
                  </li>
                  <li class="nav-item">
                    @if($flag == "historia")
                    <a href="{{url('/HistoriaClinica')}}" class="nav-link current" title="Historias Clinicas">
                    @else
                    <a href="{{url('/HistoriaClinica')}}" class="nav-link" title="Historias Clinicas">
                    @endif
                      <span aria-hidden="true">
                        <img src="{{asset('images/layout-icons/6.png')}}">
                      </span>
                      <label>Historias</label>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="page-content">
          <div class="container">
            <div class="page-content">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
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

<script type="text/javascript">
  $(document).ready(function() {
    $(".navbar.scroll-hide").mouseover(function() {
      $(".page-header-fixed .navbar.scroll-hide").removeClass("closed");
      return setTimeout((function() {
        return $(".page-header-fixed .navbar.scroll-hide").css({
          overflow: "visible"
        });
      }), 150);
    });
    $(function() {
      var delta, lastScrollTop;
      lastScrollTop = 0;
      delta = 50;
      return $(window).scroll(function(event) {
        var st;
        st = $(this).scrollTop();
        if (Math.abs(lastScrollTop - st) <= delta) {
          return;
        }
        if (st > lastScrollTop) {
          $('.page-header-fixed .navbar.scroll-hide').addClass("closed");
        } else {
          $('.page-header-fixed .navbar.scroll-hide').removeClass("closed");
        }
        return lastScrollTop = st;
      });
    });
  });
</script>
  </body>
</html>
