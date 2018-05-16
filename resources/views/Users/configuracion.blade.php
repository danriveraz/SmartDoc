@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<div class="page">
  <div class="page-single">
    <div class="container">
      <div class="row">
        <div class="col col-login mx-auto">
          <form id="formRegister" class="card" enctype="multipart/form-data" method="POST" 
          route="Auth.usuario.editConfiguracion">
            {{ csrf_field() }}
            <div class="card-body p-6">
              <div class="card-title">Seguridad e inicio de sesión</div>
              <p class="text-muted">Cambia tu correo o contraseña</p>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Correo" value="{{$user->email}}">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Contraseña">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="confirmPassword" aria-describedby="emailHelp" placeholder="Confirmar contraseña">
              </div>
              <div class="form-footer">
                <a href="#" id="btnConfirm" class="btn btn-primary btn-block" onclick="confirmPassword()">
                  Guardar
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function confirmPassword() {
      var correo = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var password2confirm = document.getElementById("confirmPassword").value;

      if(correo != "" && password == ""){
        formRegister.submit();
      }else{
        if(correo != "" || password != ""){
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
          alert("Por favor diligenciar correo o contraseña");
        }
      }
    }
  </script>
@endsection