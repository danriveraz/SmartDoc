@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<!-- DataTables Example -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Agregar servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['route' => ['servicio.nuevo'], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
       {{ csrf_field() }}
      	<div class="modal-body" align="center">
      		<div class="row">
	        	<div class="col-md-4">
		          	<select id="idHistoria" name='idHistoria' class="form-control" placeholder="Documento" required style="text-align:center;">
	                  	<option value="" selected="selected">Documento</option>
	        			@foreach($historiasClinicas as $historia)
	        				<option value="{{$historia->id}}">{{$historia->documento}}</option>
				        @endforeach
	            	</select>
	            </div>
	            <div class="col-md-4">
	        		<input type="text" class="form-control" id="nombrePaciente" name="nombrePaciente" 
	        		placeholder="Nombre completo" value="">
	        	</div>	
	      		<div class="col-md-4">
	        		<input type="text" class="form-control" id="epsPaciente" name="epsPaciente"  placeholder="EPS" value="">
	        	</div>	
	        </div>
        	<div class="row">
	        	<div class="col-md-4">
		          	<select id="servicioNuevo" name='servicioNuevo' class="form-control" placeholder="Procedimiento" required style="text-align:center;">
	                  	<option value="" selected="selected">Procedimiento</option>
	        			@foreach($procedimientos as $procedimiento)
	        				<option value="{{$procedimiento->id}}">{{$procedimiento->nombre}}</option>
				        @endforeach
	            	</select>
	            </div>
	            <div class="col-md-4">
	        		<input type="number" class="form-control" id="costoTratamientoNuevo" name="costoTratamientoNuevo" placeholder="Costo tratamiento" value="">
	        	</div>	
	        	<div class="col-md-4">
	        		<input type="number" class="form-control" id="valorTratamientoNuevo" name="valorTratamientoNuevo" placeholder="Valor tratamiento" value="">
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-12">
	        		<textarea id="descripcionNueva" name="descripcionNueva" rows="3" class="form-control" placeholder="Descripción"></textarea>
	        	</div>
        	</div>
      	</div>
		<div class="modal-footer">
		<button type="submit" id="btn-crear" class="btn btn-primary" title="Agregar evento">Guardar &nbsp;<li class="fa fa-check"></li></button>
		</div>
      {{ Form::close() }}
    </div>
  </div>
</div>
<div>
<!-- 
<a class="btn btn-pill btn-primary" href="{{url('/Cuentas')}}" title="Ver Ingresos">
	<i class="fa fa-money" style="margin-right: 0px;font-size: 20px;margin-top:5px;"></i>
	<span style="font-weight: 500"> Ver Ingresos</span>
</a>
-->
<a class="btn btn-pill btn-primary" data-toggle="modal" href="#addModal" title="Facturar">
	<i style="margin-right: 0px; margin-top:5px;"></i>
	<span style="font-weight: 500"></span>
	Facturar
</a>	
</div>
<br>
<div class="container main-content">
  	<div class="page-title"></div>
  	<div class="row">
      	<div class="col-lg-12">
        	<div class="widget-container fluid-height clearfix">
          		<div class="widget-content padded clearfix">
					<table id="example" class="table table-striped" style="width:100%">
		        		<thead>
		            		<tr>
				                <th width="15%">Fecha</th>
				                <th width="20%">Procedimiento</th>
				                <th width="25%">Nombre</th>
				                <th width="20%">Documento</th>
				                <th width="10%">Valor</th>
				                <th width="5%">Estado</th>
				                <th width="5%">Opciones</th>
				            </tr>
		        		</thead>
		        	<tbody>
		        	@foreach($servicios as $servicio)
		            <tr>
		                <td>{{$servicio->fecha}}</td>
		                <td>{{$servicio->procedimiento->nombre}}</td>
		                <td>{{$servicio->historiaClinica->nombreCompleto}}</td>
		                <td>{{$servicio->historiaClinica->documento}}</td>
		                <td>{{$servicio->costoTratamiento}}</td>
		                <td>{{$servicio->estado}}</td>
		                <td>
		                	<div class="row" style="align-items: center;">
		                		<div class="col-md-4" style="padding: 0px;">
		                			{!! Form::open(['route' => ['factura'], 'method' => 'post','enctype' => 'multipart/form-data', 'id' => "form$servicio->id"]) !!}
			       						{{ csrf_field() }}
			       						<input type="text" name="id" hidden="" value="{{$servicio->id}}">
			       						@if($servicio->estado == "Pendiente")
							        	<button class="btn btn-primary btn-sm ml-2" title="Ver factura" href="{{ url('Factura') }}"><i class="fa fa-dollar" style="margin: 0;"></i></button>
							        	@else
							        	<button class="btn btn-success btn-sm ml-2" title="Factura completamente paga" href="{{ url('Factura') }}"><i class="fa fa-file-text-o" style="margin: 0;"></i></button>
							        	@endif

						        	{{ Form::close() }}
			                	</div>
		                		<div class="col-md-4" style="padding: 0px;">
		                			{!! Form::open(['route' => ['servicio.abonos'], 'method' => 'post','enctype' => 'multipart/form-data', 'id' => "form2$servicio->id"]) !!}
			       						{{ csrf_field() }}
			       						<input type="text" name="id" hidden="" value="{{$servicio->id}}">
			       						@if($servicio->estado == "Pendiente")
							        	<button class="btn btn-primary btn-sm ml-2" title="Abonar"><i class="fa fa-dollar" style="margin: 0;"></i></button>
							        	@else
							        	<button class="btn btn-success btn-sm ml-2" title="Abonos "><i class="fa fa-dollar" style="margin: 0;"></i></button>
							        	@endif
							        {{ Form::close() }}
			                	</div>
			                	<div class="col-md-4" style="padding: 0px;">
			                		{!! Form::open(['route' => ['Auth.usuario.deleteServicio', $servicio], 'method' => 'GET','enctype' => 'multipart/form-data', 'id' => "form3$servicio->id"]) !!}
				       				{{ csrf_field() }}
							        	<a class="btn btn-danger btn-sm ml-2" title="Anular factura" onclick="eliminar({{$servicio->id}})"><i class="fe fe-trash-2"></i></a>
							        {{ Form::close() }}
						    	</div>
		                	</div>
		                </td>
		            </tr>
		           @endforeach
		        </tbody>
		    </table>
		  </div>
		</div>
	  </div>
	</div>
</div>



<script type="text/javascript">

	function eliminar(id){
		idForm = "form3" + id;
		var form = document.getElementById(idForm);
		if(confirm('¿Desea eliminar este servicio? Se perderán todos los datos y se restará este servicio de Cuentas.')){
			form.submit();
		}
	}

	$(document).ready(function() {
	    $('#example').DataTable( {
	        dom: 'lBfrtip',
	        buttons: [
	            {
					extend:    'excelHtml5',
					text:      '<img src="http://localhost/SmartDoc/public/images/table/excel.png">',
					titleAttr: 'Descarga Excel'
				},
				{
					extend:    'pdfHtml5',
					text:      '<img src="http://localhost/SmartDoc/public/images/table/pdf.png">',
					titleAttr: 'Descarga PDF'
	            }
	        ]
    	} );
	} );
</script>
	<!-- end DataTables Example -->
<script type="text/javascript">
	$('#servicioNuevo').on('change', function (event) {
	    var id = $(this).find('option:selected').val();
	    if(id != ""){
			JSONProcedimientos = eval(<?php echo json_encode($procedimientos);?>);
		     for (var i = 0; i < JSONProcedimientos.length; i++) {
				if(JSONProcedimientos[i].id == id){
	    			$("#costoTratamientoNuevo").val(JSONProcedimientos[i].costo);
	    			$("#valorTratamientoNuevo").val(JSONProcedimientos[i].venta);
	    			break;
		        }else{
		        	$("#costoTratamientoNuevo").val("");
	    			$("#valorTratamientoNuevo").val("");
		        }
			}
	    }	
	});
	$('#idHistoria').on('change', function (event) {
    	var id = $(this).find('option:selected').val();
      	JSONHistorias = eval(<?php echo json_encode($historiasClinicas);?>);
      	for (var i = 0; i < JSONHistorias.length; i++) {
      		if(JSONHistorias[i].id == id){
        		var nombre = document.getElementById("nombrePaciente");
        		var eps = document.getElementById("epsPaciente");
        		nombre.value = JSONHistorias[i].nombreCompleto;
        		eps.value = JSONHistorias[i].eps;
        		break;
      		}else{
        		var nombre = document.getElementById("nombrePaciente");
        		var eps = document.getElementById("epsPaciente");
        		nombre.value = "";
        		eps.value = "";
        	}
      	}
  	});
</script>

@endsection
