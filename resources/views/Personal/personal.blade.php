@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')

{!!Html::style('assetsIntena/css/stylePerso.css')!!}

<!--Realizado por Daniel Alejandro Rivera, ing-->

<div class="my-3 my-md-5">
	<div class="container">
		<div class="page-header">
<!-- boton de añadir-->
				<div>
					<button class="btn btn-pill btn-primary" id="btn-add"  data-toggle="modal" href="#addModal" title="Agregar personal">
					<i class="fa fa-plus" style="margin-right: 0px;"></i><span style="font-weight: 500"> Añadir</span>
					</button>
				</div>
<!-- boton de añadir-->
		</div>
<!-- Inicio de Modal-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background-color: white">
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
						<!--lado izquierdo del form-->
	        	<div class="col-sm-6">
							<div class="form-group">
			            <label class="form-label">Nombre Completo</label>
								<div class="input-icon">
			                  <span class="input-icon-addon">
			                    <i class="fe fe-user"></i>
			                  </span>
					          	<input id="nombre" name="nombre" type="text" class="form-control"  required="true">
			           </div>
			         </div>
							 <div class="form-group">
  			            <label class="form-label">Documento Identificacion</label>
  								<div class="input-icon">
  			                  <span class="input-icon-addon">
  			                    <i class="fe fe-credit-card"></i>
  			                  </span>
 												<input id="cedula" name="cedula" type="text" class="form-control"  required="true">
  			           </div>
  			         </div>
								 <div class="form-group">
	  			            <label class="form-label">Genero</label>
	  								<div class="input-icon">
	  			                  <span class="input-icon-addon">
	  			                    <i class="fa fa-venus-mars"></i>
	  			                  </span>
	 												<select id="sexo" name='sexo' class="form-control" required="true">
	 						                  	<option value="" selected="selected">Seleccionar sexo</option>
	 						                    <option value="masculino">Masculino</option>
	 						                    <option value="femenino">Femenino</option>
	 					              </select>
	  			           </div>
	  			         </div>
									 <div class="form-group">
		  			            <label class="form-label">Fecha de Nacimiento</label>
		  								<div class="input-icon">
		  			                  <span class="input-icon-addon">
		  			                    <i class="fa fa-birthday-cake"></i>
		  			                  </span>
		 									<input id="fechaNacimiento" name="fechaNacimiento" type="date" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" required="true" /> 			           </div>
		  			         </div>
		 							<div class="form-group">
		 									 <label class="form-label">Dirección</label>
		 								 <div class="input-icon">
		 												 <span class="input-icon-addon">
		 													 <i class="fe fe-map-pin"></i>
		 												 </span>
		 												 <input id="direccion" name="direccion" type="text" class="form-control" required="true" >
		 									</div>
		 								</div>
	        	</div>
						<!--lado izquierdo del form-->
						<!--lado derecho del form-->
						<div class="col-sm-6">
						<div class="form-group">
								 <label class="form-label">Email</label>
							 <div class="input-icon">
											 <span class="input-icon-addon">
												 <i class="fe fe-mail"></i>
											 </span>
								<input id="email" name="email" type="email" class="form-control" required="true">
							</div>
						</div>
						<div class="form-group">
								 <label class="form-label">Contraseña</label>
							 <div class="input-icon">
											 <span class="input-icon-addon">
												 <i class="fe fe-lock"></i>
											 </span>
									<input id="password" name="password" type="password" class="form-control" required="true">
							</div>
						</div>
						<div class="form-group">
								 <label class="form-label">Telefono</label>
							 <div class="input-icon">
											 <span class="input-icon-addon">
												 <i class="fe fe-phone-outgoing"></i>
											 </span>
									<input id="telefono" name="telefono" type="text" class="form-control" required="true">
							</div>
						</div>
						<div class="form-group">
								 <label class="form-label">Departamento</label>
							 <div class="input-icon">
											 <span class="input-icon-addon">
												 <i class="fe fe-map"></i>
											 </span>
									<select class="form-control" id="idDepto"  name="idDepto" required="true">
				 					<option value="">Seleccionar Departamento</option>
				 					@foreach($departamentos as $departamento)
				 	                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
				 		            @endforeach
				 					</select>
							</div>
						</div>
						<div class="form-group">
							 <label class="form-label">Ciudad</label>
						 <div class="input-icon">
										 <span class="input-icon-addon">
											 <i class="fe fe-map"></i>
										 </span>
								<select class="form-control" id="idCiudad" name="idCiudad" required="true">
			 						<option value="">Seleccionar Ciudad</option>
			 					</select>
						</div>
						</div>


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
<!-- Fin de page-header-->
<!-- Agregar cada Personal-->
<div class="row row-cards" style="margin: 0px !important;">
@foreach($personales as $personal)
	@if(!$personal->esAdmin)
	@if(!$personal->eliminado)
	<div class="col-lg-6 col-xl-4 Perso-wrapper">
		<div class="card"  style="margin-bottom: 0rem;">
			<div class="heading">
				@if(!$personal->esAdmin)
					{!! Form::open(['route' => ['Auth.usuario.deleteProfile', $personal], 'method' => 'GET','enctype' => 'multipart/form-data', 'id' => "form$personal->id"]) !!}
					{{ csrf_field() }}
					<a title="Eliminar personal" onclick="eliminar({{$personal->id}})"><i class="pocketMorado fa fa-times pull-right"></i></a>
					{{ Form::close() }}
					@endif
					<a id="{{$personal->id}}" data-toggle="modal"	href="#editModal{{$personal->id}}" title="Agregar personal"><i class="pocketMorado fa fa-pencil-square-o pull-right"></i><a>
			</div>

			<div class="firstinfo">
			<img src="{{asset('images/admin/'.$personal->imagenPerfil)}}" />
				<div class="profileinfo">
					<div class="divtext">
						{{$personal->nombreCompleto}}
					</div>
						<ul class="m-0 float-left" style="list-style: none; margin:0; padding: 0;font-size: 13px;color: #808080;">
							<li><i class="fe fe-credit-card fa-address-card SpacePerspIcon"></i>{{$personal->cedula}}</li>
							<li><i class="fa fa-venus-mars SpacePerspIcon"></i>{{$personal->sexo}}</li>
							<li><i class="fe fe-phone-outgoing SpacePerspIcon"></i>{{$personal->telefono}}</li>
							<li class="email"><i class="fe fe-map SpacePerspIcon"></i>{{$personal->email}}</li>
						</ul>
			</div>
			</div>
			</div>
		<div class="badgescard">
			<spam>{{$personal->especialidad}}</spam>
		</div>
	</div>
