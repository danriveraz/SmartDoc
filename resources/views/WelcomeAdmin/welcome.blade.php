@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->

<!-- boton de añadir-->
<div>
	<button id="btn-add" class="btn btn-pill btn-primary" data-toggle="modal" href="#addModal" title="Agregar procedimiento">
		<i class="fa fa-plus" style="margin-right: 0px;"></i><span style="font-weight: 500"> Añadir Evento</span>
	</button>
</div>
<!-- boton de añadir-->
<br>

<!--Espacio modal add procedimiento-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background-color: white;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action' => ['AgendaController@postcrearAgenda'], 'method' => 'POST','enctype' => 'multipart/form-data', 'id' => "formCrear"]) !!}
       	{{ csrf_field() }}
      	<div class="modal-body">
      		<h4  align="center">Información de la cita</h4>
        	<div class="row">
<!-- lado izquiero-->
						<div class="col-sm-6">
							<div class="form-group">
									 <label class="form-label">Procedimiento</label>
								 <div class="input-icon">
												 <span class="input-icon-addon">
													 <i class="fa fa-venus-mars"></i>
												 </span>
 											 <select id="procedimiento" name='procedimiento' onChange="ProcedimientoChange(this)" class="form-control" placeholder="" required>				 	                  	@foreach($procedimientos as $procedimiento)
				 		                    <option value="{{$procedimiento->id}}">{{$procedimiento->nombre}}</option>
				 		               	@endforeach
				 	            	</select>
									</div>
								</div>
								<div class="form-group" id="procedimientoOtro" style="display:none;">
										 <label class="form-label">Nombre Procedimiento</label>
									 <div class="input-icon">
													 <span class="input-icon-addon">
														 <i class="fa fa-birthday-cake"></i>
													 </span>
													 <input id="hora" name="hora" type="text" class="form-control" required="true">
									</div>
								</div>
								<div class="form-group">
										 <label class="form-label">Medico</label>
									 <div class="input-icon">
													 <span class="input-icon-addon">
														 <i class="fa fa-venus-mars"></i>
													 </span>
													 <select id="personal" name='personal' class="form-control" placeholder="" required="true">
						 	                  	@foreach($personales as $personal)
						 	                  		@if(!$personal->esAdmin)
						 	                  			@if(!$personal->eliminado)
						 		                    		<option value="{{$personal->id}}">{{$personal->nombreCompleto}}</option>
						 		                    	@endif
						 		                    @endif
						 		               	@endforeach
						 	            	</select>
										</div>
									</div>




						</div>
<!-- lado derecho-->
						<div class="col-sm-6">
							<div class="form-group">
									 <label class="form-label">Hora</label>
								 <div class="input-icon">
												 <span class="input-icon-addon">
													 <i class="fa fa-birthday-cake"></i>
												 </span>
												 <input id="hora" name="hora" type="text" class="form-control" placeholder="00:00 am" required="true">
								</div>
							</div>
							<div class="form-group">
									 <label class="form-label">Dia</label>
								 <div class="input-icon">
												 <span class="input-icon-addon">
													 <i class="fa fa-birthday-cake"></i>
												 </span>
												 <input id="fechaInicio" name="fechaInicio" type="date" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="AAAA/MM/DD" required="true" />
								</div>
							</div>

						</div>
<!-- fin Información cita-->
        	</div>
        	<br>
        	<h4  align="center">Información del paciente</h4>
        	<div class="row">
        		<div class="col-md-4">
        			<select id="nuevoviejo" name='nuevoviejo' class="form-control" placeholder="" onchange="valor(this.value);">
	                  	<option value="0" selected="selected">Nuevo</option>
	                  	<option value="1">Existente</option>
	            	</select>
        		</div>
        		<div class="col-md-4">
        			<input id="cedulaPaciente" name="cedulaPaciente" type="text" class="form-control" placeholder="Cédula" required="true">

        			<select id="cedulaPacienteViejo" name='cedulaPacienteViejo' class="form-control" placeholder="" style="display: none;">
        				<option value="" selected="selected">Cédula</option>
	                  	@foreach($historias as $historia)
		                    <option value="{{$historia->id}}">{{$historia->documento}}</option>
		               	@endforeach
        			</select>
	        	</div>
	        	<div class="col-md-4">
			        <input id="emailPaciente" name="emailPaciente" type="email" class="form-control" placeholder="Correo">
	        	</div>
        	</div>
        	<div class="row">
        		<div class="col-md-6">
	        		<input id="nombrePaciente" name="nombrePaciente" type="text" class="form-control" placeholder="Nombre del paciente" required="true">
	        	</div>
	        	<div class="col-md-6">
			        <input id="telefonoPaciente" name="telefonoPaciente" type="text" class="form-control" placeholder="Teléfono del paciente" required="true">
	        	</div>
        	</div>
      	</div>
		<div class="modal-footer">
			<div id="divGuardarEvento">
				<a id="btn-crear" class="btn btn-primary" title="Agregar evento" onclick="agregar()">Guardar &nbsp;
					<li class="fa fa-check"></li>
				</a>
			</div>
			<div id="divInfoPersonal">
				<h6>Para registrar un evento es necesario tener personal a cargo, ingreselo
					<a href="{{url('/Personal')}}" style="color: blue;">aquí</a>
				</h6>
			</div>
		</div>
      {{ Form::close() }}
    </div>
  </div>
