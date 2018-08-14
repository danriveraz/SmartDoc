@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Luis Felipe Castaño, ing-->


{!!Html::style('assets\css\cajero.css')!!}	
<link href="stylesheets/bootstrap.css" rel="stylesheet" id="bootstrap">
<style type="text/css">
	/* Customize the label (the container) */
.chekPocket {
  position: relative;
  padding-left: 30px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.chekPocket input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.chekPocket:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.chekPocket input:checked ~ .checkmark {
  background-color: #2d0031;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.chekPocket input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.chekPocket .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>


<div class="page-content" style="margin-top: 25px; background-color: transparent; font-family: Lato, sans-serif !important;>
	<div class="container" style="width: 900px;">
		<div class="card">
			<!-- inicio del contenedor del campo texto-->
			<div class="card-body" style="padding-bottom: 50px; border-bottom: 1px solid rgb(177, 192, 224);">     
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
			              	<div class="col-sm-1" style="padding-right: 5px; padding-left: 5px;">Cuota</div>
			                <div class="col-sm-7">Producto</div>
			                <div class="FactPocket col-sm-2 text-center">Abono</div>
			                <div class="FactPocket col-sm-2 text-right">Saldo</div>
		            	</div>
		            </div>
		            <div class="items" id="tabla" style="margin-bottom: 20px;">
		                <div class="row item" style="align-items: center; padding-bottom: 8px; border-bottom: 1px solid #EBECEE">
		                	<div class="col-sm-1 desc text-center" >{{$cuota}} </div>
		                  	<div class="FactPocket col-sm-7 amount text-left">{{$servicio->procedimiento->nombre}} </div>
		                  	<div class="FactPocket col-sm-2 amount text-center">
		                  		<input  type="number" class="popover-trigger" value="0" style="text-align:right;" onkeyup="validarMinMax();" name="abono" id="abono" max="{{$saldo}}">  
		                 	</div>
		                  	<div class="FactPocket col-sm-2 amount text-right"> $<?php echo number_format($saldo,0,",","."); ?></div>        
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
		            	@if($empresa->tipoRegimen == 'comun')
		            	<div class="row" style="margin-top: 0;">
		            		<div class="col-sm-12">
		            			<div class="field col-sm-2 pull-right  text-right">
									<span id="iva" data-regimen="comun">$0.00</span>
								</div>
		            			<div class="field col-sm-2 pull-right  text-right">
									<label>Iva {{$empresa->iva}}%</label>
								</div>
		            			<div class="field col-sm-1 pull-right  text-right">
		            				<label>
									<input type="checkbox" checked="checked">
            						<span class="checkmark"></span>
                  					</label>
								</div>
							</div>
		            	</div>
		            	@if($empresa->impuesto1 != "")
		            	<div class="row"  style="margin-top: 0;">
		            		<div class="col-sm-12">
		            			<div class="field col-sm-2 pull-right  text-right">
									<span id="valorImpuesto1" data-regimen="comun">$0.00</span>
								</div>
		            			<div class="field col-sm-2 pull-right  text-right">
									<label>{{$empresa->impuesto1}} {{$empresa->valorImpuesto1}}% </label>
								</div>
		            			<div class="field col-sm-1 pull-right  text-right">
									<input type="checkbox" name="activarImp1" id="activarImp1" checked/>
                  					<span></span>
								</div>
							</div>
		            	</div>
		            	@endif
		            	@if($empresa->impuesto2 != "")
		            	<div class="row" style="margin-top: 0;">
		            		<div class="col-sm-12">
		            			<div class="field col-sm-2 pull-right  text-right">
									<span id="valorImpuesto2" data-regimen="comun">$0.00</span>
								</div>
		            			<div class="field col-sm-2 pull-right  text-right">
									<label>{{$empresa->impuesto2}} {{$empresa->valorImpuesto2}}%</label>
								</div>
		            			<div class="field col-sm-1 pull-right  text-right">
									<input type="checkbox" name="activarImp1" id="activarImp1" checked/>
                  					<span></span>
								</div>
							</div>
		            	</div>
		            	@endif
             			@endif
		            	<div class="row" style="margin-top: 0px;">
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
            <div class="col-md-3 pull-right"> 
                <div class="form-group" style="padding-top: 25px;">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-refresh"></i></span>
                    <input class="form-control" id="cambio" disabled="" placeholder="Cambio" type="text">
                  </div>
                </div>            
              </div>                       
              <div class="col-md-3 pull-right"> 
                <div class="form-group">
                  <div class="input-group" style="padding-top: 25px;">
                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                    <input class="form-control" placeholder="Efectivo" onkeyup="validarEfectivo();" type="text" id="efectivo">
                  </div>
                </div>            
              </div>   
          </div>
          <div class="col-lg-12"> 
              @if($empresa->tipoRegimen == "comun")
                <br>
                <div class="text-center">
                <strong  style="text-align: center;">Resolución DIAN: {{$empresa->nresolucionFacturacion}} de {{$empresa->fechaResolucion}} del No. {{$empresa->nInicioFactura}} hasta {{$empresa->nFinFactura}}
                </strong>
              </div>
                @endif
            </div>
        	<div class="col-lg-12" style="margin-top: 40px;">
              <button class="factBot btn btn-bitbucket pull-right" style="background-color: rgb(49, 108, 190);"><i class="fa fa-money"></i>Pagar</button>
              <button class="factBot btn btn-bitbucket pull-right" onclick="nada();" style="background-color: rgb(49, 108, 190);"><i class="fa fa-print"></i>Imprimir</button>              
        	</div>
          </div>  

			</div>
			<!-- fin del contenedor del campo texto-->
			<div class="row" style="margin-top: 10px;">
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

	function validarMinMax(idInput) {
	    var valor = parseInt($(idInput).val());
	    var max = parseInt($(idInput).attr("max"));
	    if(valor > max) {
	        $(idInput).val(max);
	    } 
	    if (valor < 0){
	        $(idInput).val(0);
	    }
	    if(isNaN(valor)){
	      $(idInput).val(0);
	      valor = 0;
	    }
	};

	
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