<!-- inicio del modal para editar-->
<!--Modal edit personal -->
<div class="modal fade" id="editModal{{$personal->id}}" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" style="background-color: white">
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
<!--lado izquierdo del form-->
	        	<div class="col-md-6">
							<div class="form-group">
			            <label class="form-label">Nombre Completo</label>
								<div class="input-icon">
			                  <span class="input-icon-addon">
			                    <i class="fe fe-user"></i>
			                  </span>
								<input id="nombre{{$personal->id}}" name="nombre{{$personal->id}}" type="text" class="form-control" placeholder="Nombre completo" required="true" value="{{$personal->nombreCompleto}}">
			           </div>
			         </div>
							<div class="form-group">
 			            <label class="form-label">Documento Identificacion</label>
 							<div class="input-icon">
 			                  <span class="input-icon-addon">
 			                    <i class="fe fe-credit-card"></i>
 			                  </span>
								<input id="cedula{{$personal->id}}" name="cedula{{$personal->id}}" type="text" class="form-control" placeholder="Cedula" required="true" value="{{$personal->cedula}}">
							</div>
 			         </div>
							<div class="form-group">
 			            <label class="form-label">Genero</label>
 								<div class="input-icon">
 			                  <span class="input-icon-addon">
 			                    <i class="fa fa-venus-mars"></i>
 			                  </span>
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
							<div class="form-group">
 			            <label class="form-label">Fecha de Nacimiento</label>
 								<div class="input-icon">
 			                  <span class="input-icon-addon">
 			                    <i class="fa fa-birthday-cake"></i>
 			                  </span>
							<input id="fechaNacimiento{{$personal->id}}" name="fechaNacimiento{{$personal->id}}" type="date" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="año-mes-día" required="true" value="{{$personal->fechaNacimiento}}" />
 			         </div>

					</div>
<!--lado izquierdo del form-->
				</div>
<!--lado derecho del form-->
	        	<div class="col-md-6">
					<div class="form-group">
								 <label class="form-label">Email</label>
							 <div class="input-icon">
											 <span class="input-icon-addon">
												 <i class="fe fe-mail"></i>
											 </span>
							<input id="email{{$personal->id}}" name="email{{$personal->id}}" type="email" class="form-control" placeholder="Correo" required="true" value="{{$personal->email}}">
							</div>
						</div>
					<div class="form-group">
						 <label class="form-label">Telefono</label>
					 <div class="input-icon">
									 <span class="input-icon-addon">
										 <i class="fe fe-phone-outgoing"></i>
									 </span>
							<input id="telefono{{$personal->id}}" name="telefono{{$personal->id}}" type="text" class="form-control" placeholder="(+57) 000 - 0000 - 000" value="{{$personal->telefono}}">
					</div>
				</div>
				<div class="form-group">
						 <label class="form-label">Dirección</label>
					 <div class="input-icon">
									 <span class="input-icon-addon">
										 <i class="fe fe-map-pin"></i>
									 </span>
				<input id="direccion{{$personal->id}}" name="direccion{{$personal->id}}" type="text" class="form-control" placeholder="Dirección" value="{{$personal->direccion}}">
						</div>
					</div>

				</div>
<!--lado derecho del form-->
					</div>
					<div class="row">
						<div class="col-md-12">
							<textarea id="especialidad{{$personal->id}}" name="especialidad{{$personal->id}}" rows="3" class="form-control" placeholder="Especialidad de la persona" required="true">{{$personal->especialidad}}</textarea>
						</div>
					</div>
				</div>

		<div class="modal-footer">
			<button type="submit" class="btn btn-primary" style="font-weight:400">Guardar</button>
		</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
<!-- Fin del modal para editar-->
	@endif
	@endif
	@endforeach
</div>


	</div>
</div>


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
