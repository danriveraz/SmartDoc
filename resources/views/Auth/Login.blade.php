<!DOCTYPE html>
<html>
    <head>    
        <meta http-equiv="X-UA-Compatible" content="chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login</title>        
        
        <!-- Estilos y Fuentes -->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Roboto:300,400" rel="stylesheet">
        <link rel="stylesheet" href="assetsNew/styles/normalize.css" type="text/css" />
        <link rel="stylesheet" href="assetsNew/styles/styles-login-min.css" type="text/css" />
        <link type="image/x-icon" rel="shortcut icon" href="../assetsNew/images/icon.png"/>
    </head>
    <body id="">
    </head>
<div class="main-container">
    <!-- Sidebar Access -->
    <aside class="sidebar-large1">
        <div class="user-access">
            <div class="user-access-header">
                <a href="{{url('')}}" class="logo"><img src="images/logo smartdoc 290x72.png"></a>
                <p class="intro-title" style="color: #210B61">Bienvenido</p>
                <p class="intro-summary" style="color: #210B61">controla tu negocio con solo unos clicks</p>
            </div>
            <div class="user-access-form">   
                @if (Session::has('message'))
                    {{Session::get('message')}}
                @endif
                <form  autocomplete="on" method="post" action="{{url('Auth/login')}}">
                    {{ csrf_field() }}
                    <div class="input-wrapper">
                        <input type="text" name="email" id="email" value="" class="email" placeholder="E-mail" required>
                    </div>
                    <div class="input-wrapper">
                        <input type="password" name="password" id="password" value="" class="clave" placeholder="Contraseña" required>
                    </div>
                    <input type="submit" name="submit" id="submit" value="INGRESAR" style="background-color: #467fcf">
                </form>
            </div> 
            <div class="colorGris user-access-footer">
                <p><a href="{{url('ResetPassword')}}" style="color: #210B61">¿Olvidaste tu contraseña?</a></p>
                <hr />
            </div>
    </div>
    </aside>
    <!-- Content Slideshow  -->
    <section class="content">
        <div class="hero-login bg-cover" style="background-image: url('images/welcome.jpg');">
        </div>
    </section>
</div>    </body>
</html>