</div>
<!--Espacio para la tabla de los procedimientos-->
<!-- DataTables Example -->
<div class="container main-content">
  <div class="page-title"></div>
  <div class="row">
      <div class="col-lg-12">
        <div class="widget-container fluid-height clearfix">
          <div class="widget-content padded clearfix">
			<table id="example" class="table table-striped" style="width:100%">
		        <thead>
		            <tr>
		            	<th width="10%">Hora</th>
		                <th width="15%">Procedimiento</th>
						<th width="20%">Encargado</th>
						<th width="20%">Paciente</th>
						<th width="15%">Cedula</th>
						<th width="5%">Teléfono</th>
		                <th width="15%">Fecha</th>
		                <th width="5%">Estado</th>
		                <th width="10%">Opciones</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($agendas as $agenda)
		            <tr>
		            	<td>{{$agenda->hora}}</td>
		                <td>{{$agenda->titulo}}</td>
		                <td>
		                	@foreach($personales as $personal)
		                		@if($agenda->idUsuario == $personal->id)
		                			{{$personal->nombreCompleto}}
		                		@endif
		                	@endforeach
		                </td>
		                <td>{{$agenda->nombrePaciente}}</td>
		                <td>{{$agenda->cedulaPaciente}}</td>
		                <td>{{$agenda->telefonoPaciente}}</td>
		                <td>{{$agenda->fechaInicio}}</td>
		                <td align="center">
		                	@if($agenda->color == "green")
		                		<span class="fa fa-circle" style="color: green" title="Atendido"></span>
		                	@elseif($agenda->color == "orange")
		                		<span class="fa fa-circle" style="color: orange" title="Por atender"></span>
		                	@else
		                		<span class="fa fa-circle" style="color: red" title="Cancelado"></span>
		                	@endif
		                </td>
		                <td>
	                      	{!! Form::open(['route' => ['Auth.usuario.eliminarAgenda', $agenda], 'method' => 'GET','enctype' => 'multipart/form-data', 'id' => "form$agenda->id"]) !!}
		       				{{ csrf_field() }}
			       				<a class="btn btn-primary btn-sm" data-toggle="modal" href="#editModal{{$agenda->id}}" style="width: 40%;">
	                        		<i class="fa fa-pencil"></i>
	                      		</a>
					        	<a class="btn btn-danger btn-sm ml-2" title="Eliminar evento" onclick="eliminar({{$agenda->id}})"><i class="fe fe-trash-2"></i></a>
					        {{ Form::close() }}
		                </td>
		                <!--Modal edit procedimiento -->
						<div class="modal fade" id="editModal{{$agenda->id}}" tabindex="-1" role="dialog">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Editar evento</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      {!! Form::open(['route' => ['Auth.usuario.editarAgenda', $agenda], 'method' => 'GET','enctype' => 'multipart/form-data']) !!}
			       				{{ csrf_field() }}
						      	<div class="modal-body">
						      		<div class="row">
							        	<div class="col-md-3">
								          	<select id="procedimiento{{$agenda->id}}" name="procedimiento{{$agenda->id}}" class="form-control">
							        			<option value="" selected="selected">Procedimiento</option>
							        			@foreach($procedimientos as $procedimiento)
							        				<option value="{{$procedimiento->id}}"
								                     @if($agenda->idProcedimiento == $procedimiento->id)
								                     selected = "true"
								                     @endif
								                     >{{$procedimiento->nombre}}</option>
										        @endforeach
									        </select>
							        	</div>
							        	<div class="col-md-3">
							        		<input id="fechaInicio{{$agenda->id}}" name="fechaInicio{{$agenda->id}}" type="date" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="AAAA/MM/DD" required="true" value="{{$agenda->fechaInicio}}" />
							        	</div>
							        	<div class="col-md-3">
									        <input id="hora{{$agenda->id}}" name="hora{{$agenda->id}}" type="text" class="form-control" placeholder="Hora inicio" required="true" value="{{$agenda->hora}}">
							        	</div>
							        	<div class="col-md-3">
							        		<select id="personal{{$agenda->id}}" name='personal{{$agenda->id}}' class="form-control" placeholder="" required>
							                  	@foreach($personales as $personal)
								                    <option value="{{$personal->id}}"
								                     @if($agenda->idUsuario == $personal->id)
								                     selected = "true"
								                     @endif
								                     >{{$personal->nombreCompleto}}</option>
								               	@endforeach
							            	</select>
							        	</div>
						        	</div>
						        	<div class="row">
						        		<div class="col-md-3">
									        <input id="nombrePaciente{{$agenda->id}}" name="nombrePaciente{{$agenda->id}}" type="text" class="form-control" placeholder="Nombre del paciente" required="true" value="{{$agenda->nombrePaciente}}">
							        	</div>
							        	<div class="col-md-3">
									        <input id="emailPaciente{{$agenda->id}}" name="emailPaciente{{$agenda->id}}" type="email" class="form-control" placeholder="Correo" value="{{$agenda->emailPaciente}}">
							        	</div>
							        	<div class="col-md-3">
									        <input id="cedulaPaciente{{$agenda->id}}" name="cedulaPaciente{{$agenda->id}}"" type="text" class="form-control" placeholder="Cedula del paciente" value="{{$agenda->cedulaPaciente}}"" required="true">
							        	</div>
							        	<div class="col-md-3">
									        <input id="telefonoPaciente{{$agenda->id}}" name="telefonoPaciente{{$agenda->id}}"" type="text" class="form-control" placeholder="Teléfono del paciente" value="{{$agenda->telefonoPaciente}}"" required="true">
							        	</div>
						        	</div>
						        	<div class="row" align="center">
						        		<div class="col-md-12">
									        <select id="color{{$agenda->id}}" name="color{{$agenda->id}}" class="form-control" style="width: 25%;">
									        	<option value="green"
									        	@if($agenda->color == "green")
									        		selected = "true"
									        	@endif
									        	>Atendido</option>
									        	<option value="orange"
									        	@if($agenda->color == "orange")
									        		selected = "true"
									        	@endif
									        	>Por atender</option>
									        	<option value="red"
									        	@if($agenda->color == "red")
									        		selected = "true"
									        	@endif
									        	>Cancelado</option>
									        </select>
							        	</div>
							        </div>
						      </div>
						      <div class="modal-footer">
						        <button type="submit" class="btn btn-primary">Guardar &nbsp;<li class="fa fa-check"></li></button>
						      </div>
						      {{ Form::close() }}
						    </div>
						  </div>
						</div>
						<!--Fin modal edit procedimiento-->
		            </tr>
		           @endforeach
		        </tbody>
		    </table>
		  </div>
		</div>
	  </div>
	</div>
