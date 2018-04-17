@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<div>
	<button id="btn-add" class="btn btn-pill btn-primary" data-toggle="modal" href="#addModal" title="Agregar procedimiento">
		<span class="fe fe-plus"></span>
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
	        	<div class="col-md-4">
		          	<input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" required="true">
	        	</div>
	        	<div class="col-md-4">
			        <input id="costo" name="costo" type="number" class="form-control" placeholder="Costo" required="true">
	        	</div>
	        	<div class="col-md-4">
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
		                <th width="20%">Costo</th>
		                <th width="10%">Duración</th>
		                <th width="40%">Descripción</th>
		                <th width="10%">Opciones</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($procedimientos as $procedimiento)
		            <tr>
		                <td>{{$procedimiento->nombre}}</td>
		                <td>{{$procedimiento->costo}}</td>
		                <td>{{$procedimiento->duracion}}</td>
		                <td>{{$procedimiento->descripcion}}</td>
		                <td>
		                	<a class="table-actions" href="" style="color: #111;">
                        		<i class="fa fa-pencil" title="Editar"></i>
                      		</a>
	                      	<a class="table-actions" href="" onclick="" style="color: #111;">
	                        	<i class="fe fe-trash" title="Eliminar"></i>
	                      	</a>
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
    	$(document).ready(function() {
		    $('#example').DataTable();
		} );
    </script>
	<!-- end DataTables Example -->

@endsection