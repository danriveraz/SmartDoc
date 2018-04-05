<!DOCTYPE html>
<html>
    <head>    
        <meta http-equiv="X-UA-Compatible" content="chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login</title>        
        
        <!-- Estilos y Fuentes -->
        
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

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
                <a href="{{url('/home')}}" class="logo"><img src="images/logoEmail.png"></a>
                <p class="intro-title colorMorado">Bienvenido</p>
                <p class="intro-summary">controla tu negocio con solo unos clicks</p>
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
                    <input type="submit" name="submit" id="submit" value="INGRESAR" class="enviar">
                </form>
            </div> 
            <div class="colorGris user-access-footer">
                <p><a href="{{url('')}}">¿Olvidaste tu contraseña?</a></p>
                <hr />
                <a class="btn btn-social-icon btn-facebook" onclick="_gaq.push(['_trackEvent', 'btn-social-icon', 'click', 'btn-facebook']);"><span class="fa fa-facebook"></span></a>
            </div>
    </div>
    </aside>
    <!-- Content Slideshow  -->
    <section class="content">
        <div class="hero-login bg-cover" style="background-image: url('images/welcome.jpg');">
        </div>
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </section>
</div>    </body>
</html>
