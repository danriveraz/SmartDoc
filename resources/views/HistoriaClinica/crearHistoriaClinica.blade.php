@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<div class="page-content">
	<div class="container">
	    <div class="row row-cards">
    	 	<div class="col-lg-12">
    	 		{!! Form::open(['route' => ['historia.posteditHistoriaClinica', $historia], 'method' => 'GET','enctype' => 'multipart/form-data']) !!}
       			{{ csrf_field() }}
    	 			<div class="card">
	              		<div class="card-header">
	                  		<h3 class="card-title">Identificación Paciente</h3>
	              		</div>
	              		<!-- inicio del contenedor del campo texto-->
		          		<div class="card-body">
		          			<div class="row">
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" placeholder="Nombre completo" value="{{$historia->nombreCompleto}}">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
          							<select class="form-control" id="tipoDocumento" name="tipoDocumento">
          								@if($historia->tipoDocumento=='')
						                	<option value="" selected="selected">Tipo documento</option>
						                    <option value="tarjeta">T.I</option>
						                    <option value="cedula">C.C</option>
						                @elseif($historia->sexo=='tarjeta')
						                    <option value="tarjeta" selected="selected">T.I</option>
						                    <option value="cedula" >C.C</option>
						                @else
						                    <option value="tarjeta" >T.I</option>
						                    <option value="cedula" selected="selected">C.C</option>
						                @endif
          							</select> 
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input class="form-control" type="text" name="documento" id="documento" placeholder="Documento" value="{{$historia->documento}}">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<select class="form-control" id="sexo" name="sexo">
          								@if($historia->sexo=='')
						                	<option value="" selected="selected">Seleccionar</option>
						                    <option value="masculino">Masculino</option>
						                    <option value="femenino">Femenino</option>
						                @elseif($historia->sexo=='femenino')
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
		          				<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" value="{{$historia->edad}}">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
					        		<input id="fechaNacimiento" name="fechaNacimiento" type="text" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="Fecha tratamiento AA/MM/DD" value="{{$historia->fechaNacimiento}}" />
					        	</div>
					        	<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="{{$historia->direccion}}">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="{{$historia->telefono}}">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
		          				<div class="col-md-3">
					        		<select class="form-control" id="idDepto"  name="idDepto" required>
									<option value="">Departamento</option>
									@foreach($departamentos as $departamento)
		                              @if($historia->departamento == $departamento->id)
		                                <option value="{{$departamento->id}}" selected="selected">{{$departamento->nombre}}</option>
		                              @else
		                                <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
		                              @endif
		                          @endforeach
									</select>
					        	</div>
					        	<div class="col-md-3">
					        		<select class="form-control" id="idCiudad" name="idCiudad" required>
										<option value="">Ciudad</option>
										@foreach($ciudades as $ciudad)
		                                    @if($historia->departamento == $ciudad->idDepartamento)
		                                      @if($historia->ciudad == $ciudad->id)
		                                        <option value="{{$ciudad->id}}" selected="selected">{{$ciudad->nombre}}</option>
		                                      @else
		                                        <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
		                                      @endif
		                                    @endif
		                                @endforeach
									</select>
					        	</div>
					        	<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="personaResponsable" name="personaResponsable" placeholder="Persona responsable" value="{{$historia->personaResponsable}}">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="telefonoResponsable" name="telefonoResponsable" placeholder="Teléfono" value="{{$historia->telefonoResponsable}}">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
		          				<div class="col-md-12">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta" value="{{$historia->motivoConsulta}}">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
					        	<div class="col-md-12">
					        		<textarea id="evolucionEstado" name="evolucionEstado" rows="3" class="form-control" placeholder="Evolucion y estado actual (Ampliación motivo de consulta-Reporte Síntomas)">{{$historia->evolucionEstado}}</textarea>
					        	</div>
					        </div>
					        <br>
					        <div class="row">
		          				<div class="col-md-12">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="antecedentesFamiliares" name="antecedentesFamiliares" placeholder="Antecedentes familiares" value="{{$historia->antecedentesFamiliares}}">
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
										        <td>Alergias</td>
										        <td>
										        	@if($historia->alergias)
														<input class="checkbox" type="checkbox" value="1" id="alergias" name="alergias" checked="">
														<span class="checkmark"></span>
													@else
														<input class="checkbox" type="checkbox" value="0" id="alergias" name="alergias">
														<span class="checkmark"></span>
													@endif
							                    </td>
										        <td>Hepatitis</td>
										        <td>
										        	@if($historia->hepatitis)
										        		<input class="checkbox" type="checkbox" value="1" id="hepatitis" name="hepatitis" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="hepatitis" name="hepatitis">
														<span class="checkmark"></span>
													@endif
										        </td>
										        <td>Trastorno gástricos</td>
										        <td>
										        	@if($historia->transtornoGastricos)
										        		<input class="checkbox" type="checkbox" value="1" id="transtornoGastricos" name="transtornoGastricos" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="transtornoGastricos" name="transtornoGastricos">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										      <tr>
										        <td>Discrasias sanguíneas</td>
										        <td>
										        	@if($historia->discrasiasSangineas)
											        	<input class="checkbox" type="checkbox" value="1" id="discrasiasSangineas" name="discrasiasSangineas" checked="">
														<span class="checkbox" class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="discrasiasSangineas" name="discrasiasSangineas">
														<span class="checkbox" class="checkmark"></span>
										        	@endif
							                    </td>
										        <td>Diabetis</td>
										        <td>
										        	@if($historia->diabetis)
											        	<input class="checkbox" type="checkbox" value="1" id="diabetis" name="diabetis" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="diabetis" name="diabetis">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Trastorno emocionales</td>
										        <td>
										        	@if($historia->transtornoEmocional)
											        	<input class="checkbox" type="checkbox" value="1" id="transtornoEmocional" name="transtornoEmocional" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="transtornoEmocional" name="transtornoEmocional">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										      <tr>
										        <td>Cardiopatías</td>
										        <td>
										        	@if($historia->cardiopatias)
											        	<input class="checkbox" type="checkbox" value="1" id="cardiopatias" name="cardiopatias" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="cardiopatias" name="cardiopatias">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Fiebre reumática</td>
										        <td>
										        	@if($historia->fiebreReumatica)
										        		<input class="checkbox" type="checkbox" value="1" id="fiebreReumatica" name="fiebreReumatica" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="fiebreReumatica" name="fiebreReumatica">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Sinusitis</td>
										        <td>
										        	@if($historia->sinusitis)
											        	<input class="checkbox" type="checkbox" value="1" id="sinusitis" name="sinusitis" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="sinusitis" name="sinusitis">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										      <tr>
										        <td>Embarazo</td>
										        <td>
										        	@if($historia->embarazo)
											        	<input class="checkbox" type="checkbox" value="1" id="embarazo" name="embarazo" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="embarazo" name="embarazo">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>HIV - SIDA</td>
										        <td>
										        	@if($historia->hvisida)
											        	<input class="checkbox" type="checkbox" value="1" id="hvisida" name="hvisida" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="hvisida" name="hvisida">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Cirugías (incluso orales)</td>
										        <td>
										        	@if($historia->cirugias)
											        	<input class="checkbox" type="checkbox" value="1" id="cirugias" name="cirugias" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="cirugias" name="cirugias">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										      <tr>
										        <td>Alteraciones presión arterial</td>
										        <td>
										        	@if($historia->altPresionArterial)
										        		<input class="checkbox" type="checkbox" value="1" id="altPresionArterial" name="altPresionArterial" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="altPresionArterial" name="altPresionArterial">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Inmunosupresión</td>
										        <td>
										        	@if($historia->inmunosupresion)
											        	<input class="checkbox" type="checkbox" value="1" id="inmunosupresion" name="inmunosupresion" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="inmunosupresion" name="inmunosupresion">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Exodoncias</td>
										        <td>
										        	@if($historia->exodoncias)
										        		<input class="checkbox" type="checkbox" value="1" id="exodoncias" name="exodoncias" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="exodoncias" name="exodoncias">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										      <tr>
										        <td>Toma de medicamentos</td>
										        <td>
										        	@if($historia->tomaMedicamentos)
										        		<input class="checkbox" type="checkbox" value="1" id="tomaMedicamentos" name="tomaMedicamentos" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="tomaMedicamentos" name="tomaMedicamentos">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Patología Renales</td>
										        <td>
										        	@if($historia->patologiaRenales)
											        	<input class="checkbox" type="checkbox" value="1" 
											        	id="patologiaRenales" name="patologiaRenales" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="patologiaRenales" name="patologiaRenales">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Enfermedades orales</td>
										        <td>
										        	@if($historia->enfermedadesOrales)
											        	<input class="checkbox" type="checkbox" value="1" id="enfermedadesOrales" name="enfermedadesOrales" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="enfermedadesOrales" name="enfermedadesOrales">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										      <tr>
										        <td>Tratamientos médicos actual</td>
										        <td>
										        	@if($historia->tratMedActual)	
 														<input class="checkbox" type="checkbox" value="1" id="tratMedActual" name="tratMedActual" checked="">
														<span class="checkmark"></span>
										        	@else
											        	<input class="checkbox" type="checkbox" value="0" id="tratMedActual" name="tratMedActual">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Patología Respiratorias</td>
										        <td>
										        	@if($historia->patologiaRespiratoria)
										        		<input class="checkbox" type="checkbox" value="1" id="patologiaRespiratoria" name="patologiaRespiratoria" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="patologiaRespiratoria" name="patologiaRespiratoria">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Uso de prótesis o aparato logia oral</td>
										        <td>
										        	@if($historia->protesis)
										        		<input class="checkbox" type="checkbox" value="1" id="protesis" name="protesis" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="protesis" name="protesis">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										    </tbody>
										</table>
			              			</div>
			              		</div>
		          			</div>
		          			<div class="row">
		          				<div class="col-md-12">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="otrasPatologiasAntecedentes" name="otrasPatologiasAntecedentes" placeholder="Otras Patologías o antecedentes Odontológicos o Médicos" value="{{$historia->otrasPatologiasAntecedentes}}">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
					        	<div class="col-md-12">
					        		<textarea id="observacionesAntecedentes" name="observacionesAntecedentes" rows="3" class="form-control" placeholder="Observaciones / Hábitos asociados a cavidad oral">{{$historia->observacionesAntecedentes}}</textarea>
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
										        <td>
										        	@if($historia->labioInferior)
										        		<input class="checkbox" type="checkbox" value="1" id="labioInferior" name="labioInferior" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="labioInferior" name="labioInferior">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Orofaringe</td>
										        <td>
										        	@if($historia->orofaringe)
										        		<input class="checkbox" type="checkbox" value="1" id="orofaringe" name="orofaringe" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="orofaringe" name="orofaringe">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Ruidos</td>
										        <td>
										        	@if($historia->ruidos)
										        		<input class="checkbox" type="checkbox" value="1" id="ruidos" name="ruidos" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="ruidos" name="ruidos">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										      <tr>
										        <td>Labio superior</td>
										        <td>
										        	@if($historia->labioSuperior)
										        		<input class="checkbox" type="checkbox" value="1" id="labioSuperior" name="labioSuperior" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="labioSuperior" name="labioSuperior">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Paladar</td>
										        <td>
										        	@if($historia->paladar)
										        		<input class="checkbox" type="checkbox" value="1" id="paladar" name="paladar" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="paladar" name="paladar">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Desviación</td>
										        <td>
										        	@if($historia->desviacion)
										        		<input class="checkbox" type="checkbox" value="1" id="desviacion" name="desviacion" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="desviacion" name="desviacion">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										      <tr>
										        <td>Comisuras</td>
										        <td>
										        	@if($historia->comisuras)
										        		<input class="checkbox" type="checkbox" value="1" id="comisuras" name="comisuras" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="comisuras" name="comisuras">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Glándulas Salivales</td>
										        <td>
										        	@if($historia->glandulasSalivales)
										        		<input class="checkbox" type="checkbox" value="1" id="glandulasSalivales" name="glandulasSalivales" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="glandulasSalivales" name="glandulasSalivales">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Cambio de volumen</td>
										        <td>
										        	@if($historia->cambioVolumen)
										        		<input class="checkbox" type="checkbox" value="1" id="cambioVolumen" name="cambioVolumen" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="cambioVolumen" name="cambioVolumen">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										      <tr>
										        <td>Mucosa oral</td>
										        <td>
										        	@if($historia->mucuosaOral)
										        		<input class="checkbox" type="checkbox" value="1" id="mucuosaOral" name="mucuosaOral" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="mucuosaOral" name="mucuosaOral">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Piso de boca</td>
										        <td>
										        	@if($historia->pisoDeBoca)
										        		<input class="checkbox" type="checkbox" value="1" id="pisoDeBoca" name="pisoDeBoca" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="pisoDeBoca" name="pisoDeBoca">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Bloqueo mandibular</td>
										        <td>
										        	@if($historia->bloqueoMandibular)
										        		<input class="checkbox" type="checkbox" value="1" id="bloqueoMandibular" name="bloqueoMandibular" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="bloqueoMandibular" name="bloqueoMandibular">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										      <tr>
										        <td>Surcos yugales</td>
										        <td>
										        	@if($historia->surcosYugales)
										        		<input class="checkbox" type="checkbox" value="1" id="surcosYugales" name="surcosYugales" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="surcosYugales" name="surcosYugales">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Dorso de la lengua</td>
										        <td>
										        	@if($historia->dorsoLengua)
										        		<input class="checkbox" type="checkbox" value="1" id="dorsoLengua" name="dorsoLengua" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="dorsoLengua" name="dorsoLengua">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Limitación de mandibula</td>
										        <td>
										        	@if($historia->limitacionMandibula)
										        		<input class="checkbox" type="checkbox" value="1" id="limitacionMandibula" name="limitacionMandibula" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="limitacionMandibula" name="limitacionMandibula">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										      <tr>
										        <td>Frenillos</td>
										        <td>
										        	@if($historia->frenillos)
										        		<input class="checkbox" type="checkbox" value="1" id="frenillos" name="frenillos" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="frenillos" name="frenillos">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Vientre de la lengua</td>
										        <td>
										        	@if($historia->vientreLengua)
										        		<input class="checkbox" type="checkbox" value="1" id="vientreLengua" name="vientreLengua" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="vientreLengua" name="vientreLengua">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										        <td>Dolor articular</td>
										        <td>
										        	@if($historia->dolorArticular)
										        		<input class="checkbox" type="checkbox" value="1" id="dolorArticular" name="dolorArticular" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="dolorArticular" name="dolorArticular">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										      <tr>
										        <td></td>
										        <td></td>
										        <td></td>
										        <td></td>
										        <td>Dolor muscular</td>
										        <td>
										        	@if($historia->dolorMuscular)
										        		<input class="checkbox" type="checkbox" value="1" id="dolorMuscular" name="dolorMuscular" checked="">
														<span class="checkmark"></span>
										        	@else
										        		<input class="checkbox" type="checkbox" value="0" id="dolorMuscular" name="dolorMuscular">
														<span class="checkmark"></span>
										        	@endif
										        </td>
										      </tr>
										    </tbody>
										</table>
			              			</div>
			              		</div>
		          			</div>
		          			<div class="row">
		          				<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="cariados" name="cariados" placeholder="No Cariados" value="{{$historia->cariados}}">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="obturados" name="obturados" placeholder="No Obturados" value="{{$historia->obturados}}">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="exfoliados" name="exfoliados" placeholder="No Exfoliados" value="{{$historia->exfoliados}}">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							<input type="text" class="form-control" id="sanos" name="sanos" placeholder="No Sano" value="{{$historia->sanos}}">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
					        	<div class="col-md-12">
					        		<textarea id="observacionesEE" name="observacionesEE" rows="3" class="form-control" placeholder="Observaciones">{{$historia->observacionesEE}}</textarea>
					        	</div>
					        </div>
	              		</div>
		          	</div>
		          	<div class="form-group" style="text-align: center;">
		          		<button class="btn btn-primary">
		          			Guardar
		          		</button>
		          	</div>
    	 		{{ Form::close() }}
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

	$( '.checkbox' ).on( 'click', function() {
	    if( $(this).is(':checked') ){
	        // Hacer algo si el checkbox ha sido seleccionado
	        $(this).val("1");
	    } else {
	        // Hacer algo si el checkbox ha sido deseleccionado
	        $(this).val("0");
	    }
	});

</script>

<style type="text/css">
	.row + .row{
		margin-top: 0px;
	}

	.form-control::-webkit-input-placeholder{
		text-align: center;
	}

</style>

@endsection