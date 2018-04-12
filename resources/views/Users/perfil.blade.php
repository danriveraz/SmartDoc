@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<form class="card" enctype="multipart/form-data" method="POST" route="Auth.usuario.editPerfil">
  {{ csrf_field() }}
  <div class="card-body">
    <h3 class="card-title"></h3>
  <br>
    <div class="row">
     <div class="col-md-12">
     	<div class="col-md-12" style="text-align: center;">
    	<div class="widget-content fileupload fileupload-new" data-provides="fileupload" >
	        <div class="gallery-container fileupload-new img-thumbnail">
	          <div class="gallery-item filter1" rel="" style="border-radius: 50%; width: 150px; height: 150px;">
	            @if($user->imagen != '')
	              {!! Html::image('images/admin/'.$user->imagen,  'imagen de perfil', array('class' => 'img-responsive img-circle user-photo', 'id' => 'imagenCircular')) !!}
	              <!-- clase circular -> , array('class' => 'img-responsive img-circle user-photo') -->
	            @else
	              <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image">
	            @endif
	            <div class="actions">
	              <a  id="modalImagen" href="{{ asset ('images/admin/'.$user->imagen) }}" title="Imagen">
	                <img src="images/admin/{{$user->imagen}}" hidden>
	                <i class="fa fa-search-plus"></i>
	              </a>
	              <a onclick="$('#imagenPerfil').click()">
	                <i class="fa fa-pencil"></i>
	              </a>
	            </div>
	          </div>
	        </div>
	        <div class="gallery-item fileupload-preview fileupload-exists img-thumbnail" style="border-radius: 50%; width: 150px; height: 150px; background: #ffffff;">
	          
	        </div>
	        <div hidden>
	          <span class=" btn-file" id="subirImagenNegocio">
	            <span class="fileupload-new"><i class="fa fa-pencil"></i></span>
	            <span class="fileupload-exists"><i class="fa fa-search-plus"></i></span>
	            <input type="file" class="form-control" name="imagen"  id="imagenPerfil">
	          </span>
	        </div>
      </div>
  </div>
     </div>
      <div class="col-md-5">
        <div class="form-group">
          <label class="form-label">Nombre completo</label>
          <input id="nombre" name="nombre" type="text" class="form-control" placeholder="" value="{{$user->nombreCompleto}}">
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="form-group">
          <label class="form-label">Cedula</label>
          <input id="cedula" name="cedula" type="text" class="form-control" placeholder="" value="{{$user->cedula}}">
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="form-group">
          <label class="form-label">Teléfono</label>
          <input id="telefono" name="telefono" type="text" class="form-control" placeholder="(+57) 000 - 0000 - 000" value="{{$user->telefono}}">
        </div>
      </div>
      <div class="col-sm-3 col-md-3">
        <div class="form-group">
          <label class="form-label">Dirección</label>
          <input id="direccion" name="direccion" type="text" class="form-control" placeholder="" value="{{$user->direccion}}">
        </div>
      </div>
      <div class="col-sm-3 col-md-3">
        <div class="form-group">
          <label class="form-label">Salario</label>
          <input id="salario" name="salario" type="number" class="form-control" placeholder="" value="{{$user->salario}}">
        </div>
      </div>
      <div class="col-sm-6 col-md-6">
		<div class="form-group">
	       <label class="form-label">Fecha de nacimiento</label>
	       <input id="fechaNacimiento" name="fechaNacimiento" type="text" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="0000-00-00" value="{{$user->fechaNacimiento}}" />
	    </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Sexo</label>
            <div class="input-group">
                <select id="sexo" name='sexo' class="form-control" placeholder="Tipo De Sexo">
                  @if($user->sexo=='')
                  	<option value="" selected="selected">Seleccionar</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                  @elseif($user->sexo=='femenino')
                    <option value="masculino">Masculino</option>
                    <option value="femenino" selected="selected">Femenino</option>
                  @else
                    <option value="masculino" selected="selected">Masculino</option>
                    <option value="femenino" >Femenino</option>
                  @endif
                </select>
            </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="form-group">
          <label>Departamento</label>
	        <select class="form-control" id="idDepto"  name="idDepto" required>
				<option value="">Elija una opción</option>
				      @foreach($departamentos as $departamento)
                  @if($user->departamento == $departamento->id)
	              	  <option value="{{$departamento->id}}" selected="selected">{{$departamento->nombre}}</option>
                  @else
                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                  @endif
	            @endforeach
			</select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Ciudad</label>
            <select class="form-control" id="idCiudad" name="idCiudad" required>
				    <option value="">Elija una opción</option>
              @foreach($ciudades as $ciudad)
                  @if($user->departamento == $ciudad->idDepartamento)
                    @if($user->ciudad == $ciudad->id)
                      <option value="{{$ciudad->id}}" selected="selected">{{$ciudad->nombre}}</option>
                    @else
                      <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                    @endif
                  @endif
              @endforeach
			</select>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group mb-0">
          <label class="form-label">Descripción general</label>
          <textarea id="descripcion" name="descripcion" rows="5" class="form-control" placeholder="" value="">{{$user->descripcionGeneral}}</textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer text-center">
    <button type="submit" class="btn btn-primary">Guardar perfil</button>
  </div>
</form>

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

<!-- Para la imagen de perfil -->

<script type="text/javascript">

	$(document).ready(function(){
		$("#modalImagen").fancybox({
            helpers: {
                title : {
                    type : 'float'
                }
            }
        });
	});

	$(function() {
  	// We can attach the `fileselect` event to all file inputs on the page
	  $(document).on('change', ':file', function() {
	    var input = $(this),
	        numFiles = input.get(0).files ? input.get(0).files.length : 1,
	        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	    input.trigger('fileselect', [numFiles, label]);
	  });

	  // We can watch for our custom `fileselect` event like this
	  $(document).ready( function() {
	      $(':file').on('fileselect', function(event, numFiles, label) {

	          var input = $(this).parents('.input-group').find(':text'),
	              log = numFiles > 1 ? numFiles + ' files selected' : label;

	          if( input.length ) {
	              input.val(log);
	          } else {
	          	
	          }

	      });
	  });
	});
</script>

<style type="text/css">
  #imagenCircular{
  	border-radius: 50%;
    width: 150px;
    height: 150px;
  }
</style>

@endsection