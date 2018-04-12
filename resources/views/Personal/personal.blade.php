@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<button id="btn-add" class="btn btn-pill btn-primary" data-toggle="modal" href="#addModal" title="Agregar personal">
	<span class="fe fe-plus"></span>
</button>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar personal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	{!! Form::open(['action' => ['PersonalController@postmodificarPersonal'], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
            {{ csrf_field() }}
        	<div class="row">
	        	<div class="col-md-6">
		          	<input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre completo" >
	        	</div>
	        	<div class="col-md-6">
			        <input id="email" name="email" type="email" class="form-control" placeholder="Correo" >
	        	</div>
        	</div>
        	<div class="row">
        		<div class="col-md-6">
			        <input id="cedula" name="cedula" type="text" class="form-control" placeholder="Cedula">
        		</div>
        		<div class="col-md-6">
			        <input id="telefono" name="telefono" type="text" class="form-control" placeholder="(+57) 000 - 0000 - 000">
        		</div>
        	</div>
	        <div class="row">
	        	<div class="col-md-6">
	        		<input id="direccion" name="direccion" type="text" class="form-control" placeholder="Dirección">
	        	</div>
	        	<div class="col-md-6">
	        		<input id="salario" name="salario" type="number" class="form-control" placeholder="Salario">
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-3">
	        		<input id="fechaNacimiento" name="fechaNacimiento" type="text" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="0000-00-00" />
	        	</div>
	        	<div class="col-md-3">
	        		<select id="sexo" name='sexo' class="form-control" placeholder="">
	                  	<option value="" selected="selected">Seleccionar sexo</option>
	                    <option value="masculino">Masculino</option>
	                    <option value="femenino">Femenino</option>
                </select>
	        	</div>
	        	<div class="col-md-3">
	        		<select class="form-control" id="idDepto"  name="idDepto" required>
					<option value="">Departamento</option>
					@foreach($departamentos as $departamento)
	                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
		            @endforeach
					</select>
	        	</div>
	        	<div class="col-md-3">
	        		<select class="form-control" id="idCiudad" name="idCiudad" required>
						<option value="">Ciudad</option>
					</select>
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



<script type="text/javascript">
	$('#addModal').on('shown.bs.modal', function () {
	  $('#btn-add').trigger('focus')
	})
</script>

<!-- Para fecha de nacimiento, departamento y ciudad -->
<script>
	require(['input-mask']);

	$('#idDepto').on('change', function (event) {
	      var id = $(this).find('option:selected').val();
	      $('#idCiudad').empty();
	      $('#idCiudad').append($('<option>', {
	            value: 0,
	            text: 'Elija una opción'
	        }));
	      JSONCiudades = eval(<?php echo json_encode($ciudades);?>);
	      JSONCiudades.forEach(function(currentValue,index,arr) {
	        if(currentValue.idDepartamento == id){
	          $('#idCiudad').append($('<option>', {
	            value: currentValue.id,
	            text: currentValue.nombre
	        }));
	        }
	    }); 
	  });
</script>

@endsection