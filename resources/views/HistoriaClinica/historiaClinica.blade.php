@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')

{!! Form::open(['action' => ['HistoriaClinicaController@createHistoriaClinica'], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
    {{ csrf_field() }}
	<div>
		<button type="submit" class="btn btn-pill btn-primary" title="Agregar historia clinica">
			<span class="fe fe-plus"></span>
		</button>	
	</div>
	<br>
{{ Form::close() }}

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
		                		<button class="btn btn-primary btn-sm ml-2" title="Editar historia clinica"><i class="fe fe-trash-2"></i></button>
					        	<button class="btn btn-danger btn-sm ml-2" title="Eliminar historia clinica"><i class="fe fe-trash-2"></i></button>
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