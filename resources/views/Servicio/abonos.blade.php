@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Luis Felipe Castaño, ing-->


{!!Html::style('assets\css\cajero.css')!!}	
<link href="stylesheets/bootstrap.css" rel="stylesheet" id="bootstrap">

<div class="page-content" style="margin-top: 25px; background-color: transparent;">
	<div class="container" style="width: 900px;">
		<div class="card">
			<!-- inicio del contenedor del campo texto-->
			<div class="card-body">     
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
			                  {{$empresa->direccion}} - {{$empresa->ciudad}}, {{$empresa->departamento}} <br>
			                  {{$empresa->telefono}} <br>
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
			                    	@if($empresa->tipoRegimen == "comun")
			                    		Resolución {{$empresa->nResolucionFacturacion}}<br>
			                    	@endif
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
				<div class="info-cliente">
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
			              	<div class="col-sm-1" style="padding-right: 5px; padding-left: 5px;">Cuota</div>
			                <div class="col-sm-7">Producto</div>
			                <div class="FactPocket col-sm-2 text-center">Abono</div>
			                <div class="FactPocket col-sm-2 text-right">Saldo</div>
		            	</div>
		            </div>
		            <div class="items" id="tabla" style="margin-bottom: 20px;">
		                <div class="row item" style="align-items: center; padding-bottom: 8px; border-bottom: 1px solid #EBECEE">
		                	<div class="col-sm-1 desc text-center" >1</div>
		                  	<div class="FactPocket col-sm-7 amount text-left">Blanqueamiento</div>
		                  	<div class="FactPocket col-sm-2 amount text-center">
		                  		<input  type="number" class="popover-trigger" >
		                 	</div>
		                  	<div class="FactPocket col-sm-2 amount text-right">$123.213</div>        
		                </div>
		            </div>
		            <div class="total">
		            	<div class="row">
		            		<div class="col-sm-12">
		            			<div class="field col-sm-2 pull-right  text-right">
									<span id="subtotal">$0.00</span>
								</div>
		            			<div class="field col-sm-2 pull-right  text-right">
									Subtotal
								</div>
							</div>
		            	</div>
		            	<div class="row" style="margin-top: 5px;">
		            		<div class="col-sm-12">
		            			<div class="field col-sm-2 pull-right  text-right">
									<span id="subtotal">$0.00</span>
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
              <div class="col-md-4" style="padding-left: 0px;"> 
                <div class="form-group" style="padding-top: 25px;">
                  <div class="input-group" >
                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                    <input class="form-control" placeholder="Propina" onkeyup="validarPropina();" type="text" value="" id="propina" data-propina="0" data-modificacion="false" style="paddin">
                  </div>
                </div>            
              </div>
              <div class="col-md-4"> 
                <div class="form-group">
                  <div class="input-group" style="padding-top: 25px;">
                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                    <input class="form-control" placeholder="Efectivo" onkeyup="validarEfectivo();" type="text" id="efectivo">
                  </div>
                </div>            
              </div>
              <div class="col-md-4"> 
                <div class="form-group" style="padding-top: 25px;">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-refresh"></i></span>
                    <input class="form-control" id="cambio" disabled="" placeholder="Cambio" type="text">
                  </div>
                </div>            
              </div>
              @if($empresa->tipoRegimen == "comun")
                <br>
                <div class="text-center">
                <strong  style="text-align: center;">Resolución DIAN: {{$empresa->nresolucionFacturacion}} de {{$empresa->fechaResolucion}} del No. {{$empresa->nInicioFactura}} hasta {{$empresa->nFinFactura}}
                </strong>
              </div>
                @endif
            </div>


            <div class="row">
            <div class="col-lg-12 center" id="buttonsDiv">
                  <button class="factBot btn btn-bitbucket pull-right"><i class="fa fa-money"></i>Pagar</button>
                  <button class=" factBot btn btn-bitbucket pull-right" onclick="nada();"><i class="fa fa-print"></i>Imprimir</button>
              <button class=" factBot btn btn btn-pinterest pull-right" href="{{url('cajero/historial')}}" style="background-color: #999999;"><i class="fa fa-file-text-o"></i>Historial</button>
            </div>
          </div>



          </div>  

			</div>
			<!-- fin del contenedor del campo texto-->
			<div class="row" style="margin-top: 50px;">
				<div class="col-lg-12">
					<div class="widget-container fluid-height clearfix">
						<div class="widget-content padded clearfix">
							<div class="row" id="toggle" style="margin-bottom: 20px;">
								<div class="col-md-12 text-center">
								  <a class="invoice-client mrg10T pocketMorado" >Historial de abonos:</a>
								</div>
							</div>
							<table id="example" class="table table-striped" style="width:100%">
					    		<thead>
					        		<tr>
						                <th width="15%">Fecha</th>
						                <th width="20%">Procedimiento</th>
						                <th width="25%">Nombre</th>
						                <th width="20%">Documento</th>
						                <th width="15%">Valor</th>
						                <th width="5%">Opciones</th>
						            </tr>
					    		</thead>
						    	<tbody>
								</tbody>
							</table>	
						</div>
					</div>
				</div>
			</div>
    	</div>
	</div>
</div>




<script type="text/javascript">

	function eliminar(id){
		if(confirm('¿Desea eliminar este servicio? Se perderán todos los datos y se restará este servicio de Cuentas.')){
			var form = document.getElementById("form"+id);
			form.submit();
		}
	}

	function abonar(id){
		var form = document.getElementById("form"+id);
		form.submit();	
	}

	
	$(document).ready(function() {
	    $('#example').DataTable( {
	        dom: 'lBfrtip',
	        buttons: [
	           
	        ]
    	} );
	} );
</script>
	<!-- end DataTables Example -->

@endsection