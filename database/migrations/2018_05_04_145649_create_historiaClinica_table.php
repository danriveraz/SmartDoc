<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriaClinicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiaClinica', function (Blueprint $table) {
            $table->increments('id');
            
            //IDENTIFICACIÓN PACIENTE

            $table->string('nombreCompleto', 50);
            $table->string('tipoDocumento', 20);
            $table->string('documento', 20);
            $table->string('sexo', 15);
            $table->string('edad', 5);
            $table->date('fechaNacimiento');
            $table->string('direccion', 20);
            $table->string('telefono', 20);
            $table->string('departamento', 20);
            $table->string('ciudad', 20);
            $table->string('personaResponsable', 50);
            $table->string('telefonoResponsable', 20);
            $table->string('motivoConsulta');
            $table->string('evolucionEstado');
            $table->string('antecedentesFamiliares');
            
            //ANTECEDENTES ODONTOLÓGICO Y MÉDICOS GENERALES (SI O NO)

            $table->boolean('alergias');
            $table->boolean('discrasiasSangineas');
            $table->boolean('cardiopatias');
            $table->boolean('embarazo');
            $table->boolean('altPresionArterial');
            $table->boolean('tomaMedicamentos');
            $table->boolean('tratMedActual');
            $table->boolean('hepatitis');
            $table->boolean('diabetis');
            $table->boolean('fiebreReumatica');
            $table->boolean('hvisida');
            $table->boolean('inmunosupresion');
            $table->boolean('patologiaRenales');
            $table->boolean('patologiaRespiratoria');
            $table->boolean('transtornoGastricos');
            $table->boolean('transtornoEmocional');
            $table->boolean('sinusitis');
            $table->boolean('cirugias');
            $table->boolean('exodoncias');
            $table->boolean('enfermedadesOrales');
            $table->boolean('protesis');

            $table->string('otrasPatologiasAntecedentes');
            $table->string('observacionesAntecedentes');

            //EXAMEN ESTOMALÓGICO (SANO/NO SANO)

            $table->boolean('labioInferior');
            $table->boolean('labioSuperior');
            $table->boolean('comisuras');
            $table->boolean('mucuosaOral');
            $table->boolean('surcosYugales');
            $table->boolean('frenillos');
            $table->boolean('orofaringe');
            $table->boolean('paladar');
            $table->boolean('glandulasSalivales');
            $table->boolean('pisoDeBoca');
            $table->boolean('dorsoLengua');
            $table->boolean('vientreLengua');

            //ARTICULACIÓN TEMPORO MANDIBULAR HALLAZGO CLINICO (SANO/NO SANO)

            $table->boolean('ruidos');
            $table->boolean('desviacion');
            $table->boolean('cambioVolumen');
            $table->boolean('bloqueoMandibular');
            $table->boolean('limitacionMandibula');
            $table->boolean('dolorArticular');
            $table->boolean('dolorMuscular');

            //INDICE COPS

            $table->tinyInteger('cariados');
            $table->tinyInteger('obturados');
            $table->tinyInteger('exfoliados');
            $table->tinyInteger('sanos');
            $table->string('observacionesEE');
            $table->string('planTratamientoAprobado');
            $table->integer('costoTratamiento');

            //LLAVES FORANEAS

            $table->integer('idOdontograma')->unsigned();
            $table->foreign('idOdontograma')->references('id')->on('odontograma')->onDelete('cascade');

            $table->integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')->references('id')->on('empresa')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
