@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<div class="page-content">
  <div class="container">
    <div class="row row-cards">
      <div class="col-lg-4">
        <div class="card card-profile">
          {!! Form::open(['route' => ['Auth.usuario.editPerfil'], 'method' => 'GET','enctype' => 'multipart/form-data']) !!}
   	      {{ csrf_field() }}
          <div class="card-header" style="background-image: url(images/fondoProfile.jpg);"></div>
          <div class="card-body text-center">
            <div class="col-md-12" style="text-align: center; z-index: 1000;">
              <div class="widget-content fileupload fileupload-new">
                <div class="gallery-container fileupload-new img-thumbnail">
                  <div class="card-profile-img gallery-item filter1" style="border-radius: 50%; width: 150px; height: 150px;">
                    @if($empresa->imagen != '')
                      {!! Html::image('images/admin/'.$empresa->imagen,  'imagen de perfil', array('class' => 'img-responsive img-circle user-photo', 'id' => 'imagenCircular')) !!}
                    @else
                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image">
                    @endif
                    <div class="actions">
                      <a  id="modalImagen" href="{{ asset ('images/admin/'.$empresa->imagen) }}" title="Imagen">
                       <img src="images/admin/{{$empresa->imagen}}" hidden>
                       <i class="fa fa-search-plus"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <input class="inputfile" type="file" name="upload_image" id="upload_image" accept="image/*">
              <label for="upload_image">Cambiar imagen</label>
              <br />
              <div id="uploaded_image" style="width: 350px; margin-top: 30px;"></div> 
            </div><!-- fin col lg12 imagen de perfil-->
            <div id="uploadimageModal" class="modal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Subir imagen de perfil</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div id="image_demo" style="width: 350px; margin-top: 30px;">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-primary crop_image">Guardar</a>
                  </div>
                </div>
              </div>
            </div>
            <h3 class="mb-1">{{$empresa->nombreEstablecimiento}}</h3>
            <p class="mb-3" style="font-size: 12px;">
              {{$empresa->eslogan}}
            </p>
            <ul class="social-links list-inline mb-0 mt-2">
              <li class="list-inline-item">
                <a href="javascript:void(0)" title="Facebook" data-toggle="tooltip"><i class="fa fa-facebook"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="javascript:void(0)" title="Twitter" data-toggle="tooltip"><i class="fa fa-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="javascript:void(0)" title="instagram" data-toggle="tooltip"><i class="fa fa-instagram"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div><!-- fin del col lg4-->
      <div class="col-lg-8 pull-right">
        <div class="card">
          <div class="card-header">
              <h3 class="card-title">Configuración De Perfil</h3>
          </div>
          <div class="card-body">
            <div class="row row-cards row-deck">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fe fe-user"></i>
                    </span>
                    <input id="nombreEstablecimiento" name="nombreEstablecimiento" class="form-control" placeholder="Nombre Establecimiento" type="text" value="{{$empresa->nombreEstablecimiento}}">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fe fe-credit-card"></i>
                    </span>
                    <input id="nit" name="nit" class="form-control" placeholder="Nit" type="text" value="{{$empresa->nit}}">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fe fe-phone-call"></i>
                    </span>
                    <input id="telefono" name="telefono" class="form-control" placeholder="Teléfono" type="text" value="{{$empresa->telefono}}">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fe fe-map"></i>
                    </span>
                    <select class="form-control custom-select" id="idDepto"  name="idDepto" required>
                      <option value="">Departamento</option>
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
              </div>
                <!-- lado izquierdo-->
              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fe fe-user"></i>
                    </span>
                    <input id="eslogan" name="eslogan" class="form-control" placeholder="ESlogan" type="text" value="{{$empresa->eslogan}}">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fe fe-tag"></i>
                    </span>
                    <input id="direccion" name="direccion" class="form-control" placeholder="Dirección" type="text" value="{{$empresa->direccion}}">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fe fe-smartphone"></i>
                    </span>
                    <input id="celular" name="celular" class="form-control" placeholder="Celular" type="text" value="{{$empresa->celular}}">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fe fe-map"></i>
                    </span>
                    <select class="form-control custom-select" id="idCiudad" name="idCiudad" required>
                      <option value="">Ciudad</option>
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
              </div>
            </div>
          </div>
        </div>
        <div class="form-footer">
          <button type="submit"  class="btn btn-primary pull-right"><i class="fe fe-check-square"></i> Guardar Información Perfil</button>
        </div>
      </div>
    </div>
    {{ Form::close() }}
    <div class="row">
      <div class="col-lg-12">
      </div>
    </div>
  </div>
