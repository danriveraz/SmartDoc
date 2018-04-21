<!DOCTYPE html>
<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- Generated: 2018-03-27 13:25:03 +0200 -->
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="{{asset('assets/js/require.min.js')}}"></script>
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


  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          @include('flash::message')
          <div class="row">
            <div class="col col-login mx-auto">
              <form id="formRegister" class="card" method="POST" enctype="multipart/form-data" action="{{url('Auth/register')}}">
              	{{csrf_field()}}
                <div class="card-body p-6">
                  <!--<div class="card-title">Registro nuevo usuario</div>-->
                  <div class="form-group">
                    <!--<label class="form-label">Nombre completo</label>-->
                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre establecimiento">
                  </div>
                  <div class="form-group">
                    <!--<label class="form-label">Email address</label>-->
                    <input id="email" name="email" type="email" class="form-control" placeholder="Correo">
                  </div>
                  <div class="form-group">
                    <!--<label class="form-label">Password</label>-->
                    <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña">
                  </div>
                  <div class="form-group">
                    <!--<label class="form-label">Password</label>-->
                    <input id="confirmpass" name="confirmpass" type="password" class="form-control" placeholder="Confirmar contraseña">
                  </div>
                  <div class="form-group">
                    <!--<label class="form-label">Password</label>-->
                    <input id="nit" name="nit" type="text" class="form-control" placeholder="Nit">
                  </div>
                  <div class="form-group">
                    <!--<label class="form-label">Password</label>-->
                    <input type="text" id="celular" name="celular" class="form-control" placeholder="(+57) 000 - 0000 - 000">
                  </div>
                  <div class="form-group">
                    <!--<label class="form-label">Password</label>-->
                    <input type="text" id="telefono" name="telefono" class="form-control" placeholder="(032) 000 - 00 - 00">
                  </div>
                  <div class="form-group">
                    <!--<label class="form-label">Password</label>-->
                    <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección de establecimiento">
                  </div>
                  <div class="form-footer">
                    <a href="#" id="btnConfirm" class="btn btn-primary btn-block" onclick="confirmPassword()">
                      Registrar
                    </a>
                  </div>
                </div>
              </form>
              <div class="text-center text-muted">
                <a href="{{url('Auth/logout')}}">Salir</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">
    function confirmPassword() {
      var nombre = document.getElementById("nombre").value;
      var correo = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var password2confirm = document.getElementById("confirmpass").value;
      var nit = document.getElementById("nit").value;
      var celular = document.getElementById("celular").value;
      var telefono = document.getElementById("telefono").value;
      var direccion =document.getElementById("direccion").value;

      if(nombre != "" && correo != nit != "" && telefono != "" && celular != "" && direccion != ""){
        if(password.length >= 4){
          if(password == password2confirm){
          formRegister.submit();
          }else{
            alert("Las contraseñas no coinciden");
          }
        }else{
          alert("La contraseña debe tener minimo 4 caracters, no usar caracteres especiales.");
        }
      }else{
        alert("Por favor diligenciar todos los campos");
      }
    }
  </script>
</html>