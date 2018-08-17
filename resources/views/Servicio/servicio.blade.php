@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<!-- DataTables Example -->
<a class="btn btn-pill btn-primary" href="{{url('/Cuentas')}}" title="Cuentas">
	<span class="fa fa-money" style="margin-right: 0px;font-size: 20px;margin-top:5px;"></span>
</a>
</div>
<br>
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
		                <td>{{$servicio->procedimiento->nombre}}</td>
		                <td>{{$servicio->historiaClinica->nombreCompleto}}</td>
		                <td>{{$servicio->historiaClinica->documento}}</td>
		                <td>{{$servicio->costoTratamiento}}</td>
		                <td>
		                	<div class="row" style="align-items: center;">
		                		<div class="col-md-4" style="padding: 0px;">	
		                			{!! Form::open(['route' => ['factura'], 'method' => 'post','enctype' => 'multipart/form-data', 'id' => "form$servicio->id"]) !!}
			       						{{ csrf_field() }}	       	
			       						<input type="text" name="id" hidden="" value="{{$servicio->id}}">
			       						@if($servicio->estado == "Pendiente")
							        	<button class="btn btn-primary btn-sm ml-2" title="Ver factura" href="{{ url('Factura') }}"><i class="fa fa-dollar" style="margin: 0;"></i></button>
							        	@else
							        	<button class="btn btn-success btn-sm ml-2" title="Factura completamente paga" href="{{ url('Factura') }}"><i class="fa fa-dollar" style="margin: 0;"></i></button>
							        	@endif
							        	
						        	{{ Form::close() }}
			                	</div>	 
		                		<div class="col-md-4" style="padding: 0px;">	
		                			{!! Form::open(['route' => ['servicio.abonos'], 'method' => 'post','enctype' => 'multipart/form-data', 'id' => "form2$servicio->id"]) !!}
			       						{{ csrf_field() }}	 	       	
			       						<input type="text" name="id" hidden="" value="{{$servicio->id}}">
			       						@if($servicio->estado == "Pendiente")
							        	<button class="btn btn-primary btn-sm ml-2" title="Abonar"><i class="fa fa-dollar" style="margin: 0;"></i></button>
							        	@else
							        	<button class="btn btn-success btn-sm ml-2" title="Factura completamente paga"><i class="fa fa-dollar" style="margin: 0;"></i></button>
							        	@endif
							        {{ Form::close() }}
			                	</div>	   
			                	<div class="col-md-4" style="padding: 0px;">
			                		{!! Form::open(['route' => ['Auth.usuario.deleteServicio', $servicio], 'method' => 'GET','enctype' => 'multipart/form-data', 'id' => "form$servicio->id"]) !!}
			       				{{ csrf_field() }}
						        	<a class="btn btn-danger btn-sm ml-2" title="Eliminar servicio" onclick="eliminar({{$servicio->id}})"><i class="fe fe-trash-2"></i></a>
						        {{ Form::close() }}
						    	</div>					    	     
		                	</div>         
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
</script>
	<!-- end DataTables Example -->

@endsection