</div>

<script>

function ProcedimientoChange() {
	var opt = $('#procedimiento').val();
      if(opt==Otros){
           divC = document.getElementById("procedimientoOtro");
           divC.style.display = "block";

      }else{
           divC = document.getElementById("procedimientoOtro");
           divC.style.display="none";
      }
}
</script>

<script type="text/javascript">
	function eliminar(id){
		if(confirm('¿Desea eliminar este evento? Se perderán todos los datos.')){
			var form = document.getElementById("form"+id);
			form.submit();
		}
	}

	$(document).ready(function() {
	    if(document.getElementById('personal').length == 0){
	    	document.getElementById('divGuardarEvento').style.display = 'none';
	    }else{
	    	document.getElementById('divInfoPersonal').style.display = 'none';
	    }

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

	require(['input-mask']);

	var JSONcitas = eval(<?php echo json_encode($citas2array); ?>);
	$documento = document.getElementById("cedulaPaciente");
	function agregar(){
		if(JSONcitas.length != 0){
			for (var i = 0; i < JSONcitas.length; i++){
				if($documento.value == JSONcitas[i][0]){
					if(confirm('Elementos en el laboratorio sin llegar para este paciente, ¿desea agendar igualmente?')){
						var form = document.getElementById("formCrear");
						form.submit();
					}
				break;
				}else{
					var form = document.getElementById("formCrear");
					form.submit();
					break;
				}
			}
		}else{
			var form = document.getElementById("formCrear");
			form.submit();
		}
	}

	var valor = function(x){
	    if(x == '1'){
	      document.getElementById('cedulaPacienteViejo').style.display = "block";
	      document.getElementById('cedulaPacienteViejo').required = true;
	      document.getElementById('cedulaPaciente').style.display = "none";
	      document.getElementById('cedulaPaciente').required = false;
	      document.getElementById('cedulaPaciente').value = "";

	    }else{
	      document.getElementById('cedulaPacienteViejo').style.display = "none";
	      document.getElementById('cedulaPacienteViejo').required = false;
	      document.getElementById('cedulaPaciente').style.display = "block";
	      document.getElementById('cedulaPaciente').required = true;
	    }
  	};

  	$('#cedulaPacienteViejo').on('change', function (event) {
    	var id = $(this).find('option:selected').val();
      	JSONHistorias = eval(<?php echo json_encode($historias);?>);
      	for (var i = 0; i < JSONHistorias.length; i++) {
      		if(JSONHistorias[i].id == id){
      			var nombre = document.getElementById("nombrePaciente");
        		var email = document.getElementById("emailPaciente");
        		var telefono = document.getElementById("telefonoPaciente");
        		nombre.value = JSONHistorias[i].nombreCompleto;
        		email.value = JSONHistorias[i].email;
        		telefono.value = JSONHistorias[i].telefono;
        		break;
      		}else{
        		var nombre = document.getElementById("nombrePaciente");
        		var email = document.getElementById("emailPaciente");
        		var telefono = document.getElementById("telefonoPaciente");
        		nombre.value = "";
        		email.value = "";
        		telefono.value = "";
        	}
      	}
  	});

</script>

<style type="text/css">
	#btn-crear{
		color: #fff;
	}
</style>

@endsection
