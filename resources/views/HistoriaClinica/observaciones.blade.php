@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<div>
	<button id="btn-add" class="btn btn-pill btn-primary" data-toggle="modal" href="#addModal" title="Agregar observacion">
		<span class="fe fe-plus"></span>
	</button>
</div>
<br>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar personal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action' => ['HistoriaClinicaController@postcreateObservacion', $historia], 'method' => 'GET','enctype' => 'multipart/form-data']) !!}
    {{ csrf_field() }}
      	<div class="modal-body">
        	<div class="row">
				<div class="col-md-4">
	        		<input id="fecha" name="fecha" type="date" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="año-mes-día" required="true" />
	        	</div>
				<div class="col-md-4">
			        <input id="diente" name="diente" type="text" class="form-control" placeholder="Diente" required="true">
	        	</div>
	        	<div class="col-md-4">
			        <input id="actividad" name="actividad" type="text" class="form-control" placeholder="Actividad" required="true">
	        	</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<textarea id="descripcion" name="descripcion" rows="3" class="form-control" placeholder="Descripción del procedimiento"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
	        		<input id="codigoCUPS" name="codigoCUPS" type="text" class="form-control"  placeholder="Código CUPS" required="true" />
	        	</div>
				<div class="col-md-6">
			        <input id="valorCopago" name="valorCopago" type="text" class="form-control" placeholder="Valor C.M Copago" required="true">
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
		                <th width="10%">Diente</th>
		                <th width="10%">Actividad</th>
		                <th width="25%">Descripción del procedimiento</th>
		                <th width="15%">Codigo CUPS</th>
		                <th width="20%">Valor C.M Copago</th>
		                <th width="5%">Opciones</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($observaciones as $observacion)
		            <tr>
		                <td>{{$observacion->fecha}}</td>
		                <td>{{$observacion->diente}}</td>
		                <td>{{$observacion->actividad}}</td>
		                <td>{{$observacion->descripcion}}</td>
		                <td>{{$observacion->codigoCUPS}}</td>
		                <td>{{$observacion->valorCopago}}</td>
		                <td>
		                	{!! Form::open(['route' => ['historia.postdeleteObservacion', $observacion], 'method' => 'GET','enctype' => 'multipart/form-data', 'id' => "form$observacion->id"]) !!}
		       				{{ csrf_field() }}
		                		<a class="btn btn-primary btn-sm" data-toggle="modal" href="#editModal{{$observacion->id}}" style="width: 40%;">
	                        		<i class="fa fa-pencil"></i>
	                      		</a>
		                		<a class="btn btn-danger btn-sm ml-2" title="Eliminar observación" onclick="eliminar({{$observacion->id}})"><i class="fe fe-trash-2"></i></a>
					        {{ Form::close() }}
		                </td>
		                <!--Modal edit procedimiento -->
						<div class="modal fade" id="editModal{{$observacion->id}}" tabindex="-1" role="dialog">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Editar observación</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      {!! Form::open(['route' => ['historia.editObservacion', $observacion], 'method' => 'GET','enctype' => 'multipart/form-data']) !!}
			       				{{ csrf_field() }}
						      	<div class="modal-body">
						      		<div class="row">
										<div class="col-md-4">
							        		<input id="fecha{{$observacion->id}}" name="fecha{{$observacion->id}}" type="date" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="año-mes-día" required="true" value="{{$observacion->fecha}}" />
							        	</div>
										<div class="col-md-4">
									        <input id="diente{{$observacion->id}}" name="diente{{$observacion->id}}" type="text" class="form-control" placeholder="Diente" required="true" value="{{$observacion->diente}}">
							        	</div>
							        	<div class="col-md-4">
									        <input id="actividad{{$observacion->id}}" name="actividad{{$observacion->id}}" type="text" class="form-control" placeholder="Actividad" required="true" value="{{$observacion->actividad}}">
							        	</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<textarea id="descripcion{{$observacion->id}}" name="descripcion{{$observacion->id}}" rows="3" class="form-control" placeholder="Descripción del procedimiento">{{$observacion->descripcion}}</textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
							        		<input id="codigoCUPS{{$observacion->id}}" name="codigoCUPS{{$observacion->id}}" type="text" class="form-control"  placeholder="Código CUPS" required="true" value="{{$observacion->codigoCUPS}}" />
							        	</div>
										<div class="col-md-6">
									        <input id="valorCopago{{$observacion->id}}" name="valorCopago{{$observacion->id}}" type="text" class="form-control" placeholder="Valor C.M Copago" required="true" value="{{$observacion->valorCopago}}">
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
		if(confirm('¿Desea eliminar esta observación? Se perderán todos los datos.')){
			var form = document.getElementById("form"+id);
			form.submit();
		}
	}

	$(document).ready(function() {
	    $('#example').DataTable();
	} );
	require(['input-mask']);
</script>

@endsection
