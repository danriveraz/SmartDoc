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
			              	<div class="col-sm-1" style="padding-right: 5px; padding-left: 5px;">Cuota</div>
			                <div class="col-sm-7">Servicio</div>
			                <div class="FactPocket col-sm-2 text-center">Abono</div>
			                <div class="FactPocket col-sm-2 text-right">Saldo</div>
		            	</div>
		            </div>
		            <div class="items" id="tabla" style="margin-bottom: 20px;">
		                <div class="row item" style="align-items: center; padding-bottom: 8px; border-bottom: 1px solid #EBECEE">
		                	<div class="col-sm-1 desc text-center" >{{$cuota}} </div>
		                  	<div class="FactPocket col-sm-7 amount text-left">{{$servicio->procedimiento->nombre}} </div>
		                  	<div class="FactPocket col-sm-2 amount text-center">
		                  		<input  type="number" class="popover-trigger" value="0" style="text-align:right;" onkeyup="validarMinMax();" name="abono" id="abono" max="{{$saldo}}" min="0">  
		                 	</div>
		                  	<div class="FactPocket col-sm-2 amount text-right"> $<?php echo number_format($saldo,0,",","."); ?></div>        
		                </div>
		            </div>
          		</div>
			</div>




		<div class="row">
            <div class="col-lg-12">   
            <div class="col-md-3 pull-right"> 
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-refresh"></i></span>
                    <input class="form-control" id="cambio" disabled="" placeholder="Cambio" type="text" style="color: #20A720; font-weight: bold;">
                  </div>
                </div>            
              </div>                       
              <div class="col-md-3 pull-right"> 
                <div class="form-group">
                  <div class="input-group">
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
                <strong  style="text-align: center;">Resolución DIAN: {{$empresa->nResolucionFacturacion}} de {{$empresa->fechaResolucion}} del No. {{$empresa->nInicioFactura}} hasta {{$empresa->nFinFactura}}
                </strong>
              </div>
                @endif
            </div>
        	<div class="col-lg-12" style="margin-top: 40px;">
              <button class="factBot btn btn-bitbucket pull-right" style="background-color: rgb(49, 108, 190);" id="pagar"><i class="fa fa-money"></i>Pagar</button>
              </form>
              
              	<input type="text" name="id" value="{{$servicio->id}}" hidden="">
              <a class="factBot btn btn-bitbucket pull-right" id="imprimir" style="background-color: rgb(49, 108, 190);" onclick="imprimr();"><i class="fa fa-print"></i>Imprimir</a>   
                     
        	</div>
          </div>  
      
			</div>
			<!-- fin del contenedor del campo texto-->
			<div class="row" style="margin-top: 10px;" id="historial">
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
						                <th width="15%">Cuota</th>
						                <th width="20%">Fecha</th>
						                <th width="25%">Abono realizado</th>
						                <th width="20%">Saldo restante</th> 
						            </tr>
					    		</thead>
						    	<tbody>
						    		@foreach($servicio->abonos as $abono)
						            <tr>
						                <td>{{$contadorCuotas+=1}}</td>
						                <td>{{$abono->fecha}}</td>
						                <td>{{$abono->abono}}</td>
						                <td>{{$saldoRestante -=  $abono->abono}}</td>
						            </tr>
		           					@endforeach
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

	function validarMinMax() {
	    var valor = parseInt($("#abono").val());
	    var max = parseInt($("#abono").attr("max"));
	    if(valor > max) {
	        $("#abono").val(max);
	    } 
	    if (valor < 0){
	        $("#abono").val(0);
	    }
	    if(isNaN(valor)){
	      $("#abono").val(0);
	      valor = 0;
	    }
	    validarEfectivo();
	};

	function imprimr() {
	    var valor = parseInt($("#abono").val());
		if(valor > 0){
			document.title = "Pocket Company S.A.S - Regimen común - Nit: 901158690-1 Cel: 3182811441";
			document.getElementsByClassName('page-header-fixed')[0].style.paddingTop = '20px';
			document.getElementsByClassName('card-body')[0].style.borderBottom = 0;
			document.getElementsByClassName('card-body')[0].style.paddingBottom = 0;
			document.getElementById('imprimir').style.display = 'None';
			document.getElementById('pagar').style.display = 'None';
			document.getElementById('example_filter').style.display = 'None';
			if(confirm('¿Desea Imprimir solo el abono?')){
				document.getElementById('historial').style.display = 'None';
			}else{
			}
			print();
			document.getElementsByClassName('page-header-fixed')[0].style.paddingTop = '148px';
			document.getElementsByClassName('card-body')[0].style.borderBottom = '1px solid rgb(177, 192, 224)';

			document.getElementsByClassName('card-body')[0].style.paddingBottom = '50px';
			document.getElementById('imprimir').style.display = 'Block';
			document.getElementById('pagar').style.display = 'Block';
			document.getElementById('historial').style.display = 'Block';
			document.getElementById('example_filter').style.display = 'Block';
			document.title = "SmartDoc";
		}
		else{
			alert("Debe existir un valor a abonar");
		}
	};

	function validarEfectivo() {
	    var efectivo = $("#efectivo").val();
	    if(efectivo != ""){
	      var total = parseInt($("#abono").val());
	      var cambio = efectivo - total;  
	      if(Math.sign(cambio) != -1){
	        $("#cambio").val("$" + Intl.NumberFormat().format(cambio));
	      } 
	      else{
		      $("#cambio").val("");
		    }
	    }
	    else{
	      $("#cambio").val("");
	    }
	    
	}
	
	$(document).ready(function() {
	    $('#example').DataTable( {
	        dom: 'Bfrtip',
	        buttons: [
	           
	        ]
    	} );

	} );
</script>
	<!-- end DataTables Example -->

@endsection