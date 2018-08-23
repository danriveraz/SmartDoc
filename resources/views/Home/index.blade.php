<!DOCTYPE html>
	<html lang="zxx" class="no-js">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="generator" content="HTML5">	
			<meta name="application-name" content="PocketSmartDoc"/>
			<meta name="author" content="Pocket Company S.A.S"/>
			<meta name="description" content="Aplicativo inteligente online, escencial en consultorios odontologicos, que facilita enormemente el trabajo  de administradores, empleados, proveedores y clientes de estos." />
			<meta name="generator" content="Html5 Css Javascrip" />
			<meta name="keywords" content="Compañero inseparable, sistema inteligente de manejo de negocios, consultorio odontologicos, odontograma, dientes, limpieza oral, cordales, sistema para odontologia, sistema pos, software para consultorio, software POS para odontologia, sistema de punto de venta, sistema de facturación, software de inventario, software para punto de ventas, software POS, sistema POS, Colombia, POS online" />
			<meta name="encoding" charset="utf-8" />		
			<!-- Datos Open Graph -->
			<meta property="og:title" content="PocketSmartDoc" />
			<meta property="og:type" content="WebSite" />
			<meta property="og:url" content="http://www.pocketsmartdoc.com" />
			<meta property="og:description" content="Aplicativo inteligente online, escencial clinicas odontologicas o consultorios, que facilita enormemente el trabajo  de administradores, empleados, proveedores y clientes de estos.">
			<meta property="og:site_name" content="PocketSmartDoc">
			<meta property="og:image" content="{{asset('images/logo smartdoc 290x72.png')}}"><!--poner link de la imagen--!>
			<!-- Datos Twitter Card -->	
			<meta name="twitter:card" content="summary" />
			<meta name="twitter:site" content="@pocketsmartdoc">
			<meta name="twitter:creator" content="@pocketsmartdoc" />
			<link rel="shortcut icon" type="image/x-icon" href="{{asset('assetsNew/images/icon(2).png')}}" />
			<title>SmartDoc</title>
			<link type="image/x-icon" rel="shortcut icon" src="{{asset('assetsNew/images/icon(2).png')}}">
			<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        	{!!Html::style('assetsHome\css\linearicons.css')!!}
        	{!!Html::style('assetsHome\css\font-awesome.min.css')!!}
        	{!!Html::style('assetsHome\css\bootstrap.css')!!}
        	{!!Html::style('assetsHome\css\main.css')!!}
        	{!!Html::style('assetsHome\css\rainbow-pricing-table.css')!!}
		</head>
		<body>	
			<header id="header" id="home">
		  		<div class="header-top">
		  			<div class="container">
				  		<div class="row">
				  			<div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
				  				<ul>
									<li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" title="Instagram"><i class="fa fa-instagram"></i></a></li>
				  				</ul>
				  			</div>
				  			<div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding llamar">
				  				<span style="color: white;"> ASESORIA +57 318 281 1441 &nbsp;&nbsp; <a class="llamar" data-toggle="modal" href="#ignismyModal">¿Te Llamamos GRATIS?</a>	</span>			
				  			</div>
				  		</div>			  					
		  			</div>
				</div>
			    <div class="container main-menu">
			    	<div class="row align-items-center justify-content-between d-flex">
				      	<div id="logo">
				        	<a href="{{url('/')}}"><img src="{{asset('assetsHome/img/logo smartdoc 240x50.png')}}" alt="" title="" /></a>
				      	</div>
				      	<nav id="nav-menu-container">
					        <ul class="nav-menu">
					        	<li class="menu-active">
					        	<li><a href="{{url('/Preguntas')}}">Preguntas</a></li>
					        	<li><a href="{{url('/PocketClub')}}">Pocket Club</a></li>
				            	<li><a href="{{url('/login')}}" class="genric-btn success radius small">Iniciar Sesión</a></li>				          
					        	<li><a href="{{url('/register')}}" class="genric-btn primary  radius small">Registrarme</a></li>					  
					        </ul>
				    	</nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			</header>		
			<!-- #header -->
			<!-- start banner publicitario Area -->
			<section class="banner-area" id="home">
				<div class="container">
					<div class="row fullscreen d-flex align-items-center">
						<div class="banner-content col-lg-7 col-md-6 justify-content-center ">
							<h5 class="text-uppercase mt-100">SMARTDOC. Lo hace fácil!</h5>
							<h1>
								<p class="text-black" style="max-width: inherit; color: #070632;">
								Última Tecnología!	</p>	
							</h1>
							<h5>
								<p class="text-black" style="max-width: inherit;">
									Podrás agendar citas, crear historias clínicas, llevar el control de tus utilidades y empleados, crear, editar e imprimir odontogramas profesionales, mientras tus facturas y abonos se crean de forma automática.
								</p>
							</h5>
							<a type="button" class="btn btn-primary btn-lg" href="{{url('/register')}}" style="color: #FFFFFF;" >7 Días Gratis
							</a>
						</div>	
						<div class="banner-content banner-img col-lg-5 col-md-6 align-self-end">
							<img class="img-fluid" src="{{asset('assetsHome/img/banner-img.png')}}" alt="">
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner publicitario Area -->
				<!-- Start work-process Area -->
			<section class="work-process-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-7">
							<div class="title text-center">
								<h1 class="mb-10">Configura tu SmartDoc</h1>
								<h4>Con 4 simples pasos, SmartDoc se encargará del manejo de:</h4>
							</div>
						</div>
					</div>	
					<div class="total-work-process d-flex flex-wrap justify-content-around align-items-center">
						<div class="single-work-process">
							<div class="work-icon-box">
								<img src="{{asset('assetsHome/img/layout-icons/2.png')}}"" alt="">
							</div>
							<h4 class="caption">Empleados</h4>
							<p>Crea tus expecialistas y <br> otro personal, ten el <br> control de todas sus citas</p>
						</div>
					<div class="work-arrow">
						<img src="{{asset('assetsHome/img/arrow.png')}}" alt="">
					</div>
					<div class="single-work-process">
						<div class="work-icon-box">
							<img src="{{asset('assetsHome/img/layout-icons/4.png')}}" alt="">
						</div>
						<h4 class="caption">Servicios</h4>
						<p>Conociendo, precios y <br> costos de tus servicios<br>
							SmartDoc hará todo por ti.</p>
					</div>
					<div class="work-arrow">
						<img src="{{asset('assetsHome/img/arrow.png')}}" alt="">
					</div>
					<div class="single-work-process">
						<div class="work-icon-box">
							<img src="{{asset('assetsHome/img/layout-icons/7.png')}}" alt="">
						</div>
						<h4 class="caption">Facturación</h4>
						<p>Conociendo, tu regimén <br> y otros datos, SmartDoc<br>
							hará facturas automaticas.</p>
					</div>
					<div class="work-arrow">
						<img src="{{asset('assetsHome/img/arrow.png')}}" alt="">
					</div>
					<div class="single-work-process">
						<div class="work-icon-box">
							<img src="{{asset('assetsHome/img/layout-icons/6.png')}}" alt="">
						</div>
						<h4 class="caption">Manejo General</h4>
						<p>Carga tu logo e información<br>  básica.
							SmartDoc, <br> hará lo demás por ti.</p>
					</div>											
				<div class="row">
					<div class="col"></div>
				</div>
			</div>	
		</section>
		<!-- End work-process Area -->	
		<!-- start banner Area -->
		<section class="design-smartshop relative" id="home">	
			<div class="overlay overlay-bg"></div>
			<div class="container">				
				<div class="row d-flex align-items-center justify-content-center">
					<div class="about-content col-lg-12" style="margin-top: 0px !important;">
						<div class="avatar">
							<h2 style="color: yellow;">Ingresa a nuestra SmartShop</h2>
							<h3 style="line-height: 1; color: white;">Encontrarás productos exclusivos para ti.</h3>
						</div>
					  	<br>
						<!--a href="#" class="genric-btn success radius">Ingresa ya</a-->
						<button type="button" class="btn btn-light btn-lg">Ingresar Ya</button>
					</div>	
				</div>
			</div>
		</section>
		<!-- End banner Area -->						
		<!-- section Area planes-->
		<section id="bs-pricing" class="bs-pricing roomy-50 p-top-100 bg-white fix">
            <div class="container">
                <div class="col-md-12">
				 	<div class="col-md-12 pt-20 pb-20 header-text text-center">
						<h1 class="mb-10">Adquiere tu PocketClub</h1>
						<p>
							Estas a un paso de tu membresia
						</p>
					</div>
                    <div class="row" style="display: flow-root !important;">
                        <div class="bs-pricing-table-three">
                            <div class="col-sm-4">
                                <div class="bs-pricing-item free">
									<div class="imgPlanes unica">
										<div class="bs-btns membresia">	
											<a href="#" class="genric-btn bt-Unica medium">Lo quiero!</a>
                                    	</div>										
									</div>	
                                </div>
                            </div><!-- End col-md-4 -->
                            <div class="col-sm-4">
                                <div class="head">
									<div class="imgPlanes elite">
										<div class="bs-btns membresia">	
											<a href="#" class="genric-btn bt-Elite medium">Lo quiero!</a>
										</div>										
									</div>	
								</div>
                            </div><!-- End col-md-4 -->
                            <div class="col-sm-4">
								<div class="head">
									<div class="imgPlanes standar">
										<div class="bs-btns membresia">	
											<a href="#" class="genric-btn bt-Standar medium">Lo quiero!</a>
										</div>										
									</div>		
								</div>			
                            </div><!-- End col-md-4 -->
                        </div>
                    </div>
                </div>
                <br>
    			<p class="text-center">
    				<img class="plan-payment" src="{{asset('assetsHome/img/logos-payment-col-pocket.png')}}" alt="Métodos de pago"/>
    			</p>
    			<hr>
    			<div class="pocket">
    				<h4 style="font-weight: 500;"> 
    					<p class="text-center">Al ser miembro PocketClub, obtienes descuentos, obsequios y promociones especiales. 
    						<a href="" target="_blank" rel="alternate">¿Qué es PocketClub?</a>
    					</p>
    				</h4>
    			</div>
    			<hr>
            	</div>
        	</section>      
			<section class="discount-section-area relative section-gap">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row align-items-center justify-content-between no-gutters">
						<div class="col-lg-6 discount-left">
							<h1 class="text-white">¿Deseas que te visite un asesor experto?</h1>
							<p class="text-white">
								Completa esta información básica y recibirás un correo, con el nombre, fotografía y hora en la que uno de nuestros expertos, te visitará.
							</p>
						</div>
					<div class="col-lg-5 discount-right">
						<form class="booking-form" id="myForm" action="#">
		                    <div class="row">
	                            <div class="col-lg-12 d-flex flex-column">
	                                <input name="name" placeholder="Nombre Completo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" class="form-control mt-20" required="" type="text">
	                            </div>
	                            <div class="col-lg-6 d-flex flex-column">
	                                <input name="phone" placeholder="No. Celular" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" class="form-control mt-20" required="" type="text">
	                            </div>
	                            <div class="col-lg-6 d-flex flex-column">
	                                <input name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="form-control mt-20" required="" type="email">
	                            </div>
	                            <div class="col-lg-12 flex-column">
	                                <textarea rows="5" class="form-control mt-20" name="message" placeholder="Mensaje para nuestro asesor experto" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
	                            </div>
	                            <div class="col-lg-12 d-flex justify-content-end send-btn">
	                                <button class="genric-btn primary mt-20 text-uppercase ">
	                                	<i class="fa fa-send"></i> Agendar 
	                                </button>
		                        </div>								
		                	</div>
		                </form>
					</div>
				</div>
			</div>	
		</section>
		<footer class="footer-area">
			<div class="container">
				<div class="row d-flex justify-content-between align-items-center">
					<p class="col-lg-12 col-sm-12 footer-text m-0">Copyright &copy;		
						<script>document.write(new Date().getFullYear());
						</script> Todos los derechos reservados| 
						<a href="" target="_blank">PocketSmartDoc</a> de 
						<a href="" target="_blank">PocketCompany</a> Patrocinio
						<a href="" target="_blank">Fundación Tuluá Para Todos</a>
					</p>
				</div>
			</div>
		</footer>
		<!-- End footer Area -->		
		<!--- contenido del Modal-->			
        <div class="modal fade" id="ignismyModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                     </div>
                    <div class="modal-body">
						<div class="thank-you-pop">
							<img src="{{asset('assetsHome/img/Green-Round-Tick.png')}}" alt="">
							<h1>Te llamamos gratis</h1>
							<form class="booking-form" action="#">
								<div class="cupon-pop" style="margin: 30px">
									<input name="phone" placeholder="No. Celular" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" class="form-control mt-20" required="" type="text">
								</div>
								<div class="form-group-checkbox">
                                    <input type="checkbox" id="datosPersonales" name="checkTerminos" class="form-control form-control-center">
                                    <label class="form-control-label">Autorizo la política de datos SmartDoc</label>
                                </div>
								<button type="button" class="btn btn-primary">Aceptar</button>
							</form>	
							<div class="mb-25"></div>
 						</div>
                    </div>			
                </div>
            </div>
        </div>				
		<!--- contenido Fin del Modal-->
		{!!Html::script("assetsHome\js/jquery-2.2.4.min.js")!!}
		{!!Html::script("assetsHome\js/bootstrap.min.js")!!}
		{!!Html::script("assetsHome\js/superfish.min.js")!!}
		{!!Html::script("assetsHome\js/jquery.magnific-popup.min.js")!!}
		{!!Html::script("assetsHome\js/main.js")!!}		
	</body>
</html>