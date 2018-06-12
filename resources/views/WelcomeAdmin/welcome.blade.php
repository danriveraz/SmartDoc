@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<div>
	<button id="btn-add" class="btn btn-pill btn-primary" data-toggle="modal" href="#addModal" title="Agregar procedimiento">
		<span class="fe fe-plus"> Agregar evento</span>
	</button>	
</div>
<br>

<!--Espacio modal add procedimiento-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action' => ['AgendaController@postcrearAgenda'], 'method' => 'POST','enctype' => 'multipart/form-data', 'id' => "formCrear"]) !!}
       	{{ csrf_field() }}
      	<div class="modal-body" align="center">
        	<div class="row">
	        	<div class="col-md-3">
		          	<input id="titulo" name="titulo" type="text" class="form-control" placeholder="Titulo" required="true">
	        	</div>
	        	<div class="col-md-3">
	        		<input id="fechaInicio" name="fechaInicio" type="date" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="AAAA/MM/DD" required="true" />
	        	</div>
	        	<div class="col-md-3">
			        <input id="hora" name="hora" type="text" class="form-control" placeholder="Hora inicio" required="true">
	        	</div>
	        	<div class="col-md-3">
	        		<select id="personal" name='personal' class="form-control" placeholder="" required>
	                  	<option value="" selected="selected">Persona encargada</option>
	                  	@foreach($personales as $personal)
		                    <option value="{{$personal->id}}">{{$personal->nombreCompleto}}</option>
		               	@endforeach
	            	</select>
	        	</div>
        	</div>
        	<div class="row">
        		<div class="col-md-3">
			        <input id="nombrePaciente" name="nombrePaciente" type="text" class="form-control" placeholder="Nombre del paciente" required="true">
	        	</div>
	        	<div class="col-md-3">
			        <input id="emailPaciente" name="emailPaciente" type="email" class="form-control" placeholder="Correo">
	        	</div>
	        	<div class="col-md-3">
			        <input id="cedulaPaciente" name="cedulaPaciente" type="text" class="form-control" placeholder="Cedula del paciente" required="true">
	        	</div>
	        	<div class="col-md-3">
			        <input id="telefonoPaciente" name="telefonoPaciente" type="text" class="form-control" placeholder="Teléfono del paciente" required="true">
	        	</div>
        	</div>
        	<div class="row" style="width: 25%">
	        	<div class="col-md-12" >
			        <input id="color" name="color" type="text" class="form-control" value="Estado: por atender" disabled>
	        	</div>
        	</div>
      </div>
      <div class="modal-footer">
        <a id="btn-crear" class="btn btn-primary" title="Agregar evento" onclick="agregar()">Guardar</a>
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
		                <th width="15%">Titulo</th>
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
								          	<input id="titulo{{$agenda->id}}" name="titulo{{$agenda->id}}" type="text" class="form-control" placeholder="Titulo" required="true" value="{{$agenda->titulo}}">
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
									        <select id="color{{$agenda->id}}" name="color{{$agenda->id}}" class="form-control" style="width: 25%">
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
						        <button type="submit" class="btn btn-primary">Guardar</button>
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



<script type="text/javascript">
	function eliminar(id){
		if(confirm('¿Desea eliminar este evento? Se perderán todos los datos.')){
			var form = document.getElementById("form"+id);
			form.submit();
		}
	}

	$(document).ready(function() {
	    $('#example').DataTable();
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
</script>

<style type="text/css">
	#btn-crear{
		color: #fff;
	}
</style>

@endsection