@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<link href="odontograma/css/base.css" rel="stylesheet">
<!--Espacio modal add procedimiento-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Agregar servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="bootstrapOn();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {!! Form::open(['route' => ['servicio.nuevo'], 'method' => 'Post','enctype' => 'multipart/form-data', 'id' => 'formGuardar']) !!}
       			{{ csrf_field() }}
       	<input type="text" name="id" hidden="" value="{{$historia->id}} ">
      	<div class="modal-body" align="center">
        	<div class="row">
	        	<div class="col-md-6">
		          	<select id="servicioNuevo" name='servicioNuevo' class="form-control" placeholder="Procedimiento" required style="text-align:center;">
	                  	<option value="" selected="selected">Procedimiento</option>
	        			@foreach($procedimientos as $procedimiento)
	        				<option value="{{$procedimiento->id}}">{{$procedimiento->nombre}}</option>
				        @endforeach
	            	</select>
	            </div>
	        	<div class="col-md-6">
	        		<input type="number" class="form-control" id="costoTratamientoNuevo" name="costoTratamientoNuevo" placeholder="Costo tratamiento" value="">
	        	</div>	
	        	&nbsp;
	        	<div class="col-md-12">
	        		<textarea id="descripcionNueva" name="descripcionNueva" rows="3" class="form-control" placeholder="Descripción"></textarea>
	        	</div>	        	
        	</div>
      	</div>
		<div class="modal-footer">
		<button id="btn-crear" class="btn btn-primary" title="Agregar evento" onclick="agregar()">Guardar &nbsp;<li class="fa fa-check"></li></button>
		</div>
      {{ Form::close() }}
    </div>
  </div>
