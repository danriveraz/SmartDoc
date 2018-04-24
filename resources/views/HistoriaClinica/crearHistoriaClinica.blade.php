@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<div class="page-content">
	<div class="container">
	    <div class="row row-cards">
    	 	<div class="col-lg-12">
    	 		<form>
    	 			<div class="card">
	              		<div class="card-header">
	                  		<h3 class="card-title">Identificación Paciente</h3>
	              		</div>
	              		<!-- inicio del contenedor del campo texto-->
		          		<div class="card-body">
		          			<div class="row">
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" placeholder="Nombre completo">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
          							<select class="form-control" id="tipoDocumento" name="tipoDocumento">
          								<option value="" selected="">Tipo documento</option>
          								<option value="tarjeta">T.I</option>
          								<option value="cedula">C.C</option>
          							</select> 
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input class="form-control" type="text" name="documento" id="documento" placeholder="Documento">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<select class="form-control" id="sexo" name="sexo">
          								<option value="" selected="">Sexo</option>
          								<option value="masculino">Masculino</option>
          								<option value="femenino">Femenino</option>
          							</select> 
	          					</div>
		          			</div>
		          			<div class="row">
		          				<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="edad" name="edad" placeholder="Edad">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
					        		<input id="fechaNacimiento" name="fechaNacimiento" type="text" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="Fecha tratamiento AA/MM/DD" required="true" />
					        	</div>
					        	<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
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
					        	<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="personaResponsable" name="personaResponsable" placeholder="Persona responsable">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="telefonoResponsable" name="telefonoResponsable" placeholder="Teléfono">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
		          				<div class="col-md-12">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
					        	<div class="col-md-12">
					        		<textarea id="evolucionEstado" name="evolucionEstado" rows="3" class="form-control" placeholder="Evolucion y estado actual (Ampliación motivo de consulta-Reporte Síntomas)"></textarea>
					        	</div>
					        </div>
					        <br>
					        <div class="row">
		          				<div class="col-md-12">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="antecedentesFamiliares" name="antecedentesFamiliares" placeholder="Antecedentes familiares">
	          						</div>
	          					</div>
		          			</div>
		          		</div>
		          		<!-- fin del contenedor del campo texto-->
		          	</div>
		          	<div class="card">
		          		<div class="card-header">
	                  		<h3 class="card-title">Antecedentes Odontológico y Médicos Generales</h3>
	              		</div>
	              		<div class="card-body">
		              		<div class="row" style="text-align: center;">
		              			<div class="col-md-12">
		              				<div class="form-group">
				          				<table class="table table-striped table-bordered">
										    <thead>
										      <tr>
										        <th>Antecedente</th>
										        <th>(SI/NO)</th>
										        <th>Antecedente</th>
										        <th>(SI/NO)</th>
										        <th>Antecedente</th>
										        <th>(SI/NO)</th>
										      </tr>
										    </thead>
										    <tbody>
										      <tr>
										        <td>Discrasias sanguíneas</td>
										        <td>SI/NO</td>
										        <td>Diabetis</td>
										        <td>SI/NO</td>
										        <td>Trastorno emocionales</td>
										        <td>SI/NO</td>
										      </tr>
										      <tr>
										        <td>Cardiopatías</td>
										        <td>SI/NO</td>
										        <td>Fiebre reunática</td>
										        <td>SI/NO</td>
										        <td>Sinusitis</td>
										        <td>SI/NO</td>
										      </tr>
										      <tr>
										        <td>Embarazo</td>
										        <td>SI/NO</td>
										        <td>HIV - SIDA</td>
										        <td>SI/NO</td>
										        <td>Cirugías (incluso orales)</td>
										        <td>SI/NO</td>
										      </tr>
										      <tr>
										        <td>Alteraciones presión arterial</td>
										        <td>SI/NO</td>
										        <td>Inmunosupresión</td>
										        <td>SI/NO</td>
										        <td>Exodoncias</td>
										        <td>SI/NO</td>
										      </tr>
										      <tr>
										        <td>Toma de medicamentos</td>
										        <td>SI/NO</td>
										        <td>Patología Renales</td>
										        <td>SI/NO</td>
										        <td>Enfermedades orales</td>
										        <td>SI/NO</td>
										      </tr>
										      <tr>
										        <td>Tratamientos médicos actual</td>
										        <td>SI/NO</td>
										        <td>Patología Respiratorias</td>
										        <td>SI/NO</td>
										        <td>Uso de prótesis o aparato logia oral</td>
										        <td>SI/NO</td>
										      </tr>
										    </tbody>
										</table>
			              			</div>
			              		</div>
		          			</div>
		          			<div class="row">
		          				<div class="col-md-12">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="otrasPatologiasAntecedentes" name="otrasPatologiasAntecedentes" placeholder="Otras Patologías o antecedentes Odontológicos o Médicos">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
					        	<div class="col-md-12">
					        		<textarea id="observacionesAntecedentes" name="observacionesAntecedentes" rows="3" class="form-control" placeholder="Observaciones / Hábitos asociados a cavidad oral"></textarea>
					        	</div>
					        </div>
	              		</div>
		          	</div>
		          	<div class="card">
		          		<div class="card-header">
	                  		<h3 class="card-title">Exámen Estomatológico / Articulación temporo mandibular (Hallazgo Clínicos)</h3>
	              		</div>
	              		<div class="card-body">
		              		<div class="row" style="text-align: center;">
		              			<div class="col-md-12">
		              				<div class="form-group">
				          				<table class="table table-striped table-bordered">
										    <thead>
										      <tr>
										        <th>Estructura</th>
										        <th>Sano</th>
										        <th>Estructura</th>
										        <th>Sano</th>
										        <th></th>
										        <th>Sano</th>
										      </tr>
										    </thead>
										    <tbody>
										      <tr>
										        <td>Labio inferior</td>
										        <td>SI/NO</td>
										        <td>Orofaringe</td>
										        <td>SI/NO</td>
										        <td>Ruidos</td>
										        <td>SI/NO</td>
										      </tr>
										      <tr>
										        <td>Labio superior</td>
										        <td>SI/NO</td>
										        <td>Paladar</td>
										        <td>SI/NO</td>
										        <td>Desviación</td>
										        <td>SI/NO</td>
										      </tr>
										      <tr>
										        <td>Comisuras</td>
										        <td>SI/NO</td>
										        <td>Glándulas Salivales</td>
										        <td>SI/NO</td>
										        <td>Cambio de volumen</td>
										        <td>SI/NO</td>
										      </tr>
										      <tr>
										        <td>Muscosa oral</td>
										        <td>SI/NO</td>
										        <td>Piso de boca</td>
										        <td>SI/NO</td>
										        <td>Bloqueo mandibular</td>
										        <td>SI/NO</td>
										      </tr>
										      <tr>
										        <td>Surcos yugales</td>
										        <td>SI/NO</td>
										        <td>Dorso de la lengua</td>
										        <td>SI/NO</td>
										        <td>Limitación de mandibula</td>
										        <td>SI/NO</td>
										      </tr>
										      <tr>
										        <td>Frenillos</td>
										        <td>SI/NO</td>
										        <td>Vientre de la lengua</td>
										        <td>SI/NO</td>
										        <td>Dolor articular</td>
										        <td>SI/NO</td>
										      </tr>
										      <tr>
										        <td></td>
										        <td></td>
										        <td></td>
										        <td></td>
										        <td>Dolor muscular</td>
										        <td>SI/NO</td>
										      </tr>
										    </tbody>
										</table>
			              			</div>
			              		</div>
		          			</div>
		          			<div class="row">
		          				<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="cariados" name="cariados" placeholder="No Cariados">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="obturados" name="obturados" placeholder="No Obturados">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="exfoliados" name="exfoliados" placeholder="No Exfoliados">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="sanos" name="sanos" placeholder="No Sano">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
					        	<div class="col-md-12">
					        		<textarea id="observacionesEE" name="observacionesEE" rows="3" class="form-control" placeholder="Observaciones"></textarea>
					        	</div>
					        </div>
	              		</div>
		          	</div>
    	 		</form>
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

<style type="text/css">
	.card{
	}

	.row + .row{
		margin-top: 0px;
	}

	.form-control::-webkit-input-placeholder{
		text-align: center;
	}

</style>

@endsection