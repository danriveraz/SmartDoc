@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<div>
	<button id="btn-add" class="btn btn-pill btn-primary" data-toggle="modal" href="#addModal" title="Agregar procedimiento">
		<span class="fa fa-plus" style="margin-right: 0px;"></span>
	</button>	
</div>
<br>

<!--Espacio modal add procedimiento-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar procedimiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action' => ['ProcedimientoController@postmodificarProcedimiento'], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
       	{{ csrf_field() }}
      	<div class="modal-body">
        	<div class="row">
	        	<div class="col-md-3">
		          	<input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" required="true">
	        	</div>
	        	<div class="col-md-3">
			        <input id="costo" name="costo" type="number" class="form-control" placeholder="Valor costo" required="true">
	        	</div>
	        	<div class="col-md-3">
			        <input id="venta" name="venta" type="number" class="form-control" placeholder="Valor venta" required="true">
	        	</div>
	        	<div class="col-md-3">
			        <input id="duracion" name="duracion" type="text" class="form-control" placeholder="Duración" required="true">
	        	</div>
        	</div>
        	<div class="row">
	        	<div class="col-md-12">
	        		<textarea id="descripcion" name="descripcion" rows="5" class="form-control" placeholder="Descripción general"></textarea>
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
		                <th width="20%">Nombre</th>
		                <th width="10%">Costo</th>
		                <th width="10%">Venta</th>
		                <th width="10%">Utilidad</th>
		                <th width="10%">Duración</th>
		                <th width="30%">Descripción</th>
		                <th width="10%">Opciones</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($procedimientos as $procedimiento)
		            <tr>
		                <td>{{$procedimiento->nombre}}</td>
		                <td>{{$procedimiento->costo}}</td>
		                <td>{{$procedimiento->venta}}</td>
		                <td>{{$procedimiento->ganancia}}</td>
		                <td>{{$procedimiento->duracion}}</td>
		                <td>{{$procedimiento->descripcion}}</td>
		                <td>
	                      	{!! Form::open(['route' => ['Auth.usuario.deleteProcedimiento', $procedimiento], 'method' => 'GET','enctype' => 'multipart/form-data', 'id' => "form$procedimiento->id"]) !!}
		       				{{ csrf_field() }}
			       				<a class="btn btn-primary btn-sm" data-toggle="modal" href="#editModal{{$procedimiento->id}}" style="width: 40%;">
	                        		<i class="fa fa-pencil"></i>
	                      		</a>
					        	<a class="btn btn-danger btn-sm ml-2" title="Eliminar procedimiento" onclick="eliminar({{$procedimiento->id}})"><i class="fe fe-trash-2"></i></a>
					        {{ Form::close() }}
		                </td>
		                <!--Modal edit procedimiento -->
						<div class="modal fade" id="editModal{{$procedimiento->id}}" tabindex="-1" role="dialog">
						  <div class="modal-dialog modal-lg" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Editar procedimiento</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      {!! Form::open(['route' => ['Auth.usuario.updateProcedimiento', $procedimiento], 'method' => 'GET','enctype' => 'multipart/form-data']) !!}
			       				{{ csrf_field() }}
						      	<div class="modal-body">
						      		<div class="row">
							        	<div class="col-md-3">
								          	<input id="nombre{{$procedimiento->id}}" name="nombre{{$procedimiento->id}}" type="text" class="form-control" placeholder="Nombre" required="true" value="{{$procedimiento->nombre}}">
							        	</div>
							        	<div class="col-md-3">
									        <input id="costo{{$procedimiento->id}}" name="costo{{$procedimiento->id}}" type="numbre" class="form-control" placeholder="Costo" required="true" value="{{$procedimiento->costo}}">
							        	</div>
							        	<div class="col-md-3">
									        <input id="venta{{$procedimiento->id}}" name="venta{{$procedimiento->id}}" type="number" class="form-control" placeholder="Valor venta" required="true" value="{{$procedimiento->venta}}">
							        	</div>
							        	<div class="col-md-3">
									        <input id="duracion{{$procedimiento->id}}" name="duracion{{$procedimiento->id}}" type="text" class="form-control" placeholder="Duración" required="true" value="{{$procedimiento->duracion}}">
							        	</div>
						        	</div>
						        	<div class="row">
							        	<div class="col-md-12">
							        		<textarea id="descripcion{{$procedimiento->id}}" name="descripcion{{$procedimiento->id}}" rows="5" class="form-control" placeholder="Descripción general">{{$procedimiento->descripcion}}</textarea>
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
		if(confirm('¿Desea eliminar este procedimiento? Se perderán todos los datos, incluyendo los servicios asociados a este procedimiento.')){
			var form = document.getElementById("form"+id);
			form.submit();
		}
	}

	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>
<!-- end DataTables Example -->

@endsection