@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<div>
	<button id="btn-add" class="btn btn-pill btn-primary" data-toggle="modal" href="#addModal" title="Agregar personal">
		<span class="fa fa-plus" style="margin-right: 0px;"></span>
	</button>	
</div>
<br>

<!--Espacio modal add Personal-->

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar personal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['action' => ['PersonalController@postmodificarPersonal'], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}
       	{{ csrf_field() }}
      	<div class="modal-body">
      		<div class="row">
      			<div class="col-md-12" style="text-align: center;">
                    <div class="widget-content fileupload fileupload-new" data-provides="fileupload" >
                        <div class="gallery-container fileupload-new img-thumbnail">
							<div id="imgActual" class="gallery-item filter1" rel="" style="border-radius: 50%; width: 150px; height: 150px;">
	                            <img src="{{asset('images/admin/perfil.jpg')}}" id="imagenCircular">
                          		<div class="actions">
                                	<a  id="modalImagen" href="{{asset ('images/admin/perfil.jpg') }}" title="Imagen">
                              	 		<img src="images/admin/perfil.jpg" hidden>
                              	 		<i class="fa fa-search-plus"></i>
                              		</a>
                              		<a onclick="$('#imagenPerfil').click()">
                              	  		<i class="fa fa-pencil"></i>
                              		</a>
                              	</div>
                            </div>
                        </div>
                        <div class="gallery-item fileupload-preview fileupload-exists img-thumbnail" style="border-radius: 50%; width: 150px; height: 150px; background: #ffffff; overflow: hidden;">
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
        	<div class="row">
	        	<div class="col-md-6">
		          	<input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre completo" required="true">
	        	</div>
	        	<div class="col-md-6">
			        <input id="email" name="email" type="email" class="form-control" placeholder="Correo" required="true">
	        	</div>
        	</div>
        	<div class="row">
        		<div class="col-md-4">
			        <input id="cedula" name="cedula" type="text" class="form-control" placeholder="Cedula" required="true">
        		</div>
        		<div class="col-md-4">
			        <input id="telefono" name="telefono" type="text" class="form-control" placeholder="(+57) 000 - 0000 - 000">
        		</div>
        		<div class="col-md-4">
			        <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña" required="true">
        		</div>
        	</div>
	        <div class="row">
	        	<div class="col-md-6">
	        		<input id="direccion" name="direccion" type="text" class="form-control" placeholder="Dirección">
	        	</div>
	        	<div class="col-md-6">
	        		<input id="fechaNacimiento" name="fechaNacimiento" type="date" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="Fecha de nacimiento AAAA/MM/DD" required="true" />
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
	        		<select id="sexo" name='sexo' class="form-control" placeholder="">
	                  	<option value="" selected="selected">Seleccionar sexo</option>
	                    <option value="masculino">Masculino</option>
	                    <option value="femenino">Femenino</option>
                </select>
	        	</div>
	        	<div class="col-md-4">
	        		<select class="form-control" id="idDepto"  name="idDepto" required>
					<option value="">Departamento</option>
					@foreach($departamentos as $departamento)
	                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
		            @endforeach
					</select>
	        	</div>
	        	<div class="col-md-4">
	        		<select class="form-control" id="idCiudad" name="idCiudad" required>
						<option value="">Ciudad</option>
					</select>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-12">
	        		<textarea id="especialidad" name="especialidad" rows="3" class="form-control" placeholder="Especialidad de la persona" required="true"></textarea>
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

