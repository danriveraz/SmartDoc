@extends('Layouts.app_empleados')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
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
		                <th width="12%">Fecha</th>
		                <th width="5%">Estado</th>
		                <th width="3%">Opciones</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($agendas as $agenda)
		            <tr>
		            	<td>{{$agenda->hora}}</td>
		                <td>{{$agenda->titulo}}</td>
		                <td>
	                		@if($agenda->idUsuario == $user->id)
	                			{{$user->nombreCompleto}}
	                		@endif
		                </td>
		                <td>{{$agenda->nombrePaciente}}</td>
		                <td>{{$agenda->cedulaPaciente}}</td>
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
		                	{!! Form::open(['action' => ['HistoriaClinicaController@createHistoriaClinica'], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
    							{{ csrf_field() }}
    							<input type="text" name="documento" id="documento" value="{{$agenda->cedulaPaciente}}" hidden="true">
    							<input type="text" name="nombreCompleto" id="nombreCompleto" value="{{$agenda->nombrePaciente}}" hidden="true">
		                		<button class="btn btn-primary btn-sm ml-8" title="Crear historia clinica"><i class="fe fe-save"></i></button>
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

	require(['input-mask']);
</script>
<!-- end DataTables Example -->
@endsection