</div>
<div class="page-content">
	<div class="container">
	    <div class="row row-cards">
    	 	<div class="col-lg-12">
    	 		{!! Form::open(['route' => ['historia.posteditHistoriaClinica', $historia], 'method' => 'GET','enctype' => 'multipart/form-data', 'id' => 'formGuardar']) !!}
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
	          							<label>Nombre completo</label>
	          							<input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" placeholder="Nombre completo" value="{{$historia->nombreCompleto}}" required="true">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
          							<label>Tipo de documento</label>
          							<select class="form-control" id="tipoDocumento" name="tipoDocumento" required="true">
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
	          							<label>Documento</label>
	          							<input class="form-control" type="text" name="documento" id="documento" placeholder="Documento" value="{{$historia->documento}}" required="true">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<label>Sexo</label>
	          						<select class="form-control" id="sexo" name="sexo" required="true">
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
	          							@if($historia->edad != "")
	          								<label>Edad</label>
	          							@endif
	          							<input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" value="{{$historia->edad}}" required="true">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						@if($historia->fechaNacimiento != "0000-00-00")
          								<label>Fecha inicio tratamiento</label>
          							@endif
					        		<input id="fechaNacimiento" name="fechaNacimiento" type="date" name="field-name" class="form-control" data-mask="0000-00-00" data-mask-clearifnotmatch="true" placeholder="Fecha tratamiento AA/MM/DD" value="{{$historia->fechaNacimiento}}" required="true"/>
					        	</div>
					        	<div class="col-md-3">
	          						<div class="form-group">
	          							@if($historia->direccion != "")
	          								<label>Dirección</label>
	          							@endif
	          							<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="{{$historia->direccion}}" required="true">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							@if($historia->telefono != "")
	          								<label>Teléfono</label>
	          							@endif
	          							<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="{{$historia->telefono}}" required="true">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
		          				<div class="col-md-3">
		          					@if($historia->departamento != "")
          								<label>Departamento</label>
          							@endif
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
					        		@if($historia->ciudad != "")
          								<label>Ciudad</label>
          							@endif
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
	          							@if($historia->personaResponsable != "")
	          								<label >Persona responsable</label>
	          							@endif
	          							<input type="text" class="form-control" id="personaResponsable" name="personaResponsable" placeholder="Persona responsable" value="{{$historia->personaResponsable}}" required="true">
	          						</div>
	          					</div>
	          					<div class="col-md-3">
	          						<div class="form-group">
	          							@if($historia->telefonoResponsable != "")
	          								<label >Teléfono</label>
	          							@endif
	          							<input type="text" class="form-control" id="telefonoResponsable" name="telefonoResponsable" placeholder="Teléfono" value="{{$historia->telefonoResponsable}}" required="true">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
		          				<div class="col-md-12">
	          						<div class="form-group">
	          							@if($historia->motivoConsulta != "")
	          								<label >Motivo de consulta</label>
	          							@endif
	          							<input type="text" class="form-control" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta" value="{{$historia->motivoConsulta}}" required="true">
	          						</div>
	          					</div>
		          			</div>
		          			<div class="row">
					        	<div class="col-md-12">
					        		@if($historia->motivoConsulta != "")
          								<label >Evolucion y estado actual (Ampliación motivo de consulta-Reporte Síntomas)</label>
          							@endif
					        		<textarea id="evolucionEstado" name="evolucionEstado" rows="3" class="form-control" placeholder="Evolucion y estado actual (Ampliación motivo de consulta-Reporte Síntomas)" required="true">{{$historia->evolucionEstado}}</textarea>
					        	</div>
					        </div>
					        <br>
					        <div class="row">
		          				<div class="col-md-12">
	          						<div class="form-group">
	          							@if($historia->antecedentesFamiliares != "")
	          								<label>Antecedentes familiares</label>
	          							@endif
	          							<input type="text" class="form-control" id="antecedentesFamiliares" name="antecedentesFamiliares" placeholder="Antecedentes familiares" value="{{$historia->antecedentesFamiliares}}" required="true">
	          						</div>
	          					</div>
		          			</div>
		          		</div>
		          		<!-- fin del contenedor del campo texto-->
		          	</div>
		          	<div class="card">
		          		<div class="card-header">
		          			<div class="col-md-12">
		          				<a id="btnAntecedentes" type="" class="btn-pill" data-toggle="collapse" data-target="#antecedentes">
	              					<span id="spanAntecedentesPlus" class="fa fa-plus" style="margin-right: 0px;"></span>
	              					<span id="spanAntecedentesMinus" class="fa fa-minus" style="margin-right: 0px; display: none;"></span>
	              				</a>
		          				<h3 class="card-title" style="display: initial;">Antecedentes Odontológico y Médicos Generales</h3>
		          			</div>
	              		</div>
	              		<div class="container">
	              			<div id="antecedentes" class="collapse">
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
	              		</div>
		          	</div>
		          	<div class="card">
		          		<div class="card-header">
		          			<div class="col-md-12">
		          				<a id="btnExamen" type="" class="btn-pill" data-toggle="collapse" data-target="#examen">
	              					<span id="spanExamenPlus" class="fa fa-plus" style="margin-right: 0px;"></span>
	              					<span id="spanExamenMinus" class="fa fa-minus" style="margin-right: 0px; display: none;"></span>
	              				</a>
		          				<h3 class="card-title" style="display: initial;">Exámen Estomatológico / Articulación temporo mandibular (Hallazgo Clínicos)</h3>
		          			</div>
	              		</div>
	              		<div class="container">
	              			<div  id="examen" class="collapse">
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
												        <th>Estructura</th>
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
			          							@if($historia->cariados == 0)
			          								<input type="text" class="form-control" id="cariados" name="cariados" placeholder="No Cariados" value="">
			          							@else
			          								<input type="text" class="form-control" id="cariados" name="cariados" placeholder="No Cariados" value="{{$historia->cariados}}">
			          							@endif
			          						</div>
			          					</div>
			          					<div class="col-md-3">
			          						<div class="form-group">
			          							@if($historia->obturados == 0)
			          								<input type="text" class="form-control" id="obturados" name="obturados" placeholder="No Obturados" value="">
			          							@else
			          								<input type="text" class="form-control" id="obturados" name="obturados" placeholder="No Obturados" value="{{$historia->obturados}}">
			          							@endif
			          						</div>
			          					</div>
			          					<div class="col-md-3">
			          						<div class="form-group">
			          							@if($historia->exfoliados == 0)
			          								<input type="text" class="form-control" id="exfoliados" name="exfoliados" placeholder="No Exfoliados" value="">
			          							@else
			          								<input type="text" class="form-control" id="exfoliados" name="exfoliados" placeholder="No Exfoliados" value="{{$historia->exfoliados}}">
			          							@endif
			          						</div>
			          					</div>
			          					<div class="col-md-3">
			          						<div class="form-group">
			          							@if($historia->sanos == 0)
			          								<input type="text" class="form-control" id="sanos" name="sanos" placeholder="No Sano" value="">
			          							@else
			          								<input type="text" class="form-control" id="sanos" name="sanos" placeholder="No Sano" value="{{$historia->sanos}}">
			          							@endif
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
	              		</div>
		          	</div>
	    	 		<!--Inicio odontograma -->
	    	 		<link href="stylesheets/bootstrap.css" rel="stylesheet" id="bootstrap">
	    	 		<div class="card">
	              		<div class="card-header">
		          			<div class="col-md-12">
		          				<a id="btnOdontogramaInicial" type="" class="btn-pill" data-toggle="collapse" data-target="#odontogramaInicial">
	              					<span id="spanOdontogramaInicialPlus" class="fa fa-plus" style="margin-right: 0px;"></span>
	              					<span id="spanOdontogramaInicialMinus" class="fa fa-minus" style="margin-right: 0px; display: none;"></span>
	              				</a>
		          				<h3 class="card-title" style="display: initial;">Odontograma Inicial</h3>
		          			</div>
	              		</div>
	              		<!-- inicio del contenedor del campo texto-->
	              		<div class="container">
						  <div id="odontogramaInicial" class="collapse">
						    <div class="card-body">
				                <div class="row">
				                    <div id="trInicial" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				                    </div>
				                    <div id="tlInicial" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				                    </div>
				                    <div id="tlrInicial" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
				                    </div>
				                    <div id="tllInicial" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				                    </div>
				                </div>
				                <div class="row">
				                    <div id="blrInicial" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
				                    </div>
				                    <div id="bllInicial" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				                    </div>
				                    <div id="brInicial" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				                    </div>
				                    <div id="blInicial" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				                    </div>
				                </div>
				                <br>			                	
				            </div>
						  </div>
						  <br>
						</div>				
			        </div>
	    	 		<div class="card">
	              		<div class="card-header">
	                  		<h3 class="card-title">Odontograma Geométrico</h3>
	              		</div>
	              		<!-- inicio del contenedor del campo texto-->
	              		<div class="container">
			          		<div class="card-body">
			          			<div class="col-md-12">
				                        <div id="controls" class="panel panel-default">
				                            <div class="panel-body">
				                                <div class="btn-group" data-toggle="buttons" style="padding-left: 5	%;">
				                                	<label id="sano" class="btn active" style="margin: 4px;
				                                	width: 48px; height: 48px; background-image: url(odontograma/images/dientes/sano.png); background-size: contain;" title="Sano">
				                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
				                                    </label>
				                                    <label id="cariado" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/caries.png); background-size: contain;" title="Cariado">
				                                        <input type="radio" name="options" id="option2" autocomplete="off" checked>
				                                    </label>
				                                    <label id="obturado" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/obturacion.png); background-size: contain;" title="Obturado">
				                                        <input type="radio" name="options" id="option3" autocomplete="off">
				                                    </label>
				                                    <label id="amalgama" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/amalgama.png); background-size: contain;" title="Amalgama">
				                                        <input type="radio" name="options" id="option4" autocomplete="off">
				                                    </label>
				                                    <label id="ausente" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/ausente.png); background-size: contain;" title="Ausente">
				                                        <input type="radio" name="options" id="option5" autocomplete="off">
				                                    </label>
				                                    <label id="sinErupcionar" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/sinerupcionar.png); background-size: contain;" title="Sin erupcionar">
				                                        <input type="radio" name="options" id="option6" autocomplete="off">
				                                    </label>
				                                    <label id="exodonciaRealizada" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/exodonciarealizada.png); background-size: contain;" title="Exodoncia realizada">
				                                        <input type="radio" name="options" id="option7" autocomplete="off">
				                                    </label>
				                                    <label id="exodonciaIndicada" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/exodonciaindicada.png); background-size: contain;" title="Exodoncia indicada">
				                                        <input type="radio" name="options" id="option8" autocomplete="off" checked>
				                                    </label>
				                                    <label id="sellante" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/sellante.png); background-size: contain;" title="Sellante">
				                                        <input type="radio" name="options" id="option9" autocomplete="off">
				                                    </label>
				                                    <label id="sinSellante" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/sinsellante.png); background-size: contain;" title="Sin sellante">
				                                        <input type="radio" name="options" id="option10" autocomplete="off">
				                                    </label>
				                                    <label id="endodoncia" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/endodoncia.png); background-size: contain;" title="Endodoncia">
				                                        <input type="radio" name="options" id="option11" autocomplete="off">
				                                    </label>
				                                    <label id="sinEndodoncia" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/sinendodoncia.png); background-size: contain;" title="Necesita endodoncia">
				                                        <input type="radio" name="options" id="option12" autocomplete="off">
				                                    </label>
				                                    <label id="ionomeroDeVidrio" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/ionomerodevidrio.png); background-size: contain;" title="Ionomero de vidrio">
				                                        <input type="radio" name="options" id="option13" autocomplete="off">
				                                    </label>
				                                    <label id="resinaFisica" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/resinafisica.png); background-size: contain;" title="Resina física">
				                                        <input type="radio" name="options" id="option14" autocomplete="off" checked>
				                                    </label>
				                                    <label id="recurrente" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/recurrente.png); background-size: contain;" title="Recurrente">
				                                        <input type="radio" name="options" id="option15" autocomplete="off">
				                                    </label>
				                                    <label id="enerupcion" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/enerupcion.png); background-size: contain;" title="En erupción">
				                                        <input type="radio" name="options" id="option16" autocomplete="off">
				                                    </label>
				                                    <label id="protesis" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/protesis.png); background-size: contain;" title="Protesis">
				                                        <input type="radio" name="options" id="option17" autocomplete="off">
				                                    </label>
				                                    <label id="giroversion" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/giroversion.png); background-size: contain;" title="Giroversión">
				                                        <input type="radio" name="options" id="option18" autocomplete="off">
				                                    </label>
				                                    <label id="semiIncluido" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/semi-incluido.png); background-size: contain;" title="Semi-incluido">
				                                        <input type="radio" name="options" id="option19" autocomplete="off">
				                                    </label>
				                                    <label id="provisional" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/provisional.png); background-size: contain;" title="Provisional">
				                                        <input type="radio" name="options" id="option20" autocomplete="off">
				                                    </label>
				                                    <label id="nucleoARealizar" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/nucleoarealizar.png); background-size: contain;" title="Nucleo a realizar">
				                                        <input type="radio" name="options" id="option21" autocomplete="off">
				                                    </label>
				                                    <label id="nucleoBueno" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/nucleobueno.png); background-size: contain;" title="Nucleo bueno">
				                                        <input type="radio" name="options" id="option22" autocomplete="off">
				                                    </label>
				                                    <label id="protesisIndicada" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/protesisindicada.png); background-size: contain;" title="Protesis indicada">
				                                        <input type="radio" name="options" id="option23" autocomplete="off">
				                                    </label>
				                                    <label id="fractura" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/fractura.png); background-size: contain;" title="Fractura">
				                                        <input type="radio" name="options" id="option24" autocomplete="off">
				                                    </label>
				                                    <label id="trauma" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/trauma.png); background-size: contain;" title="Trauma">
				                                        <input type="radio" name="options" id="option25" autocomplete="off">
				                                    </label>
				                                    <label id="coronaBuenEstado" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/coronaenbuenestado.png); background-size: contain;" title="Corona buen estado">
				                                        <input type="radio" name="options" id="option26" autocomplete="off">
				                                    </label>
				                                    <label id="coronaARealizar" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/coronaarealizar.png); background-size: contain;" title="Corona a realizar">
				                                        <input type="radio" name="options" id="option27" autocomplete="off">
				                                    </label>
				                                    <label id="atricion" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/atricion.png); background-size: contain;" title="Atrición">
				                                        <input type="radio" name="options" id="option28" autocomplete="off">
				                                    </label>
				                                    <label id="abrasion" class="btn" style="margin: 4px; width: 48px; height: 48px; background-image: url(odontograma/images/dientes/abrasion.png); background-size: contain;" title="Abrasión">
				                                        <input type="radio" name="options" id="option29" autocomplete="off">
				                                    </label>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                <div class="row">
				                    <div id="tr" class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-left: 0px;">
				                    </div>
				                    <div id="tl" class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-left: 0px;">
				                    </div>
				                    <div id="tlr" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right" style="padding-left: 0px;">
				                    </div>
				                    <div id="tll" class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-left: 0px;">
				                    </div>
				                </div>
				                <div class="row">
				                    <div id="blr" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right" style="padding-left: 0px;">
				                    </div>
				                    <div id="bll" class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-left: 0px;">
				                    </div>
				                    <div id="br" class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-left: 0px;">
				                    </div>
				                    <div id="bl" class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-left: 0px;">
				                    </div>
				                </div>
				                <br>			                	
				            </div>
				    	</div>
			        </div>
			        <div>
			        	<div class="card" style="margin: 0">
							<div class="card-header">
								<div class="col-md-10">
									<a id="btnServicios" type="" class="btn-pill" data-toggle="collapse" data-target="#servicio">
										<span id="spanServicioPlus" class="fa fa-plus" style="margin-right: 0px;"></span>
										<span id="spanServicioMinus" class="fa fa-minus" style="margin-right: 0px; display: none;"></span>
									</a>
									<h3 class="card-title" style="display: initial;">Servicios prestados</h3>
								</div>
								<div class="col-md-2" style='text-align:right'>
					          		<a id="btn-add" class="btn btn-primary" data-toggle="modal" href="#addModal" title="Agregar procedimiento" onclick="bootstrapOff();">
										 Agregar servicio
									</a>	
								</div>
							</div>
							<!-- inicio del contenedor del campo texto-->
							<div class="container">
								<div id="servicio" class="collapse">
									<div class="card-body">
						  			<div class="row">							 
						  				<div class="card" style="margin: 0">
								        	@foreach($historia->servicios as $servicio)
						              		<div class="card-header">
						                  		<div class="col-md-4">
						                  			<a id="btnPlanTratamiento{{$servicio->id}}" type="" class="btn-pill" data-toggle="collapse" data-target="#{{$servicio->id}} "onclick="info({{$servicio->id}});" data-expanded="false">
						              					<span id="spanPlanTratamientoPlus{{$servicio->id}}" class="fa fa-plus" style="margin-right: 0px;"></span>
						              					<span id="spanPlanTratamientoMinus{{$servicio->id}}" class="fa fa-minus" style="margin-right: 0px; display: none;"></span>
						              				</a>
							          				<h5  style="display: initial;">{{$servicio->procedimiento->nombre}} </h5>
						                  		</div>
						                  		<div class="col-md-3">
								        			@if($servicio->costoTratamiento == 0)
								        				<input type="number" class="form-control" id="costoTratamiento" name="costoTratamiento" placeholder="Costo tratamiento" value="" disabled="">
								        			@else
								        				<input type="number" class="form-control" id="costoTratamiento" name="costoTratamiento" placeholder="Costo tratamiento" value="{{$servicio->costoTratamiento}}" disabled="">
								        			@endif
						                  		</div>
						                  		<div class="col-md-3" align="center">
						                  			<?php 
						                  				$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
														$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
					 									$date = new DateTime($servicio->fecha);
															echo ($dias[date_format($date, 'w')]." ".date_format($date, 'd')." de ".$meses[date_format($date, 'n')-1]. " del ".date_format($date, 'Y'));  
													?>
						                  		</div>
						                  		<div class="col-md-3" align="center">
						                  			{!! Form::open(['route' => ['Auth.usuario.deleteServicio', $servicio], 'method' => 'GET','enctype' => 'multipart/form-data', 'id' => "form$servicio->id"]) !!}
								       				{{ csrf_field() }}
											        	<a class="btn btn-danger btn-sm ml-2" title="Eliminar servicio" onclick="eliminar({{$servicio->id}})"><i class="fe fe-trash-2"></i></a>
											        {{ Form::close() }}
											    </div>
						              		</div>
						              		<!-- inicio del contenedor del campo texto-->
						              		<div class="container">
						              			<div id="{{$servicio->id}}" class="collapse">
						              				<div class="card-body">
									          			<div class="row">
												        	<div class="col-md-12">
												        		<textarea id="planTratamientoAprobado" name="planTratamientoAprobado" rows="3" class="form-control" placeholder="Descripción" disabled="">{{$servicio->descripcion}}</textarea>
												        	</div>
												        </div>
									          		</div>	
						              			</div>
						              		</div>
						              		@endforeach
							          	</div>


							        </div>
						  		</div>	
								</div>
							</div>
						</div>
				</div>
		          	<div class="">
          				<div class="form-group" style="text-align: center;">
		                    <button type="submit" class="btn btn-primary" name="guardar" id="guardar" onclick="setValue(this)">
		                    	Guardar
		                    </button>
		                    <button type="submit" class="btn btn-primary" name="observacion" id="observacion" onclick="setValue(this)">
		                    	Añadir observación
		                    </button>
		                    <button type="submit" class="btn btn-primary" name="laboratorio" id="laboratorio" onclick="setValue(this)">
		                    	Añadir pedido
		                    </button>
		                    <div class="form-group" hidden="true">
		                    	<input type="text" name="activador" id="activador" value="">
		                    </div>
		                </div>
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

	$( '#btnAntecedentes' ).on( 'click', function() {
		if($('#antecedentes').attr('class') == "collapse"){
			document.getElementById('spanAntecedentesPlus').style.display = "none";
			document.getElementById('spanAntecedentesMinus').style.display = "";
		}else{
			document.getElementById('spanAntecedentesPlus').style.display = "";
			document.getElementById('spanAntecedentesMinus').style.display = "none";
		}
	});

	$( '#btnExamen' ).on( 'click', function() {
		if($('#examen').attr('class') == "collapse"){
			document.getElementById('spanExamenPlus').style.display = "none";
			document.getElementById('spanExamenMinus').style.display = "";
		}else{
			document.getElementById('spanExamenPlus').style.display = "";
			document.getElementById('spanExamenMinus').style.display = "none";
		}
	});

	$( '#btnPaleta' ).on( 'click', function() {
		if($('#paleta').attr('class') == "collapse"){
			document.getElementById('spanPaletaPlus').style.display = "none";
			document.getElementById('spanPaletaMinus').style.display = "";
		}else{
			document.getElementById('spanPaletaPlus').style.display = "";
			document.getElementById('spanPaletaMinus').style.display = "none";
		}
	});

	$( '#btnServicios' ).on( 'click', function() {
		if($('#servicio').attr('class') == "collapse"){
			document.getElementById('spanServicioPlus').style.display = "none";
			document.getElementById('spanServicioMinus').style.display = "";
		}else{
			document.getElementById('spanServicioPlus').style.display = "";
			document.getElementById('spanServicioMinus').style.display = "none";
		}
	});

	$( '#btnOdontogramaInicial' ).on( 'click', function() {
		if($('#odontogramaInicial').attr('class') == "collapse"){
			document.getElementById('spanOdontogramaInicialPlus').style.display = "none";
			document.getElementById('spanOdontogramaInicialMinus').style.display = "";
		}else{
			document.getElementById('spanOdontogramaInicialPlus').style.display = "";
			document.getElementById('spanOdontogramaInicialMinus').style.display = "none";
		}
	});

	function info(id){
		if(document.getElementById('btnPlanTratamiento'+id).dataset.expanded != "false"){
			document.getElementById('spanPlanTratamientoPlus'+id).style.display = "";
			document.getElementById('spanPlanTratamientoMinus'+id).style.display = "none";
			document.getElementById('btnPlanTratamiento'+id).dataset.expanded = "false"
		}else{
			document.getElementById('spanPlanTratamientoPlus'+id).style.display = "none";
			document.getElementById('spanPlanTratamientoMinus'+id).style.display = "";
			document.getElementById('btnPlanTratamiento'+id).dataset.expanded = "true"
		}
	}
