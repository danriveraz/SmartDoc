<!DOCTYPE html>
    <html lang="zxx" class="no-js">
        <head>
            <!-- Etiquetas meta -->
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
            <meta property="og:image" content="assets/images/p"><!--poner link de la imagen--!>
            <!-- Datos Twitter Card -->	
            <meta name="twitter:card" content="summary" />
            <meta name="twitter:site" content="@pocketsmartdoc">
            <meta name="twitter:creator" content="@pocketsmartdoc" />
            <!-- Etiquetas meta -->
            <link rel="shortcut icon" type="image/x-icon" href="{{asset('assetsNew/images/icon(2).png')}}" />
            <title>SmartDoc - PocketClub</title>
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
                            <li><a href="#" class="genric-btn primary  radius small">Registrarme</a></li>                      
                        </ul>
				    </nav><!-- #nav-menu-container -->		    		
			    </div>
			</div>
		</header>		
		<section class="banner-area1 relative" id="home">	
			<div class="overlay overlay-bg"></div>
			<div class="container">				
				<div class="row d-flex align-items-center justify-content-center">
					<div class="about-content col-lg-12">
						<h1 class="text-white">
							PocketClub				
						</h1>	
						<p class="text-white link-nav">Pertenecer a PocketClub, te da descuentos, ayuda de especialistas para mejorar tu negocio, descuentos en nuestra SmartShop, el uso de todo el aplicativo, poder guardar tu información en la nube y lo mejor, actualizaciones permanentes, haciendo cada día mejor tu Doctor Inteliegente Smartdoc.</p>
					</div>	
				</div>
			</div>
		</section>
		<!-- End banner Area -->
		<!-- PREGUNTAS FRECUENTES -->
		<!-- section Area planes-->
        <section id="bs-pricing" class="bs-pricing roomy-50 p-top-100 bg-white fix">
            <div class="container">                        
                 <div class="col-md-12">
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
                        </p>
                    </h4>
                    <hr>
                </div>
            </div>
        </section>      
        <!-- section Area planes-->             	
        <!-- PREGUNTAS FRECUENTES -->
        <section class="block" data-name="Faqs">
            <div class="block-content" style="padding-top: 0px;">
                <h2 class="text-center ac">Lo que debes saber de nuestras membresias</h2>
                <div class="row cards-basic bg-white">
                    <div class="col bg-gray-white">
                        <div class="pocketClub">
                            <h3 class="text-green margin-tiny">¿Cómo funciona el Demo de 7 días?</h3>
                            <p class="margin-tiny">Durante 7 días podrás utilizar SmartDoc con todas sus funciones, crear una cuenta solo toma minutos y transcurridos los 7 días debes seleccionar el plan que utilizarás, para conservar tu información y la ayuda de tu doctor inteligente</p>
                            <hr>
                        </div>
                        <div class="pocketClub">
                            <h3 class="text-green margin-tiny">¿Cuándo puedo cancelar mi plan?</h3>
                            <p class="margin-tiny">El plan que hayas seleccionado se puede cancelar en cualquier momento, no hay cláusulas de permanencia o contratos a largo plazo. Para cancelar tu plan simplemente escríbenos en smartdoc@gmail.com</p>
                            <hr>
                        </div>
                    </div>
                    <div class="col bg-gray-white">
                        <div class="pocketClub">
                            <h3 class="text-green margin-tiny">¿Puedo cambiar de plan en cualquier momento?</h3>
                            <p>Puedes cambiar de plan cada mes si así lo requieres, simplemente únete al club con una nueva membresia y listo! </p>
                            <hr>
                        </div>
                        <div class="pocketClub">
                            <h3 class="text-green margin-tiny">Aún tengo preguntas</h3>
                            <p>Consulta nuestra sección de Preguntas Frecuentes o la Ayuda de la aplicación. Si quieres hablar con el equipo SmartDoc, chatea con nosotros en nuestro chat online o en nuestro home, agenda la visita de un asesor experto.</p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--INICIO DE FOTTER-->				
		<!-- start footer Area -->       
        <footer class="footer-area">
            <div class="container">
                <div class="row d-flex justify-content-between align-items-center">
                    <p class="col-lg-12 col-sm-12 footer-text m-0">Copyright &copy;        
                        <script>document.write(new Date().getFullYear());</script> Todos los derechos reservados|    <a href="" target="_blank">PocketSmartDoc</a> de 
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