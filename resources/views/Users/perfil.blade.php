@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')

{!!Html::style('assetsIntena/css/styleTapProfile.css')!!}
{!!Html::style('assetsIntena/css/main.css')!!}
{!!Html::style('assetsIntena/css/rainbow-pricing-table.css')!!}
{!!Html::style('assetsIntena/css/stylePayment.css')!!}


{!!Html::script("assetsIntena/js/main.js")!!}
{!!Html::script("assetsIntena/js/JsTapProfile.js")!!}

<style>
.profile-content {
padding: 20px;
background: #fff;
}
.col-sm-4 {
float: left;
}

.col-sm-6 {
float: left;
}

</style>

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
            <!-- Inicio de cambio de contraseña -->

            <!-- Fin de cambio de contraseña -->
          </div>
        </div>
      </div><!-- fin del col lg4-->
      <div class="col-lg-8 pull-right">
        <div class="card">
          <!-- Inicio de tap -->
          <div class="profile-content">
            <!-- Nav tabs contenedor -->
            <div id="tabs" class="tabs">
      				<nav>
      					<ul>
      						<li><a href="#section-1" class="icon-shop"><span>Empresa</span></a></li>
      						<li><a href="#section-2" class="icon-food"><span>PocketClub</span></a></li>
      					</ul>
      				</nav>
              <!-- INICIO DEL CONTENIDO -->
      				<div class="content">
      					<section id="section-1" style="background-color: white;">
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
                        <div class="form-group" style="background-color: ">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fe fe-credit-card"></i>
                            </span>
                            <input id="direccion" name="direccion" class="form-control" placeholder="Dirección" type="text" value="{{$empresa->direccion}}">
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
                              <i class="fe fe-phone-call"></i>
                            </span>
                            <input id="celular" name="celular" class="form-control" placeholder="Celular" type="text" value="{{$empresa->celular}}">
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
                                  @if($empresa->departamento == $departamento->id)
                                    <option value="{{$departamento->id}}" selected="selected">{{$departamento->nombre}}</option>
                                  @else
                                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                  @endif
                              @endforeach
                            </select>
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
                                  @if($empresa->departamento == $ciudad->idDepartamento)
                                    @if($empresa->ciudad == $ciudad->id)
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
                        <!-- lado izquierdo-->
                      <div class="col-md-6 sise14">
                        <div class="widget-container">
                          <div class="card-header" style="border-bottom: none;">
                          <p class="lead col-centrada" style="margin-bottom: 10px;  font-size:16px;">
                           Información <span class="text-success">Tributaria</span>
                          </p>
                          </div>
                          <div class="form-group">
                            <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fe fe-credit-card"></i>
                              </span>
                              @if($empresa->nit == 0)
        											<input name="nit" type="text" class="form-control" placeholder="Ingrese su nit xxxxxxx-xx" required="true">
        										  @else
        											<input name="nit" type="text" class="form-control" placeholder="Ingrese su nit xxxxxxx-xx" value="{{$empresa->nit}}" required="true">
        										  @endif
                            </div>
                          </div>

                        <div class="form-group">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fe fe-credit-card"></i>
                            </span>
                            <select id="tipoRegimen" name="tipoRegimen" class="form-control" onChange="pagoOnChange(this)" value="{{$empresa->tipoRegimen}} ">
                                <option value="comun" <?php if($empresa->tipoRegimen == "comun") echo 'selected="selected"'; ?> >Regimen comun</option>
                                <option value="simplificado" <?php if($empresa->tipoRegimen == "simplificado") echo 'selected="selected"'; ?> >Regimen  simplificado</option>
                            </select>
      									  </div>
                        </div>
                        <div id="regimenSimple"  style="display:none;">
                        <div class="form-group">
                          <div class="input-icon">
                            <span class="input-icon-addon">
                              <i class="fe fe-credit-card"></i>
                            </span>
                            <input id="NumSimpli" name="NumSimpli" class="form-control" placeholder="Numeración" type="text" value="{{$empresa->nInicioFactura}}">
                          </div>
                        </div>
                      </div>
                        <!--- vomun-->
                        <div id="regimenComun">
                          <div class="form-group">
                            <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fe fe-credit-card"></i>
                              </span>
                              <input class="form-control" id="resolucion" name="resolucion" placeholder="Resolución de facturación" type="text" id="regimen" name="regimen" value="{{$empresa->nResolucionFacturacion}}">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fe fe-credit-card"></i>
                              </span>
                              <input class="form-control" name="fechaResolucion" id="fechaResolucion" type="date" placeholder="Fecha resolución" value="{{$empresa->fechaResolucion}}">
                            </div>
                          </div>

                          <div class="input-container">
                            <div class="input-group">
                              <div class="col-md-4">
                                <input name="prefijo" id="prefijo" type="text" class="form-control" placeholder="Prefijo" value="{{$empresa->prefijo}}">
                              </div>
                              <div class="col-md-4">
                                <input name="nInicio" id="nInicio" type="text" class="form-control" placeholder="Del No." value="{{$empresa->nInicioFactura}}" required="true">
                              </div>
                              <div class="col-md-4">
                                <input name="nFinal" id="nFinal" type="text" class="form-control" placeholder="Hasta" value="{{$empresa->nFinFactura}}" required="true">
                              </div>
                            </div>
                          </div>
                          <br>
                          <div class="input-container">
                            <p class="lead col-centrada" style="margin-bottom: 10px;  font-size:16px;">
                              Agrega tus impuestos </p>
                            <div class="input-group">
                              <div class="col-md-6">
                                <input name="impuesto1" id="impuesto1" type="text" class="form-control" placeholder="Nombre" value="{{$empresa->impuesto1}}">
                              </div>
                              <div class="col-md-6">
                                <input name="valori1" id="valori1" type="text" class="form-control" placeholder="Valor" value="{{$empresa->valorImpuesto1}}" required="true">
                              </div>
                            </div><br>
                            <div class="input-group">
                              <div class="col-md-6">
                                <input name="impuesto2" id="impuesto2" type="text" class="form-control" placeholder="Nombre" value="{{$empresa->impuesto2}}">
                              </div>
                              <div class="col-md-6">
                                <input name="valori2" id="valori2" type="text" class="form-control" placeholder="Valor" value="{{$empresa->valorImpuesto2}}" required="true">
                              </div>
                            </div>
                          </div>
                          <br>
                        </div>
                        <!--- vomun-->
                      </div><!-- widget-container-->
                    </div><!-- fin de col-md-6-->
                    </div>
                  </div>
                <div class="form-footer" style=" margin-top: 0rem;">
                  <button type="submit"  class="btn btn-primary"><i class="fe fe-check-square"></i> Guardar Información</button>
                </div>
      					</section>
                <!-- *****************************-->
                <!-- FIN DE SECTION 1 -->
                <!-- *****************************-->
      					<section id="section-2" style="background-color: white;">
                <div class="PocketAlertPro">
                  <div class="alert alert-info backgraundPocket">
                    <h4>!Estas al día</h4>
                    <p>
                      Tu Membresia PocketClub vence en 30 dias faltando 7 dias te recordaremos el vencimiento.
                    </p>
                  </div>
                </div>