</div>
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
	  $(document).on('change', ':file', function() {
	    var input = $(this),
	        numFiles = input.get(0).files ? input.get(0).files.length : 1,
	        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	    input.trigger('fileselect', [numFiles, label]);
	  });

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

<!-- IMAGEN PERFIL -->
<script type="text/javascript">
  $(function() {

    var base64ImageToBlob = function(str) {
        // extract content type and base64 payload from original string
        var pos = str.indexOf(';base64,');
        var type = str.substring(5, pos);
        var b64 = str.substr(pos + 8);
      
        // decode base64
        var imageContent = atob(b64);
      
        // create an ArrayBuffer and a view (as unsigned 8-bit)
        var buffer = new ArrayBuffer(imageContent.length);
        var view = new Uint8Array(buffer);
      
        // fill the view, using the decoded base64
        for (var n = 0; n < imageContent.length; n++) {
          view[n] = imageContent.charCodeAt(n);
        }
      
        // convert ArrayBuffer to Blob
        var blob = new Blob([buffer], { type: type });
      
        return blob;
    }

    function b64toBlob(b64Data, contentType, sliceSize) {
      contentType = contentType || '';
      sliceSize = sliceSize || 512;

      var b64DataString = b64Data.substr(b64Data.indexOf(',') + 1);      
      var byteCharacters = atob(b64DataString);
      var byteArrays = [];

      for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
        var slice = byteCharacters.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
          byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
      }

      var blob = new Blob(byteArrays, {
        type: contentType
      });
      return blob;
    }

    var image_crop = $('#image_demo').croppie({
      enableExif: true,
      viewport: {
        width:200,
        height:200,
        type:'circle' //circle
      },
      boundary:{
        width:300,
        height:300
      }
    });

    console.log(image_crop);

    $('#upload_image').on('change', function(){
      var reader = new FileReader();
      reader.onload = function(event){
        image_crop.croppie('bind', {
           url:event.target.result
        });
      }
      reader.readAsDataURL(this.files[0]);
      $('#uploadimageModal').modal('show');
    });

    $('.crop_image').click(function(event){
      image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
      }).then(function(img){

        $("#imagenCircular").attr("src","images/ajax-loader.gif");
        $("#uploadimageModal").modal('hide');

        var routeModificar = "http://localhost/SmartDoc/public/Perfil";
        var formData = new FormData();
        formData.append("perfil", base64ImageToBlob(img));

        console.log(formData);

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          url: routeModificar,
          method: "POST",
          data: {"image":img},
          success: function(data)
          {
            $("#imagenCircular").attr("src", img);
          },
          error: function(data){
            alert('Ooops disculpanos, no se pudo actualizar la foto de perfil!');
          }
        });
      })
    });
  });
</script>
<!-- FIN IMAGEN PERFIL -->


<style type="text/css">
  #imagenCircular{
  	border-radius: 50%;
    width: 150px;
    height: 150px;
  }

  /*INPUT FILE */
  .inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }

  .inputfile + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: #467fcf;
    display: inline-block;
  }

  .inputfile + label {
    max-width: 80%;
    font-size: 1rem;
    /* 20px */
    border-radius: 5%;
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.25rem 1rem;
    /* 10px 20px */
  }

  .inputfile:focus + label,
  .inputfile + label:hover {
      background-color: #B3B2FE;
  }
  .inputfile + label {
    cursor: pointer; /* "hand" cursor */
  }

  .inputfile:focus + label {
    outline: 1px dotted #000;
    outline: -webkit-focus-ring-color auto 5px;
  }

</style>



@endsection
