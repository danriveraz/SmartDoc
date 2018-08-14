<!doctype html>
<html lang="en">
<!--Realizado por Daniel Alejandro Rivera, ing-->
  <head>
    {!!Html::style('assets/css/font-awesome.min.css')!!}
    {!!Html::style('stylesheets/style.css')!!} 
  	{!!Html::style('assets\css\cajero.css')!!}	
  	{!!Html::style('assets\css/bootstrap.css')!!}
    {!!Html::style('assets/css/dashboard.css')!!}
  </head>
  <body class="page-header-fixed bg-1" style="background-color: white;">
		<div class="card" style="width: 100%; height: 100%;"	>
			<!-- inicio del contenedor del campo texto-->
			<div class="card-body">   
				<div class="row row-cards" style="margin: 0; padding: 0; height: 20%">
					<div class="col-md-4">
		              <div class="cover-inside ">
		                 <img class="cover-avatar img-round" src="{{asset('images/admin/'.$empresa->imagen)}}" alt="profile" style="width: 140px; height: 140px;">
		              </div>
		        	</div>
			   		<div class="col-md-3">
						<div class="factspace text-center">
							<br>
			                <strong class=" text1">
			                  {{$empresa->nombreEstablecimiento}}<br>
			                </strong>
	                		<span class="spanR">Nit: {{$empresa->nit}} </span>
	                		<p>
			                  {{$empresa->direccion}} - {{$empresa->telefono}}
			                </p>
	              		</div>
	          		</div>

	          		<div class="col-md-4">
	              		<div class="factspace text-right" >
	              			<br>
		                	<strong class=" text1" style="color: rgb(49, 108, 190);" id="mesaActual">      
			                  	@if($empresa->tipoRegimen == "comun")
				                	Factura No. {{$empresa->prefijo}}{{$servicio->nFactura}}
				                @else
		                   			Documento equivalente a la factura No. {{$servicio->nFactura}}          
			                  	@endif
			                 </span>
		                	</strong>
		                	<p>
			                    <span class="spanR" id="fecha" style="color: #111">		  
			                    	<?php 
		                  				$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
										$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	 									$date = new DateTime($servicio->fecha);
											echo ($dias[date_format($date, 'w')]." ".date_format($date, 'd')." de ".$meses[date_format($date, 'n')-1]. " del ".date_format($date, 'Y'));  
									?>
									<br>{{$empresa->ciudad}} {{$empresa->departamento}}
			                    </span>

		                	</p>
	              		</div>
	          		</div>
	          		
					</div>
	  <!----------------------------------------------------------------------------------->	
	          		<div class="infoCliente" style="margin: 0; padding: 0;">
						<div class="row" id="toggle">
							<div class="col-md-12 text-center">
							  <a class="invoice-client mrg10T pocketMorado" >Información deL Cliente:</a><br>
							</div>
						</div>
						<div class="row row-cards" style="height: 20%; width: 100%;">
					        <div class="col-md-4">
						          <div class="input-group">
						            <span class="input-group-addon" style="width: 40px;"><i class="fa fa-address-book-o"></i></span>
						            <input id="nombre" class="form-control" placeholder="Nombre" type="text" name="nombre" value="{{$historiaClinica->nombreCompleto}}" disabled="" style="width: 400px;">
						          </div>
					        </div>
						</div>        
					</div>   
				<!----------------------------------------------------------------------------------->
		
				</div>
	  </div>
  </body>
</html>