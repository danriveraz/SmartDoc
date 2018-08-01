@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<div>
	<button id="btn-add" class="btn btn-pill btn-primary" data-toggle="modal" href="#addModal" title="Agregar laboratorio">
		<span class="fe fe-plus"></span>
	</button>	
</div>
<br>

<!--Espacio modal add laboratorio-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action' => ['LaboratorioController@postcreateLaboratorio'], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
       	{{ csrf_field() }}
      	<div class="modal-body">
        	<div class="row">
	        	<div class="col-md-3">
		          	<input id="nombreLaboratorio" name="nombreLaboratorio" type="text" class="form-control" placeholder="Nombre laboratorio" required="true">
	        	</div>
	        	<div class="col-md-3">
			        <select class="form-control" id="cedulaPaciente"  data-live-search="true" name="cedulaPaciente" required>
                        <option value="">Documento</option>
                          	@foreach($historiasClinicas as $historia)
                                <option value="{{$historia->id}}">{{$historia->documento}}</option>
                          	@endforeach
                    </select>
	        	</div>
	        	<div class="col-md-3">
			        <input id="nombrePaciente" name="nombrePaciente" type="text" class="form-control" placeholder="Nombre paciente">
	        	</div>
	        	<div class="col-md-3">
			        <input id="referencia" name="referencia" type="text" class="form-control" placeholder="Referencia" required="true">
	        	</div>
        	</div>
        	<div class="row">
	        	<div class="col-md-4">
			        <input id="valor" name="valor" type="number" class="form-control" placeholder="Valor" required="true">
	        	</div>
	        	<div class="col-md-4">
			        <input id="fechaEnvio" name="fechaEnvio" type="text" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="fecha envío AA/MM/DD" required="true" />
	        	</div>
	        	<div class="col-md-4">
			        <input id="fechaEntrega" name="fechaEntrega" type="text" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="fecha Entrega AA/MM/DD" required="true" />
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

<!--Espacio para la tabla de los laboratorios-->
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
		                <th width="20%">Laboratorio</th>
		                <th width="10%">Documento</th>
		                <th width="15%">Nombre</th>
		                <th width="15%">Referencia</th>
		                <th width="10%">Valor</th>
		                <th width="10%">Envío</th>
		                <th width="10%">Entrega</th>
		                <th width="10%">Opciones</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($laboratorios as $laboratorio)
		            <tr>
		                <td>{{$laboratorio->nombreLaboratorio}}</td>
		                <td>
		                	@foreach($historiasClinicas as $historia)
		                		@if($laboratorio->idHistoriaClinica == $historia->id)
		                			{{$historia->documento}}
		                		@endif
		                	@endforeach
		                </td>
		                <td>{{$laboratorio->nombrePaciente}}</td>
		                <td>{{$laboratorio->referencia}}</td>
		                <td>{{$laboratorio->valor}}</td>
		                <td>{{$laboratorio->fechaEnvio}}</td>
		                <td>{{$laboratorio->fechaEntrega}}</td>
		                <td>
	                      	{!! Form::open(['route' => ['Auth.usuario.deleteLaboratorio', $laboratorio], 'method' => 'GET','enctype' => 'multipart/form-data', 'id' => "form$laboratorio->id"]) !!}
		       				{{ csrf_field() }}
			       				<a class="btn btn-primary btn-sm" data-toggle="modal" href="#editModal{{$laboratorio->id}}" style="width: 40%;">
	                        		<i class="fa fa-pencil"></i>
	                      		</a>
					        	<a class="btn btn-danger btn-sm ml-2" title="Eliminar laboratorio" onclick="eliminar({{$laboratorio->id}})"><i class="fe fe-trash-2"></i></a>
					        {{ Form::close() }}
		                </td>
		                <!--Modal edit laboratorio -->
						<div class="modal fade" id="editModal{{$laboratorio->id}}" tabindex="-1" role="dialog">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Editar laboratorio</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      {!! Form::open(['route' => ['Auth.usuario.updateLaboratorio', $laboratorio], 'method' => 'GET','enctype' => 'multipart/form-data']) !!}
			       				{{ csrf_field() }}
						      	<div class="modal-body">
						      		<div class="row">
							        	<div class="col-md-3">
								          	<input id="nombreLaboratorio{{$laboratorio->id}}" name="nombreLaboratorio{{$laboratorio->id}}" type="text" class="form-control" placeholder="Nombre laboratorio" required="true" value="{{$laboratorio->nombreLaboratorio}}">
							        	</div>
							        	<div class="col-md-3">
							        		@foreach($historiasClinicas as $historia)
						                		@if($laboratorio->idHistoriaClinica == $historia->id)
						                			<input  type="text" class="form-control" value="{{$historia->documento}}" disabled="true">
						                		@endif
						                	@endforeach
							        	</div>
							        	<div class="col-md-3">
							        		@foreach($historiasClinicas as $historia)
						                		@if($laboratorio->idHistoriaClinica == $historia->id)
						                			<input id="nombrePaciente{{$laboratorio->id}}" name="nombrePaciente{{$laboratorio->id}}" type="text" class="form-control" placeholder="Nombre paciente" value="{{$laboratorio->nombrePaciente}}" disabled="true">
						                		@endif
						                	@endforeach
							        	</div>
							        	<div class="col-md-3">
									        <input id="referencia{{$laboratorio->id}}" name="referencia{{$laboratorio->id}}" type="text" class="form-control" placeholder="Referencia" required="true" value="{{$laboratorio->referencia}}">
							        	</div>
						        	</div>
						        	<div class="row">
							        	<div class="col-md-4">
									        <input id="valor{{$laboratorio->id}}" name="valor{{$laboratorio->id}}" type="number" class="form-control" placeholder="Valor" required="true" value="{{$laboratorio->valor}}">
							        	</div>
							        	<div class="col-md-4">
									        <input id="fechaEnvio{{$laboratorio->id}}" name="fechaEnvio{{$laboratorio->id}}" type="text" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="fecha envío AA/MM/DD" required="true" value="{{$laboratorio->fechaEnvio}}" />
							        	</div>
							        	<div class="col-md-4">
									        <input id="fechaEntrega{{$laboratorio->id}}" name="fechaEntrega{{$laboratorio->id}}" type="text" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="fechaEntrega AA/MM/DD" required="true" value="{{$laboratorio->fechaEntrega}}" />
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
						<!--Fin modal edit laboratorio-->
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
		if(confirm('¿Desea eliminar este laboratorio? Se perderán todos los datos.')){
			var form = document.getElementById("form"+id);
			form.submit();
		}
	}

	$(document).ready(function() {
	    $('#example').DataTable( {
	        dom: 'lBfrtip',
	        buttons: [
	            {
	                extend:    'excelHtml5',
	                text:      '<i class="fa fa-file-excel-o"></i>',
	                titleAttr: 'Descarga Excel'
	            },
	            {
	                extend:    'pdfHtml5',
	                text:      '<i class="fa fa-file-pdf-o"></i>',
	                titleAttr: 'Descarga PDF'
	            }
	        ]
    	} );
	} );
</script>

<script type="text/javascript">
	require(['input-mask']);

	$('#cedulaPaciente').on('change', function (event) {
    	var id = $(this).find('option:selected').val();
      	JSONHistorias = eval(<?php echo json_encode($historiasClinicas);?>);
      	JSONHistorias.forEach(function(currentValue,index,arr) {
        	if(currentValue.id == id){
        		var nombre = document.getElementById("nombrePaciente");
        		nombre.value = currentValue.nombreCompleto;
        	}
    	});
  	});

</script>
	<!-- end DataTables Example -->

@endsection