@extends(Auth::User()->esEmpleado ? 'Layouts.app_empleados' : 'Layouts.app_recepcionista')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<div>
	<button id="btn-add" class="btn btn-pill btn-primary" data-toggle="modal" href="#addModal" title="Agregar historia clinica">
		<i class="fa fa-plus" style="margin-right: 0px;"></i><span style="font-weight: 500"> Añadir Historia</span>
	</button>
</div>
<br>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar historia clinica</h5>
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
						<option value="tarjeta">Targeta de identidad</option>
						<option value="cedula">Cédula de ciudadanía</option>
						<option value="cedula">Registro civil</option>
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
		                <th width="25%">Nombre</th>
		                <th width="20%">Documento</th>
		                <th width="15%">Sexo</th>
		                <th width="10%">Edad</th>
		                <th width="10%">Creación</th>
		                <th width="15%">Opciones</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($historiasClinicas as $historiaClinica)
		        	@if(!$historiaClinica->eliminada)
		            <tr>
		                <td>{{$historiaClinica->nombreCompleto}}</td>
		                <td>{{$historiaClinica->documento}}</td>
		                <td>{{$historiaClinica->sexo}}</td>
		                <td>{{$historiaClinica->edad}}</td>
		                <td>
		                	<?php 
                  				$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
								$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
									$date = new DateTime($historiaClinica->created_at);
									echo ($dias[date_format($date, 'w')]." ".date_format($date, 'd')." de ".$meses[date_format($date, 'n')-1]. " del ".date_format($date, 'Y'));  
							?>
		                </td>
		                <td>
		                	{!! Form::open(['route' => ['historia.postdeleteHistoriaClinica', $historiaClinica], 'method' => 'GET','enctype' => 'multipart/form-data', 'id' => "form$historiaClinica->id"]) !!}
		       				{{ csrf_field() }}
			       				<a class="btn btn-primary btn-sm ml-2" title="Observaciones" href="{{route('historia.observacion', $historiaClinica->id)}}">
			                			<i class="fe fe-eye"></i>
		                		</a>
		                		<a class="btn btn-primary btn-sm ml-2" title="Editar historia" href="{{route('historia.edit', $historiaClinica->id)}}">
		                			<i class="fe fe-edit-2"></i>
		                		</a>
		                		<a class="btn btn-danger btn-sm ml-2" title="Eliminar historia" onclick="eliminar({{$historiaClinica->id}})"><i class="fe fe-trash-2"></i></a>
					        {{ Form::close() }}
		                </td>
		            </tr>
		            @endif
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
		if(confirm('¿Desea eliminar esta historia? Se perderán todos los datos, incluyendo servicios y laboratorios asociados a esta historia clinica.')){
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
    	});
	} );

</script>

@endsection
