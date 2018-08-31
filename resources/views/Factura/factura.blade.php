@extends(Auth::User()->esAdmin ? 'Layouts.app_administradores' : 'Layouts.app_recepcionista')
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
		                  	<div class="FactPocket col-sm-2 amount text-right"> $<?php echo number_format($servicio->procedimiento->venta,0,",","."); ?></div>        
		                </div>
		            </div>
		            <div class="total">
		            	<div class="row info">
		            		<div class="col-sm-12">
		            			<div class="field col-sm-2 pull-right  text-right">
									<span id="subtotal">$<?php echo number_format($servicio->procedimiento->venta,0,",","."); ?></span>
								</div>
		            			<div class="field col-sm-2 pull-right  text-right">
									Subtotal
								</div>
							</div>
		            	</div>
		            	@if($empresa->tipoRegimen == 'comun')
		            	<div class="row info" style="margin-top: 0;">
		            		<div class="col-sm-12">
		            			<div class="field col-sm-2 pull-right  text-right">
									<span id="iva" data-regimen="comun">$<?php echo number_format($servicio->procedimiento->venta*($empresa->iva/100),0,",","."); ?></span>
								</div>
		            			<div class="field col-sm-2 pull-right  text-right">
									<label>Iva {{$empresa->iva}}%</label>
								</div>
							</div>
		            	</div>
		            	@if($empresa->impuesto1 != "")
		            	<div class="row info"  style="margin-top: 0;">
		            		<div class="col-sm-12">
		            			<div class="field col-sm-2 pull-right  text-right">
									<span id="valorImpuesto1" data-regimen="comun">$<?php echo number_format($servicio->procedimiento->venta*($empresa->valorImpuesto1/100),0,",","."); ?></span>
								</div>
		            			<div class="field col-sm-2 pull-right  text-right">
									<label>{{$empresa->impuesto1}} {{$empresa->valorImpuesto1}}% </label>
								</div>
							</div>
		            	</div>
		            	@endif
		            	@if($empresa->impuesto2 != "")
		            	<div class="row info" style="margin-top: 0;">
		            		<div class="col-sm-12">
		            			<div class="field col-sm-2 pull-right  text-right">
									<span id="valorImpuesto2" data-regimen="comun">$<?php echo number_format($servicio->procedimiento->venta*($empresa->valorImpuesto2/100),0,",","."); ?></span>
								</div>
		            			<div class="field col-sm-2 pull-right  text-right">
									<label>{{$empresa->impuesto2}} {{$empresa->valorImpuesto2}}%</label>
								</div>
							</div>
		            	</div>
		            	@endif
             			@endif
		            	<div class="row info" style="margin-top: 0px;">
		            		<div class="col-sm-12">
		            			<div class="field col-sm-2 pull-right  text-right">
									<span id="subtotal">$<?php echo number_format($saldo,0,",","."); ?></span>
								</div>
		            			<div class="field col-sm-2 pull-right  text-right">
									Total
								</div>
							</div>
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
              <a class="factBot btn btn-bitbucket pull-right" id="imprimir" style="background-color: rgb(49, 108, 190);" onclick="imprimr();"><i class="fa fa-print"></i>Imprimir</a>               
        	</div>
          </div>  
      </form>
			</div>
    	</div>
	</div>
</div>
<script type="text/javascript">
	function imprimr() {
		document.title = "Pocket Company S.A.S - Regimen común - Nit: 901158690-1 Cel: 3182811441";
		document.getElementsByClassName('page-header-fixed')[0].style.paddingTop = '20px';
		document.getElementsByClassName('card-body')[0].style.borderBottom = 0;
		document.getElementsByClassName('card-body')[0].style.paddingBottom = 0;
		document.getElementById('imprimir').style.display = 'None';


		document.getElementsByClassName('row row-cards')[0].style.paddingBottom = '50px';
		document.getElementsByClassName('info-cliente')[0].style.paddingBottom = '50px';
		document.getElementsByClassName('items')[0].style.paddingBottom = '50px';//-20
		document.getElementsByClassName('total')[0].style.paddingBottom = '480px';//-20
		var objs = document.getElementsByClassName('row info');
		arr = [].slice.call(objs); //I have converted the HTML Collection an array
	    arr.forEach(function(v,i,a) {
	        v.style.paddingBottom = '10px';
	    });
		

		print();
		document.getElementsByClassName('page-header-fixed')[0].style.paddingTop = '148px';
		document.getElementsByClassName('card-body')[0].style.borderBottom = '1px solid rgb(177, 192, 224)';
		document.getElementsByClassName('card-body')[0].style.paddingBottom = '50px';
		document.getElementById('imprimir').style.display = 'Block';



		document.title = "SmartDoc";
		document.getElementsByClassName('row row-cards')[0].style.paddingBottom = '0';
		document.getElementsByClassName('info-cliente')[0].style.paddingBottom = '0';
		document.getElementsByClassName('items')[0].style.paddingBottom = '20px';//-20
		document.getElementsByClassName('total')[0].style.paddingBottom = '0';//-20
		var objs = document.getElementsByClassName('row info');
		arr = [].slice.call(objs); //I have converted the HTML Collection an array
	    arr.forEach(function(v,i,a) {
	        v.style.paddingBottom = '0';
	    });
		
	};
</script>
@endsection