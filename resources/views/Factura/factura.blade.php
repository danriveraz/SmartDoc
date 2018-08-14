@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Luis Felipe Castaño, ing-->


{!!Html::style('assets\css\cajero.css')!!}	
<link href="stylesheets/bootstrap.css" rel="stylesheet" id="bootstrap">


<div class="page-content" style="margin-top: 25px; background-color: transparent; font-family: Lato, sans-serif !important;>
	<div class="container" style="width: 900px;">
		<div class="card">
			<!-- inicio del contenedor del campo texto-->
			<div class="card-body" style="padding-bottom: 50px; border-bottom: 1px solid rgb(177, 192, 224);">   
			<form method="POST" action="{{url('Abonos/abonar')}}">
              {{csrf_field()}}
              <input type="tex" name="id" value="{{$servicio->id}}" hidden="">
				<div class="row row-cards">
					<div class="col-md-4">
		              <div class="cover-inside ">
		                 <img class="cover-avatar size-md img-round" src="{{asset('images/admin/'.$empresa->imagen)}}" alt="profile">
		              </div>
		        	</div>
			   		<div class="col-md-4">
						<div class="factspace text-center">
			                <strong class=" text1">
			                  {{$empresa->nombreEstablecimiento}}
			                </strong>
	                		<span class="spanR">Nit: {{$empresa->nit}} </span>
	                		<p>
			                  {{$empresa->direccion}} - {{$empresa->telefono}}  <br>{{$empresa->ciudad}} {{$empresa->departamento}}
			                </p>
	              		</div>
	          		</div>

	          		<div class="col-md-4">
	              		<div class="factspace text-right" >
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
			                    </span>
		                	</p>
	              		</div>
	          		</div>
				</div>
				<div class="info-cliente" style="margin-top: 20px;">
				<div class="row" id="toggle">
					<div class="col-md-12 text-center">
					  <a class="invoice-client mrg10T pocketMorado" >Información deL Cliente:</a>
					</div>
				</div>
				<div class="row row-cards">
			        <div class="col-md-4">
				        <div class="invoice-address col-md-12">
				          <div class="input-group">
				            <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
				            <input id="nombre" class="form-control" placeholder="Nombre" type="text" name="nombre" value="{{$historiaClinica->nombreCompleto}}" disabled="">
				          </div>
				        </div> 
				        <div class="invoice-address col-md-12">
				          <div class="input-group">
				            <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
				            <input id="nit" class="form-control" placeholder="Nit o Identificacion" type="text" name="nit" value="{{$historiaClinica->documento}}" disabled="">
				          </div>
				        </div> 
			        </div>
			        <div class="col-md-4">
				        <div class="invoice-address col-md-12">
				          <div class="input-group">
				            <span class="input-group-addon"><i class="fa fa-volume-control-phone"></i></span>
				            <input id="telefono" class="form-control" placeholder="Telefono" type="text" name="telefono" value="{{$historiaClinica->telefono}}" disabled="">
				          </div>
				        </div> 
				        <div class="invoice-address col-md-12">
				          <div class="input-group">
				            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
				            <input id="direccion" class="form-control" placeholder="Direccion" type="text" name="direccion" value="{{$historiaClinica->direccion}}" disabled="">
				          </div>
				        </div>     
			        </div>
			        <div class="col-md-4">
				        <div class="invoice-address col-md-12">
				          <div class="input-group">
				            <span class="input-group-addon"><i class="fa fa-envelope-open-o"></i></span>
				            <input id="mail" class="form-control" placeholder="Email" type="text" name="mail" value="{{$historiaClinica->email}}" disabled="">
				          </div>
				        </div>      
				    </div>
				</div>        
			</div>   
		    <div class="row row-cards"  style=" margin-top: 80px;">
			    <div class="col-lg-12">
		            <div class="headers clearfix" style="margin-bottom: 10px;">
		            	<div class="row" style="align-items: center; border-bottom: 1px solid #EBECEE; color: #A2A6AC;">
			              	<div class="col-sm-1 text-center" style="padding-right: 5px; padding-left: 5px;">No</div>
			                <div class="col-sm-6">Servicio</div>
			                <div class="FactPocket col-sm-3 text-center">Estado</div>
			                <div class="FactPocket col-sm-2 text-right">Valor</div>
		            	</div>
		            </div>
		            <div class="items" id="tabla" style="margin-bottom: 20px;">
		                <div class="row item" style="align-items: center; padding-bottom: 8px; border-bottom: 1px solid #EBECEE">
		                	<div class="col-sm-1 desc text-center" >1</div>
		                  	<div class="FactPocket col-sm-6 amount text-left">{{$servicio->procedimiento->nombre}} </div>
		                  	<div class="FactPocket col-sm-3 amount text-center">
		                  		{{$servicio->estado}}
		                 	</div>
		                  	<div class="FactPocket col-sm-2 amount text-right"> $<?php echo number_format($saldo,0,",","."); ?></div>        
		                </div>
		            </div>
          		</div>
			</div>




		<div class="row">
          <div class="col-lg-12"> 
              @if($empresa->tipoRegimen == "comun")
                <br>
                <div class="text-center">
                <strong  style="text-align: center;">Resolución DIAN: {{$empresa->nResolucionFacturacion}} de {{$empresa->fechaResolucion}} del No. {{$empresa->nInicioFactura}} hasta {{$empresa->nFinFactura}}
                </strong>
              </div>
                @endif
            </div>
        	<div class="col-lg-12" style="margin-top: 40px;">              
              <button class="factBot btn btn-bitbucket pull-right" onclick="nada();" style="background-color: rgb(49, 108, 190);"><i class="fa fa-print"></i>Imprimir</button>              
        	</div>
          </div>  
      </form>
			</div>
    	</div>
	</div>
</div>
@endsection