<!-- Espacio para mi personal -->
<section class="cd-gallery desplegado" style="background: rgb(245,247,251);">
	<ul>
		@foreach($personales as $personal)
			<li class="card" style="width: 30%; display: inline-block;">
			  <div class="card-header">
			    <h3 class="card-title">{{$personal->nombreCompleto}}</h3>
			    <div class="card-options">
			        <button id="{{$personal->id}}" class="btn btn-primary btn-sm" data-toggle="modal" 
			        	href="#editModal{{$personal->id}}" title="Agregar personal"><span class="fe fe-edit-2"></span></button>
			        @if(!$personal->esAdmin)
				        {!! Form::open(['route' => ['Auth.usuario.deleteProfile', $personal], 'method' => 'GET','enctype' => 'multipart/form-data', 'id' => "form$personal->id"]) !!}
	       				{{ csrf_field() }}
				        	<a class="btn btn-danger btn-sm ml-2" title="Eliminar personal" onclick="eliminar({{$personal->id}})"><span class="fe fe-trash-2"></span></a>
				        {{ Form::close() }}
				    @endif
			    </div>
			  </div>
			  <div class="card-body">
			  	<span class="avatar avatar-xl" style="background-image: url(images/admin/{{$personal->imagenPerfil}})"></span>
			  	<p> </p>
			  	<div class="row">
				  	<p class="col-md-6">Cédula: {{$personal->cedula}}</p>
				  	<p class="col-md-6">Teléfono: {{$personal->telefono}}</p>		  		
			  	</div>
			  	<div class="row">
			  		<p class="col-md-6">Dirección: {{$personal->direccion}}</p>
			  		<p class="col-md-6">Sexo: {{$personal->sexo}}</p>
			  	</div>
			  	<div class="row">
			  		<p class="col-md-12"><b>Especialidad: </b>{{$personal->especialidad}}</p>
			  	</div>
			  </div>
			  <div class="card-footer">
			    {{$personal->email}}
			  </div>
			</li>

			<!--Modal edit personal -->
			<div class="modal fade" id="editModal{{$personal->id}}" tabindex="-1" role="dialog">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Registrar personal</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      {!! Form::open(['route' => ['Auth.usuario.updateProfile', $personal], 'method' => 'GET','enctype' => 'multipart/form-data']) !!}
       				{{ csrf_field() }}
			      	<div class="modal-body">
			        	<div class="row">
				        	<div class="col-md-6">
					          	<input id="nombre{{$personal->id}}" name="nombre{{$personal->id}}" type="text" class="form-control" placeholder="Nombre completo" required="true" value="{{$personal->nombreCompleto}}">
				        	</div>
				        	<div class="col-md-6">
						        <input id="email{{$personal->id}}" name="email{{$personal->id}}" type="email" class="form-control" placeholder="Correo" required="true" value="{{$personal->email}}">
				        	</div>
			        	</div>
			        	<div class="row">
			        		<div class="col-md-6">
						        <input id="cedula{{$personal->id}}" name="cedula{{$personal->id}}" type="text" class="form-control" placeholder="Cedula" required="true" value="{{$personal->cedula}}">
			        		</div>
			        		<div class="col-md-6">
						        <input id="telefono{{$personal->id}}" name="telefono{{$personal->id}}" type="text" class="form-control" placeholder="(+57) 000 - 0000 - 000" value="{{$personal->telefono}}">
			        		</div>
			        	</div>
				        <div class="row">
				        	<div class="col-md-4">
				        		<input id="direccion{{$personal->id}}" name="direccion{{$personal->id}}" type="text" class="form-control" placeholder="Dirección" value="{{$personal->direccion}}">
				        	</div>
				        	<div class="col-md-4">
				        		<input id="fechaNacimiento{{$personal->id}}" name="fechaNacimiento{{$personal->id}}" type="date" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="año-mes-día" required="true" value="{{$personal->fechaNacimiento}}" />
				        	</div>
				        	<div class="col-md-4">
				        		<select id="sexo{{$personal->id}}" name="sexo{{$personal->id}}" class="form-control" placeholder="">
				                  	@if($personal->sexo=='')
					                  	<option value="" selected="selected">Seleccionar</option>
					                    <option value="masculino">Masculino</option>
					                    <option value="femenino">Femenino</option>
					                @elseif($personal->sexo=='femenino')
					                    <option value="masculino">Masculino</option>
					                    <option value="femenino" selected="selected">Femenino</option>
					                @else
					                    <option value="masculino" selected="selected">Masculino</option>
					                    <option value="femenino" >Femenino</option>
					                @endif
			                	</select>
				        	</div>
				        </div>
				        <div class="row">
				        	<div class="col-md-12">
				        		<textarea id="especialidad{{$personal->id}}" name="especialidad{{$personal->id}}" rows="3" class="form-control" placeholder="Especialidad de la persona" required="true">{{$personal->especialidad}}</textarea>
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
			<!--Fin modal edit personal-->
		@endforeach
	</ul>
</section>
<!-- Fin mi personal -->


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

	$('#addModal').on('shown.bs.modal', function () {
	  $('#btn-add').trigger('focus')
	})

	$(".btn").click(function(){
	    var idElegido = $(this).attr("id");
	    var palabra = "#editModal";
	    var id = palabra.concat(idElegido);
	    $(id).appendTo("body").modal('show');
	 });
</script>

<!-- Para fecha de nacimiento, departamento y ciudad -->
<script>

	function eliminar(id){
		if(confirm('¿Desea eliminar este personal? Se perderán todos los datos, incluyendo citas asociadas a este usuario.')){
			var form = document.getElementById("form"+id);
			form.submit();
		}
	}

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
<style type="text/css">
	#imagenCircular{
	  	border-radius: 50%;
	    width: 150px;
	    height: 150px;
	}
</style>


@endsection