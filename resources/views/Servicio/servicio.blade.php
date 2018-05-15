@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')

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
		                <th width="15%">Fecha</th>
		                <th width="20%">Procedimiento</th>
		                <th width="25%">Nombre</th>
		                <th width="20%">Documento</th>
		                <th width="15%">Valor</th>
		                <th width="5%">Opciones</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($servicios as $servicio)
		            <tr>
		                <td>{{$servicio->fecha}}</td>
		                <td>
		                	@foreach($procedimientos as $procedimiento)
		                		@if($servicio->idProcedimiento == $procedimiento->id)
		                			{{$procedimiento->nombre}}
		                		@endif
		                	@endforeach
		                </td>
		                <td>
		                	@foreach($historiasClinicas as $historia)
		                		@if($servicio->idHistoriaClinica == $historia->id)
		                			{{$historia->nombreCompleto}}
		                		@endif
		                	@endforeach
		                </td>
		                <td>
		                	@foreach($historiasClinicas as $historia)
		                		@if($servicio->idHistoriaClinica == $historia->id)
		                			{{$historia->documento}}
		                		@endif
		                	@endforeach
		                </td>
		                <td>
		                	@foreach($procedimientos as $procedimiento)
		                		@if($servicio->idProcedimiento == $procedimiento->id)
		                			{{$procedimiento->venta}}
		                		@endif
		                	@endforeach
		                </td>
		                <td>
	                      	{!! Form::open(['route' => ['Auth.usuario.deleteServicio', $servicio], 'method' => 'GET','enctype' => 'multipart/form-data', 'id' => "form$servicio->id"]) !!}
		       				{{ csrf_field() }}
					        	<a class="btn btn-danger btn-sm ml-2" title="Eliminar servicio" onclick="eliminar({{$servicio->id}})"><i class="fe fe-trash-2"></i></a>
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

	function eliminar(id){
		if(confirm('¿Desea eliminar este servicio? Se perderán todos los datos y se restará este servicio de Cuentas.')){
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