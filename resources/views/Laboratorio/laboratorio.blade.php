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
			        <select class="form-control custom-select" id="cedulaPaciente"  name="cedulaPaciente" required>
                        <option value="">Cédula paciente</option>
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
			        <input id="fechaEntrega" name="fechaEntrega" type="text" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="fecgaEntrega AA/MM/DD" required="true" />
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