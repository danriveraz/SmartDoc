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
    
    <!-- Generated: 2018-03-27 13:25:03 +0200 -->
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <!-- Dashboard Core -->
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" />
    <!--<script src="{{asset('assets/js/dashboard.js')}}"></script>-->
    <!-- c3.js Charts Plugin -->
    <!--<link href="{{asset('assets/plugins/charts-c3/plugin.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/plugins/charts-c3/plugin.js')}}"></script>-->
    <!-- Google Maps Plugin -->
    <link href="{{asset('assets/plugins/maps-google/plugin.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/plugins/maps-google/plugin.js')}}"></script>
    <!-- Input Mask Plugin -->
    <!--<script src="{{asset('assets/plugins/input-mask/plugin.js')}}"></script>-->
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          @include('flash::message')
          <div class="row">
            <div class="col col-login mx-auto">
              <form id="formRegister" class="card" method="POST" enctype="multipart/form-data" action="{{ url('Auth/register') }}">
              	{{csrf_field()}}
                <div class="card-body p-6">
                  <!--<div class="card-title">Registro nuevo usuario</div>-->
                  <div class="form-group">
                    <!--<label class="form-label">Nombre completo</label>-->
                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre completo" required="true">
                  </div>
                  <div class="form-group">
                    <!--<label class="form-label">Nombre completo</label>-->
                    <input id="cedula" name="cedula" type="text" class="form-control" placeholder="Cedula">
                  </div>
                  <div class="form-group">
                    <!--<label class="form-label">Email address</label>-->
                    <input id="email" name="email" type="email" class="form-control" placeholder="Correo" required="true">
                  </div>
                  <div class="form-group">
                    <!--<label class="form-label">Password</label>-->
                    <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña" required="true" minlength="4" maxlength="20">
                  </div>
                  <div class="form-group">
                    <!--<label class="form-label">Password</label>-->
                    <input id="confirmpass" name="confirmpass" type="password" class="form-control" placeholder="Confirmar contraseña" required="true" minlength="4" maxlength="20">
                  </div>
                  <div class="form-group">
                    <!--<label class="form-label">Password</label>-->
                    <input id="clavePrimaria" name="clavePrimaria" type="password" class="form-control" placeholder="Clave de acceso PocektCompany" required="true">
                  </div>
                  <div class="form-group" hidden="true">
                    <input type="text" name="esPropietario" id="esPropietario" value="true">
                  </div>
                  <div class="form-footer">
                    <a href="#" id="btnConfirm" class="btn btn-primary btn-block" onclick="confirmPassword()">
                      Registrar
                    </a>
                    <!--<button class="btn btn-primary btn-block" onclick="confirmPassword()">Registrar</button>-->
                  </div>
                </div>
              </form>
              <script src="//code.jquery.com/jquery.js"></script>
              <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  <script type="text/javascript">
    function confirmPassword() {
      var password = document.getElementById("password").value;
      var password2confirm = document.getElementById("confirmpass").value;
      if(password.length >= 4){
        if(password == password2confirm){
        formRegister.submit();
        }else{
          alert("Las contraseñas no coinciden");
        }
      }else{
        alert("La contraseña debe tener minimo 4 caracters, no usar caracteres especiales.");
      }
    }
  </script>

</html>