<!-- contenido de metodos de pago -->
<div class="container">
<div class="row">
<div class="col-sm-12">
  <div class="sap_tabs">
  							<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
  								<div class="pay-tabs ">
  									<h2>Slecione Metodo de Pago</h2>
  									  <ul class="resp-tabs-list">
  										  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label class="pic3"></label>PayU</span></li>
  										  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span><label class="pic1"></label>PayPal</span></li>
  										  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span><label class="pic2"></label>MercadoPago</span></li>
  										  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span><label class="pic4"></label>Factura</span></li>
  										  <div class="clear"></div>
  									  </ul>
  								</div>
  								<div class="resp-tabs-container">
  									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
  										<div class="payment-info">
  											<h3>Personal Information</h3>

  										</div>
  									</div>
  									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
  										<div class="payment-info">
  											<h3>Net Banking</h3>

  										</div>
  									</div>

  									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
  										<div class="payment-info">

  										</div>
  									</div>

  									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
  										<div class="payment-info">

  											<h3 class="pay-title">Dedit Card Info</h3>


  										</div>
  									</div>
  								</div>
  							</div>
  						</div>
</div>
</div>

</div>
<!--- contenido de membresias -->
                <div class="container">
                                 <div class="col-md-12">
                                    <div class="row" style="display: flow-root !important;">
                                        <div class="bs-pricing-table-three">
                                            <div class="col-sm-4">
                                                <div class="bs-pricing-item free active">
                                                    <div class="head text-center">
                                                        <div class="head-title">
                                                            <h2>Única</h2>
                                                        </div>
                                                        <div class="price">
                                                            <h1>$69.990</h1>
                                                            <span>Mensuales</span> <br />
                                                            <span>Sin clausulas de permanencia</span>
                                                        </div>
                                                    </div>

                                                    <ul class="m-top-40">
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Acceso completo a SmartDoc</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Máximo 7 Empleados</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Información segura por 2 meses</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Sólo a promociones Únicas, Smartshop</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>No tienes ahorro, ni días gratis</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Donamos $3.000 Fundación para todos</span></li>
                                                    </ul>

                                                    <div class="bs-btns text-center">
                                                        <a href="" class="btn">Plan Actual</a>
                                                    </div>
                                                </div>
                                            </div><!-- End col-md-4 -->
                                            <div class="col-sm-4">
                                                <div class="bs-pricing-item xs-m-top-50 standard">
                                                    <div class="head text-center">
                                                        <div class="head-title">
                                                            <h2>Élite</h2>
                                                        </div>
                                                        <div class="price">
                                                            <h1>$799.780</h1>
                                                            <span>Anual</span> <br/>
                                                            <span>Sin clausulas de permanencia</span>
                                                        </div>
                                                    </div>

                                                    <ul class="m-top-40">
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Acceso completo a SmartDoc</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Empleados Infinitos</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Información segura por 18 meses</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Todas las promociones, Smartshop</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Ahorras $40.100 más 10 días Gratis</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Donamos $5.000 Fundación para todos</span></li>
                                                    </ul>
                                                    <div class="bs-btns text-center">
                                                        <a href="" class="btn">Unirte PocketClub</a>
                                                    </div>
                                                </div>
                                            </div><!-- End col-md-4 -->
                                            <div class="col-sm-4">
                                                <div class="bs-pricing-item sm-m-top-50 plus">
                                                    <div class="head text-center">
                                                        <div class="head-title">
                                                            <h2>Estandar</h2>
                                                        </div>
                                                        <div class="price">
                                                            <h1>$399.490</h1>
                                                            <span>Semestre</span> <br />
                                                            <span>Sin clausulas de permanencia</span>
                                                        </div>
                                                    </div>

                                                    <ul class="m-top-40">
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Acceso completo a SmartDoc</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Empleados Infinitos</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Información segura por 10 meses</span></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Todas las promociones, Smartshop</span>
                                                            <li><i class="fa fa-dot-circle-o"></i> <span>Ahorras $20.450 más 7 días gratis</span></li></li>
                                                        <li><i class="fa fa-dot-circle-o"></i> <span>Donamos $4.000 Fundación para todos</span></li>
                                                    </ul>

                                                    <div class="bs-btns text-center">
                                                        <a href="" class="btn">Unirte PocketClub</a>
                                                    </div>
                                                </div>
                                            </div><!-- End col-md-4 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
      					</section>
                <!-- *****************************-->
                <!-- FIN DE SECTION 3 -->
      				</div><!-- /content -->
      			</div><!-- /tabs -->

            <!-- Nav tabs -->
          </div>
          <!-- Fin de tap-->
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
  new CBPFWTabs( document.getElementById( 'tabs' ) );
</script>

{!!Html::script("assetsIntena/js/payment/easyResponsiveTabs.js")!!}
    <script type="text/javascript">
      $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
          type: 'default', //Types: default, vertical, accordion
          width: 'auto', //auto or any width like 600px
          fit: true   // 100% fit in a container
        });
         pagoOnChange(document.getElementById("tipoRegimen"));
      });

    </script>

<script>

function pagoOnChange(sel) {
      if (sel.value=="simplificado"){
           divC = document.getElementById("regimenSimple");
           divC.style.display = "";

           divT = document.getElementById("regimenComun");
           divT.style.display = "none";

      }else{
           divC = document.getElementById("regimenSimple");
           divC.style.display="none";

           divT = document.getElementById("regimenComun");
           divT.style.display = "";
      }
}

</script>

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
            window.location.reload();
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
