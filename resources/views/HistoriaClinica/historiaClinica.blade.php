@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')

<div>
	<button id="btn-add" class="btn btn-pill btn-primary" data-toggle="modal" href="#addModal" title="Agregar historia clinica">
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
      {!! Form::open(['action' => ['HistoriaClinicaController@createHistoriaClinica'], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
    {{ csrf_field() }}
      	<div class="modal-body">
        	<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" placeholder="Nombre completo">
					</div>
				</div>
				<div class="col-md-6">
					<select class="form-control" id="sexo" name="sexo">
						<option value="" selected="">Sexo</option>
						<option value="masculino">Masculino</option>
						<option value="femenino">Femenino</option>
					</select> 
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<select class="form-control" id="tipoDocumento" name="tipoDocumento">
						<option value="" selected="">Tipo documento</option>
						<option value="tarjeta">T.I</option>
						<option value="cedula">C.C</option>
					</select> 
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<input class="form-control" type="text" name="documento" id="documento" placeholder="Documento">
					</div>
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
		                <th width="30%">Nombre</th>
		                <th width="20%">Documento</th>
		                <th width="20%">Sexo</th>
		                <th width="20%">Edad</th>
		                <th width="10%">Opciones</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($historiasClinicas as $historiaClinica)
		            <tr>
		                <td>{{$historiaClinica->nombreCompleto}}</td>
		                <td>{{$historiaClinica->documento}}</td>
		                <td>{{$historiaClinica->sexo}}</td>
		                <td>{{$historiaClinica->edad}}</td>
		                <td>
		                	{!! Form::open(['route' => ['historia.postdeleteHistoriaClinica', $historiaClinica], 'method' => 'GET','enctype' => 'multipart/form-data']) !!}
		       				{{ csrf_field() }}
		                		<a class="btn btn-primary btn-sm ml-2" title="Editar historia clinica" href="{{route('historia.edit', $historiaClinica->id)}}">
		                			<i class="fe fe-edit-2"></i>
		                		</a>
		                		<button class="btn btn-danger btn-sm ml-2" title="Eliminar personal"><i class="fe fe-trash-2"></i></button>
					        {{ Form::close() }}
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

@endsection