</script>

<style type="text/css">
	.row + .row{
		margin-top: 0px;
	}

	.form-control::-webkit-input-placeholder{
		text-align: center;
	}
</style>


<!--Scripts para el odontograma-->
<script type="text/javascript">

	function replaceAll(find, replace, str) {
	    return str.replace(new RegExp(find, 'g'), replace);
	}

	function eliminar(id){
		if(confirm('¿Desea eliminar este servicio? Se perderán todos los datos y se restará este servicio de Cuentas.')){
			var form = document.getElementById("form"+id);
			form.submit();
		}
	}
	function bootstrapOff(){
		parent.removeChild(bootstrap);
	}

	function bootstrapOn(){
		parent.appendChild(bootstrap);
	}

	function createOdontogramInicial() {
	    var htmlLecheLeft = "",
	        htmlLecheRight = "",
	        htmlLeft = "",
	        htmlRight = "",
	        a = 1;
	    for (var i = 9 - 1; i >= 1; i--) {
	        //Dientes Definitivos Cuandrante Derecho (Superior/Inferior)
	        htmlRight += '<div data-name="value" id="dienteindex' + i + 'Inicial" class="diente">' +
	            '<span style="margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-info">index' + i + '</span>' +

	            '<div id="completoInicial' + i + 'Inicial" class="completo" style="display:none;">' +
                '</div>' +

                '<div id="dienteCompleto' + i + 'Inicial">' +
	            '<div id="tindex' + i + '" class="cuadro click">' +
	            '</div>' +
	            '<input type="text" id="tindex' + i + 'Inicial1" + name="tindex' + i + 'Inicial1" hidden = true>' +
	            '<div id="lindex' + i + 'Inicial" class="cuadro izquierdo click">' +
	            '</div>' +
	            '<input type="text" id="lindex' + i + 'Inicial1" + name="lindex' + i + 'Inicial1" hidden = true>' +
	            '<div id="bindex' + i + 'Inicial" class="cuadro debajo click">' +
	            '</div>' +
	            '<input type="text" id="bindex' + i + 'Inicial1" + name="bindex' + i + 'Inicial1" hidden = true>' +
	            '<div id="rindex' + i + 'Inicial" class="cuadro derecha click click">' +
	            '</div>' +
	            '<input type="text" id="rindex' + i + 'Inicial1" + name="rindex' + i + 'Inicial1" hidden = true>' +
	            '<div id="cindex' + i + 'Inicial" class="centro click">' +
	            '</div>' +
	            '<input type="text" id="cindex' + i + 'Inicial1" + name="cindex' + i + 'Inicial1" hidden = true>' +
	            '</div>' +
	            '</div>';
	        //Dientes Definitivos Cuandrante Izquierdo (Superior/Inferior)
	        htmlLeft += '<div id="dienteindex' + a + 'Inicial" class="diente">' +
	            '<span style="margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-info">index' + a + '</span>' +
	            '<div id="tindex' + a + 'Inicial" class="cuadro click">' +
	            '</div>' +
	            '<input type="text" id="tindex' + a + 'Inicial1" + name="tindex' + a + 'Inicial1" hidden = true>' +
	            '<div id="lindex' + a + 'Inicial" class="cuadro izquierdo click">' +
	            '</div>' +
	            '<input type="text" id="lindex' + a + 'Inicial1" + name="lindex' + a + 'Inicial1" hidden = true>' +
	            '<div id="bindex' + a + 'Inicial" class="cuadro debajo click">' +
	            '</div>' +
	            '<input type="text" id="bindex' + a + 'Inicial1" + name="bindex' + a + 'Inicial1" hidden = true>' +
	            '<div id="rindex' + a + 'Inicial" class="cuadro derecha click click">' +
	            '</div>' +
	            '<input type="text" id="rindex' + a + 'Inicial1" + name="rindex' + a + 'Inicial1" hidden = true>' +
	            '<div id="cindex' + a + 'Inicial" class="centro click">' +
	            '</div>' +
	            '<input type="text" id="cindex' + a + 'Inicial1" + name="cindex' + a + 'Inicial1" hidden = true>' +
	            '</div>';
	        if (i <= 5) {
	            //Dientes Temporales Cuandrante Derecho (Superior/Inferior)
	            htmlLecheRight += '<div id="dienteLindex' + i + 'Inicial" style="left: -25%;" class="diente-leche">' +
	                '<span style="margin-left: 45px; margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-primary">index' + i + '</span>' +
	                '<div id="tlecheindex' + i + 'Inicial" class="cuadro-leche top-leche click">' +
	                '</div>' +
	                '<input type="text" id="tlecheindex' + i + 'Inicial1" + name="tlecheindex' + i + 'Inicial1" hidden = true>' +
	                '<div id="llecheindex' + i + 'Inicial" class="cuadro-leche izquierdo-leche click">' +
	                '</div>' +
	                '<input type="text" id="llecheindex' + i + 'Inicial1" + name="llecheindex' + i + 'Inicial1" hidden = true>' +
	                '<div id="blecheindex' + i + 'Inicial" class="cuadro-leche debajo-leche click">' +
	                '</div>' +
	                '<input type="text" id="blecheindex' + i + 'Inicial1" + name="blecheindex' + i + 'Inicial1" hidden = true>' +
	                '<div id="rlecheindex' + i + 'Inicial" class="cuadro-leche derecha-leche click click">' +
	                '</div>' +
	                '<input type="text" id="rlecheindex' + i + 'Inicial1" + name="rlecheindex' + i + 'Inicial1" hidden = true>' +
	                '<div id="clecheindex' + i + 'Inicial" class="centro-leche click">' +
	                '</div>' +
	                '<input type="text" id="clecheindex' + i + 'Inicial1" + name="clecheindex' + i + 'Inicial1" hidden = true>' +
	                '</div>';
	        }
	        if (a < 6) {
	            //Dientes Temporales Cuandrante Izquierdo (Superior/Inferior)
	            htmlLecheLeft += '<div id="dienteLindex' + a + 'Inicial" class="diente-leche">' +
	                '<span style="margin-left: 45px; margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-primary">index' + a + '</span>' +
	                '<div id="tlecheindex' + a + 'Inicial" class="cuadro-leche top-leche click">' +
	                '</div>' +
	                '<input type="text" id="tlecheindex' + a + 'Inicial1" + name="tlecheindex' + a + 'Inicial1" hidden = true>' +
	                '<div id="llecheindex' + a + 'Inicial" class="cuadro-leche izquierdo-leche click">' +
	                '</div>' +
	                '<input type="text" id="llecheindex' + a + 'Inicial1" + name="llecheindex' + a + 'Inicial1" hidden = true>' +
	                '<div id="blecheindex' + a + 'Inicial" class="cuadro-leche debajo-leche click">' +
	                '</div>' +
	                '<input type="text" id="blecheindex' + a + 'Inicial1" + name="blecheindex' + a + 'Inicial1" hidden = true>' +
	                '<div id="rlecheindex' + a + 'Inicial" class="cuadro-leche derecha-leche click click">' +
	                '</div>' +
	                '<input type="text" id="rlecheindex' + a + 'Inicial1" + name="rlecheindex' + a + 'Inicial1" hidden = true>' +
	                '<div id="clecheindex' + a + 'Inicial" class="centro-leche click">' +
	                '</div>' +
	                '<input type="text" id="clecheindex' + a + 'Inicial1" + name="clecheindex' + a + 'Inicial1" hidden = true>' +
	                '</div>';
	        }
	        a++;//
	    }
	    $("#trInicial").append(replaceAll('index', '1', htmlRight));
	    $("#tlInicial").append(replaceAll('index', '2', htmlLeft));
	    $("#tlrInicial").append(replaceAll('index', '5', htmlLecheRight));
	    $("#tllInicial").append(replaceAll('index', '6', htmlLecheLeft));


	    $("#blInicial").append(replaceAll('index', '3', htmlLeft));
	    $("#brInicial").append(replaceAll('index', '4', htmlRight));
	    $("#bllInicial").append(replaceAll('index', '7', htmlLecheLeft));
	    $("#blrInicial").append(replaceAll('index', '8', htmlLecheRight));
	}

	function createOdontogram() {
	    var htmlLecheLeft = "",
	        htmlLecheRight = "",
	        htmlLeft = "",
	        htmlRight = "",
	        a = 1;
	    for (var i = 9 - 1; i >= 1; i--) {
	        //Dientes Definitivos Cuandrante Derecho (Superior/Inferior)
	        htmlRight += '<div data-name="value" id="dienteindex' + i + '" class="diente">' +
	            '<span style="margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-info">index' + i + '</span>' +

	            '<div id="completoindex' + i + '" class="completo click" style="display:none;">' +
                '</div>' +
                '<input type="text" id="completoindex' + i + '1" + name="completoindex' + i + '1" hidden = true>' +

                '<div id="dienteCompletoindex' + i + '" style="width: 50px; height:50px; margin-right5px;">' +
	            '<div id="tindex' + i + '" class="cuadro click">' +
	            '</div>' +
	            '<input type="text" id="tindex' + i + '1" + name="tindex' + i + '1" hidden = true>' +
	            '<div id="lindex' + i + '" class="cuadro izquierdo click">' +
	            '</div>' +
	            '<input type="text" id="lindex' + i + '1" + name="lindex' + i + '1" hidden = true>' +
	            '<div id="bindex' + i + '" class="cuadro debajo click">' +
	            '</div>' +
	            '<input type="text" id="bindex' + i + '1" + name="bindex' + i + '1" hidden = true>' +
	            '<div id="rindex' + i + '" class="cuadro derecha click click">' +
	            '</div>' +
	            '<input type="text" id="rindex' + i + '1" + name="rindex' + i + '1" hidden = true>' +
	            '<div id="cindex' + i + '" class="centro click">' +
	            '</div>' +
	            '<input type="text" id="cindex' + i + '1" + name="cindex' + i + '1" hidden = true>' +
	            '</div>' +
	            '</div>';
	        //Dientes Definitivos Cuandrante Izquierdo (Superior/Inferior)
	        htmlLeft += '<div id="dienteindex' + a + '" class="diente">' +
	            '<span style="margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-info">index' + a + '</span>' +

	            '<div id="completoindex' + a + '" class="completo click" style="display:none;">' +
                '</div>' +
                '<input type="text" id="completoindex' + a + '1" + name="completoindex' + a + '1" hidden = true>' +
                '<div id="dienteCompletoindex' + a + '">' +

	            '<div id="tindex' + a + '" class="cuadro click">' +
	            '</div>' +
	            '<input type="text" id="tindex' + a + '1" + name="tindex' + a + '1" hidden = true>' +
	            '<div id="lindex' + a + '" class="cuadro izquierdo click">' +
	            '</div>' +
	            '<input type="text" id="lindex' + a + '1" + name="lindex' + a + '1" hidden = true>' +
	            '<div id="bindex' + a + '" class="cuadro debajo click">' +
	            '</div>' +
	            '<input type="text" id="bindex' + a + '1" + name="bindex' + a + '1" hidden = true>' +
	            '<div id="rindex' + a + '" class="cuadro derecha click click">' +
	            '</div>' +
	            '<input type="text" id="rindex' + a + '1" + name="rindex' + a + '1" hidden = true>' +
	            '<div id="cindex' + a + '" class="centro click">' +
	            '</div>' +
	            '<input type="text" id="cindex' + a + '1" + name="cindex' + a + '1" hidden = true>' +
	            '</div>' +
	            '</div>';
	        if (i <= 5) {
	            //Dientes Temporales Cuandrante Derecho (Superior/Inferior)
	            htmlLecheRight += '<div id="dienteLindex' + i + '" style="left: -25%;" class="diente-leche">' +
	                '<span style="margin-left: 45px; margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-primary">index' + i + '</span>' +
	                '<div id="completoindex' + i + '" class="completo click" style="display:none;">' +
	                '</div>' +
	                '<input type="text" id="completoindex' + i + '1" + name="completoindex' + i + '1" hidden = true>' +
                	'<div id="lecheCompletoindex' + i + '">' +

	                '<div id="tlecheindex' + i + '" class="cuadro-leche top-leche click">' +
	                '</div>' +
	                '<input type="text" id="tlecheindex' + i + '1" + name="tlecheindex' + i + '1" hidden = true>' +
	                '<div id="llecheindex' + i + '" class="cuadro-leche izquierdo-leche click">' +
	                '</div>' +
	                '<input type="text" id="llecheindex' + i + '1" + name="llecheindex' + i + '1" hidden = true>' +
	                '<div id="blecheindex' + i + '" class="cuadro-leche debajo-leche click">' +
	                '</div>' +
	                '<input type="text" id="blecheindex' + i + '1" + name="blecheindex' + i + '1" hidden = true>' +
	                '<div id="rlecheindex' + i + '" class="cuadro-leche derecha-leche click click">' +
	                '</div>' +
	                '<input type="text" id="rlecheindex' + i + '1" + name="rlecheindex' + i + '1" hidden = true>' +
	                '<div id="clecheindex' + i + '" class="centro-leche click">' +
	                '</div>' +
	                '<input type="text" id="clecheindex' + i + '1" + name="clecheindex' + i + '1" hidden = true>' +
	                '</div>' +
	                '</div>';
	        }
	        if (a < 6) {
	            //Dientes Temporales Cuandrante Izquierdo (Superior/Inferior)
	            htmlLecheLeft += '<div id="dienteLindex' + a + '" class="diente-leche">' +
	                '<span style="margin-left: 45px; margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-primary">index' + a + '</span>' +
	                '<div id="completoindex' + a + '" class="completo click" style="display:none;">' +
	                '</div>' +
	                '<input type="text" id="completoindex' + a + '1" + name="completoindex' + a + '1" hidden = true>' +
	                '<div id="lecheCompletoindex' + a + '">' +

	                '<div id="tlecheindex' + a + '" class="cuadro-leche top-leche click">' +
	                '</div>' +
	                '<input type="text" id="tlecheindex' + a + '1" + name="tlecheindex' + a + '1" hidden = true>' +
	                '<div id="llecheindex' + a + '" class="cuadro-leche izquierdo-leche click">' +
	                '</div>' +
	                '<input type="text" id="llecheindex' + a + '1" + name="llecheindex' + a + '1" hidden = true>' +
	                '<div id="blecheindex' + a + '" class="cuadro-leche debajo-leche click">' +
	                '</div>' +
	                '<input type="text" id="blecheindex' + a + '1" + name="blecheindex' + a + '1" hidden = true>' +
	                '<div id="rlecheindex' + a + '" class="cuadro-leche derecha-leche click click">' +
	                '</div>' +
	                '<input type="text" id="rlecheindex' + a + '1" + name="rlecheindex' + a + '1" hidden = true>' +
	                '<div id="clecheindex' + a + '" class="centro-leche click">' +
	                '</div>' +
	                '<input type="text" id="clecheindex' + a + '1" + name="clecheindex' + a + '1" hidden = true>' +
	                '</div>' +
	                '</div>';
	        }
	        a++;//
	    }
	    $("#tr").append(replaceAll('index', '1', htmlRight));
	    $("#tl").append(replaceAll('index', '2', htmlLeft));
	    $("#tlr").append(replaceAll('index', '5', htmlLecheRight));
	    $("#tll").append(replaceAll('index', '6', htmlLecheLeft));


	    $("#bl").append(replaceAll('index', '3', htmlLeft));
	    $("#br").append(replaceAll('index', '4', htmlRight));
	    $("#bll").append(replaceAll('index', '7', htmlLecheLeft));
	    $("#blr").append(replaceAll('index', '8', htmlLecheRight));
	}
	var arrayPuente = [];
	var bootstrap = document.getElementById('bootstrap');
	var parent = bootstrap.parentNode;
	$(document).ready(function() {
		createOdontogramInicial();
	    createOdontogram();
	    $(".click").click(function(event) {
	        var control = $("#controls").children().find('.active').attr('id');
	        var cuadro = $(this).find("input[name=cuadro]:hidden").val();
	        switch (control) {
	        	case "sano":
	        		if($(this).hasClass("sano")){
	        			$(this).removeClass('sano');
	        			$id = $(this).attr("id") + 1;
		        		$idNormal = $id.substring(8,10);
	        			$div = document.getElementById('completo'+ $idNormal);
		        		$div.style.display = 'none';
		        		document.getElementById('completo'+ $idNormal + '1').value = "";
		        		if(document.getElementById('lecheCompleto' + $idNormal) == null){
		        			document.getElementById('dienteCompleto' + $idNormal).style.display = 'block';
		        		}else{
		        			document.getElementById('lecheCompleto' + $idNormal).style.display = 'block';
		        		}
	        		}else{
	        			$id = $(this).attr("id") + 1;
	        			if($id.length >= 9){
	        				$idNormal = $id.substring(6,8);
	        				document.getElementById('lecheCompleto' + $idNormal).style.display = 'none';
	        			}else{
	        				$idNormal = $id.substring(1,3);
	        				document.getElementById('dienteCompleto' + $idNormal).style.display = 'none';
	        			}
	        			$div = document.getElementById('completo'+ $idNormal);
	        			document.getElementById('completo'+ $idNormal + '1').value = "sano";
			        	$div.style.display = 'block';
			        	$($div).addClass('sano');
	        		}
	        	break;
	            case "cariado":
	                if ($(this).hasClass("click-blue")) {
	                    $(this).removeClass('click-blue');
	                    $(this).addClass('click-red');
	                    $id = $(this).attr("id") + 1;
                        document.getElementById($id).value = "cariado";
                        $(this).attr('title', 'cariado');
                        //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-red")) {
	                        $(this).removeClass('click-red');
	                        $id = $(this).attr("id") + 1;
	                        //alert(document.getElementById($id).id);
	                        document.getElementById($id).value = "";
	                        $(this).attr('title', '');
	                        //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-red');
	                        $id = $(this).attr("id") + 1;
	                        //alert(document.getElementById($id).id);
	                        document.getElementById($id).value = "cariado";
	                        $(this).attr('title', 'cariado');
	                       	//alert($id);
	                    }
	                }
	                break;
	            case "obturado":
	                if ($(this).hasClass("click-red")) {
	                    $(this).removeClass('click-red');
	                    $(this).addClass('click-blue');
	                    $id = $(this).attr("id") + 1;
                        //alert(document.getElementById($id).id);
                        document.getElementById($id).value = "obturado";
                        $(this).attr('title', 'obturado');
                        //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-blue")) {
	                        $(this).removeClass('click-blue');
	                        $(this).val("obturado");
	                        //alert(document.getElementById($id).id);
	                        document.getElementById($id).value = "";
	                        $(this).attr('title', '');
	                        //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "obturado";
		                    $(this).attr('title', 'obturado');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "exodonciaRealizada":
	                if ($(this).hasClass("click-red")) {
	                    $(this).removeClass('click-red');
	                    $(this).addClass('click-blue');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "exodonciaRealizada";
	                    $(this).attr('title', 'exodonciaRealizada');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-blue")) {
	                        $(this).removeClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "exodonciaRealizada";
		                    $(this).attr('title', 'exodonciaRealizada');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "exodonciaSimple":
	                if ($(this).hasClass("click-blue")) {
	                    $(this).removeClass('click-blue');
	                    $(this).addClass('click-red');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "exodonciaSimple";
	                    $(this).attr('title', 'exodonciaSimple');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-red")) {
	                        $(this).removeClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "exodonciaSimple";
		                    $(this).attr('title', 'exodonciaSimple');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "exodonciaQuirurgica":
	                if ($(this).hasClass("click-blue")) {
	                    $(this).removeClass('click-blue');
	                    $(this).addClass('click-red');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "exodonciaQuirurgica";
	                    $(this).attr('title', 'exodonciaQuirurgica');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-red")) {
	                        $(this).removeClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "exodonciaQuirurgica";
		                    $(this).attr('title', 'exodonciaQuirurgica');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "sinErupcionar":
	                if ($(this).hasClass("click-red")) {
	                    $(this).removeClass('click-red');
	                    $(this).addClass('click-blue');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "sinErupcionar";
	                    $(this).attr('title', 'sinErupcionar');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-blue")) {
	                        $(this).removeClass('click-blue');
	                      	$id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "sinErupcionar";
		                    $(this).attr('title', 'sinErupcionar');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "endodonciaRealizada":
	                if ($(this).hasClass("click-red")) {
	                    $(this).removeClass('click-red');
	                    $(this).addClass('click-blue');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "endodonciaRealizada";
	                    $(this).attr('title', 'endodonciaRealizada');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-blue")) {
	                        $(this).removeClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "endodonciaRealizada";
		                    $(this).attr('title', 'endodonciaRealizada');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "endodonciaIndicada":
	                if ($(this).hasClass("click-blue")) {
	                    $(this).removeClass('click-blue');
	                    $(this).addClass('click-red');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "endodonciaIndicada";
	                    $(this).attr('title', 'endodonciaIndicada');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-red")) {
	                        $(this).removeClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "endodonciaIndicada";
		                    $(this).attr('title', 'endodonciaIndicada');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "sellantePresente":
	                if ($(this).hasClass("click-red")) {
	                    $(this).removeClass('click-red');
	                    $(this).addClass('click-blue');
	                    $id = $(this).attr("id") + 1;
	                   // alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "sellantePresente";
	                    $(this).attr('title', 'sellantePresente');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-blue")) {
	                        $(this).removeClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "sellantePresente";
		                    $(this).attr('title', 'sellantePresente');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "sellanteIndicado":
	                if ($(this).hasClass("click-blue")) {
	                    $(this).removeClass('click-blue');
	                    $(this).addClass('click-red');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "sellanteIndicado";
	                    $(this).attr('title', 'sellanteIndicado');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-red")) {
	                        $(this).removeClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "sellanteIndicado";
		                    $(this).attr('title', 'sellanteIndicado');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "erosionAbrasion":
	                if ($(this).hasClass("click-blue")) {
	                    $(this).removeClass('click-blue');
	                    $(this).addClass('click-red');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "erosionAbrasion";
	                    $(this).attr('title', 'erosionAbrasion');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-red")) {
	                        $(this).removeClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                   // alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-red');
	                       	$id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "erosionAbrasion";
		                    $(this).attr('title', 'erosionAbrasion');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "procedimientoRealizado":
	                if ($(this).hasClass("click-red")) {
	                    $(this).removeClass('click-red');
	                    $(this).addClass('click-blue');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "procedimientoRealizado";
	                    $(this).attr('title', 'procedimientoRealizado');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-blue")) {
	                        $(this).removeClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "procedimientoRealizado";
		                    $(this).attr('title', 'procedimientoRealizado');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "coronaBuenEstado":
	                if ($(this).hasClass("click-red")) {
	                    $(this).removeClass('click-red');
	                    $(this).addClass('click-blue');
	                    $id = $(this).attr("id") + 1;
	                   // alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "coronaBuenEstado";
	                    $(this).attr('title', 'coronaBuenEstado');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-blue")) {
	                        $(this).removeClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "coronaBuenEstado";
		                    $(this).attr('title', 'coronaBuenEstado');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "coronaMalEstado":
	                if ($(this).hasClass("click-blue")) {
	                    $(this).removeClass('click-blue');
	                    $(this).addClass('click-red');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "coronaMalEstado";
	                    $(this).attr('title', 'coronaMalEstado');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-red")) {
	                        $(this).removeClass('click-red');
	                        //$id = $(this).attr("id") + 1;
		                    alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "coronaMalEstado";
		                    $(this).attr('title', 'coronaMalEstado');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "provisionalBuenEstado":
	                if ($(this).hasClass("click-red")) {
	                    $(this).removeClass('click-red');
	                    $(this).addClass('click-blue');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "provisionalBuenEstado";
	                    $(this).attr('title', 'provisionalBuenEstado');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-blue")) {
	                        $(this).removeClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "provisionalBuenEstado";
		                    $(this).attr('title', 'provisionalBuenEstado');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "provisionalMalEstado":
	                if ($(this).hasClass("click-blue")) {
	                    $(this).removeClass('click-blue');
	                    $(this).addClass('click-red');
	                   	$id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "provisionalMalEstado";
	                    $(this).attr('title', 'provisionalMalEstado');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-red")) {
	                        $(this).removeClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "provisionalMalEstado";
		                    $(this).attr('title', 'provisionalMalEstado');
		                    //alert(document.getElementById($i$(this).attr('title', 'cariado');d).value);
	                    }
	                }
	                break;
	            case "nucleoBuenEstado":
	                if ($(this).hasClass("click-red")) {
	                    $(this).removeClass('click-red');
	                    $(this).addClass('click-blue');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "nucleoBuenEstado";
	                    $(this).attr('title', 'nucleoBuenEstado');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-blue")) {
	                        $(this).removeClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-blue');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "nucleoBuenEstado";
		                    $(this).attr('title', 'nucleoBuenEstado');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            case "nucleoMalEstado":
	                if ($(this).hasClass("click-blue")) {
	                    $(this).removeClass('click-blue');
	                    $(this).addClass('click-red');
	                    $id = $(this).attr("id") + 1;
	                    //alert(document.getElementById($id).id);
	                    document.getElementById($id).value = "nucleoMalEstado";
	                    $(this).attr('title', 'nucleoMalEstado');
	                    //alert(document.getElementById($id).value);
	                } else {
	                    if ($(this).hasClass("click-red")) {
	                        $(this).removeClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "";
		                    $(this).attr('title', '');
		                    //alert(document.getElementById($id).value);
	                    } else {
	                        $(this).addClass('click-red');
	                        $id = $(this).attr("id") + 1;
		                    //alert(document.getElementById($id).id);
		                    document.getElementById($id).value = "nucleoMalEstado";
		                    $(this).attr('title', 'nucleoMalEstado');
		                    //alert(document.getElementById($id).value);
	                    }
	                }
	                break;
	            default:
	                console.log("borrar case");
	        }
	        return false;
	    });
	    return false;
	});
</script>

<!-- Script para cargar el odontograma-->
<script>
	var JSONodontograma = eval(<?php echo json_encode($odontograma2array); ?>);
	$(document).ready(function(){
		for(i = 0; i < JSONodontograma.length; i++){
			switch (JSONodontograma[i][1]){
	            case "cariado":
	            		$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "cariado";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "cariado";
	            break;
	            case "obturado":
	            		$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "obturado";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "obturado";
	            break;
	            case "exodonciaRealizada":
	            		$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "exodonciaRealizada";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "exodonciaRealizada";
	            break;
	            case "exodonciaSimple":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "exodonciaSimple";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "exodonciaSimple";
                break;
	            case "exodonciaQuirurgica":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "exodonciaQuirurgica";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "exodonciaQuirurgica";
                break;
	            case "sinErupcionar":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "sinErupcionar";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "sinErupcionar";
                break;
	            case "endodonciaRealizada":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "endodonciaRealizada";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "endodonciaRealizada";
                break;
	            case "endodonciaIndicada":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "endodonciaIndicada";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "endodonciaIndicada";
                break;
	            case "sellantePresente":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "sellantePresente";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "sellantePresente";
                break;
	            case "sellanteIndicado":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "sellanteIndicado";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "sellanteIndicado";
                break;
	            case "erosionAbrasion":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "erosionAbrasion";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "erosionAbrasion";
                break;
	            case "procedimientoRealizado":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "procedimientoRealizado";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "procedimientoRealizado";
                break;
	            case "coronaBuenEstado":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "coronaBuenEstado";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "coronaBuenEstado";
                break;
	            case "coronaMalEstado":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "coronaMalEstado";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "coronaMalEstado";
                break;
	            case "provisionalBuenEstado":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "provisionalBuenEstado";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "provisionalBuenEstado";
                break;
	            case "provisionalMalEstado":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "provisionalMalEstado";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "provisionalMalEstado";
                break;
	            case "nucleoBuenEstado":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "nucleoBuenEstado";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "nucleoBuenEstado";
                break;
	            case "nucleoMalEstado":
	                	$element = document.getElementById(JSONodontograma[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "nucleoMalEstado";
	            		$inputElement = document.getElementById(JSONodontograma[i][0] + '1');
	            		$inputElement.value = "nucleoMalEstado";
                break;
	        }
		}
	});

	function setValue(idBtn) {
		if(idBtn.id == "guardar"){
	    	activador.value = 1;
	    }else if(idBtn.id == "observacion"){
	    	activador.value = 2;
	    }else if(idBtn.id == "laboratorio"){
	    	activador.value = 3;
	    }
	}
</script>

<script>
	var JSONodontogramaInicial = eval(<?php echo json_encode($odontogramaInicial2array); ?>);
	$(document).ready(function(){
		for(i = 0; i < JSONodontogramaInicial.length; i++){
			switch (JSONodontogramaInicial[i][1]){
	            case "cariado":
	            		$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "cariado";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "cariado";
	            break;
	            case "obturado":
	            		$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "obturado";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "obturado";
	            break;
	            case "exodonciaRealizada":
	            		$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "exodonciaRealizada";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "exodonciaRealizada";
	            break;
	            case "exodonciaSimple":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "exodonciaSimple";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "exodonciaSimple";
                break;
	            case "exodonciaQuirurgica":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "exodonciaQuirurgica";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "exodonciaQuirurgica";
                break;
	            case "sinErupcionar":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "sinErupcionar";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "sinErupcionar";
                break;
	            case "endodonciaRealizada":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "endodonciaRealizada";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "endodonciaRealizada";
                break;
	            case "endodonciaIndicada":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "endodonciaIndicada";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "endodonciaIndicada";
                break;
	            case "sellantePresente":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "sellantePresente";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "sellantePresente";
                break;
	            case "sellanteIndicado":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "sellanteIndicado";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "sellanteIndicado";
                break;
	            case "erosionAbrasion":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "erosionAbrasion";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "erosionAbrasion";
                break;
	            case "procedimientoRealizado":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "procedimientoRealizado";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "procedimientoRealizado";
                break;
	            case "coronaBuenEstado":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "coronaBuenEstado";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "coronaBuenEstado";
                break;
	            case "coronaMalEstado":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "coronaMalEstado";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "coronaMalEstado";
                break;
	            case "provisionalBuenEstado":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "provisionalBuenEstado";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "provisionalBuenEstado";
                break;
	            case "provisionalMalEstado":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "provisionalMalEstado";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "provisionalMalEstado";
                break;
	            case "nucleoBuenEstado":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-blue');
	            		$element.title = "nucleoBuenEstado";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "nucleoBuenEstado";
                break;
	            case "nucleoMalEstado":
	                	$element = document.getElementById(JSONodontogramaInicial[i][0]);
	            		$element.classList.add('click-red');
	            		$element.title = "nucleoMalEstado";
	            		$inputElement = document.getElementById(JSONodontogramaInicial[i][0] + '1');
	            		$inputElement.value = "nucleoMalEstado";
                break;
	        }
		}
	});
</script>
<style type="text/css">
	.btn-pill{
		background-color: #FFFFFF;
	}

	.fa-plus{
		color: #3276b1;
		border-radius: 0px;
	}

	.fa-minus{
		color: #3276b1;
		border-radius: 0px;
	}
</style>
@endsection