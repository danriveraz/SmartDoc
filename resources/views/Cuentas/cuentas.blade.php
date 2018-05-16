@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<!-- DataTables Example -->
<div class="container main-content">
  <div class="page-title"></div>
  <div class="row">
      <div class="col-lg-12">
        <div class="widget-container fluid-height clearfix">
          <div class="widget-content padded clearfix">
			<table id="example" class="table table-striped" style="width:100%">
		        <thead>
		            <tr>
		                <th width="1.2%">En</th>
		                <th width="1.2%">Febr</th>
		                <th width="1.2%">Mzo</th>
		                <th width="1.2%">Abr</th>
		                <th width="1.2%">My</th>
		                <th width="1.2%">Jun</th>
		                <th width="1.2%">Jul</th>
		                <th width="1.2%">Ag</th>
		                <th width="1.2%">Sept</th>
		                <th width="1.2%">Oct</th>
		                <th width="1.2%">Nov</th>
		                <th width="1.2%">Dic</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($cuentas as $cuenta)
		            <tr>
		                <td>{{$cuenta->enero}}</td>
		                <td>{{$cuenta->febrero}}</td>
		                <td>{{$cuenta->marzo}}</td>
		                <td>{{$cuenta->abril}}</td>
		                <td>{{$cuenta->mayo}}</td>
		                <td>{{$cuenta->junio}}</td>
		                <td>{{$cuenta->julio}}</td>
		                <td>{{$cuenta->agosto}}</td>
		                <td>{{$cuenta->septiembre}}</td>
		                <td>{{$cuenta->octubre}}</td>
		                <td>{{$cuenta->noviembre}}</td>
		                <td>{{$cuenta->diciembre}}</td>
		            </tr>
		           @endforeach
		        </tbody>
		    </table>	
		  </div>
		</div>
	  </div>
	</div>
	<br>
	<div class="row">
      <div class="col-lg-12">
        <div class="widget-container fluid-height clearfix">
          <div class="widget-content padded clearfix">
			<table id="example2" class="table table-striped" style="width:100%;">
				<h4 align="center">Estadísticas Generales</h4>
		        <thead>
		            <tr>
		                <th width="12.5%">1er tri</th>
		                <th width="12.5%">2do tri</th>
		                <th width="12.5%">3er tri</th>
		                <th width="12.5%">4to tri</th>
		                <th width="12.5%">1er sem</th>
		                <th width="12.5%">2do sem</th>
		                <th width="12.5%">Año actual</th>
		                <th width="12.5%">Año pasado</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($cuentas as $cuenta)
		            <tr>
		                <td>{{$cuenta->enero + $cuenta->febrero + $cuenta->marzo}}</td>
		                <td>{{$cuenta->abril + $cuenta->mayo + $cuenta->junio}}</td>
		                <td>{{$cuenta->julio + $cuenta->agosto + $cuenta->septiembre}}</td>
		                <td>{{$cuenta->octubre + $cuenta->noviembre + $cuenta->diciembre}}</td>
		                <td>{{$cuenta->enero + $cuenta->febrero + $cuenta->marzo +
		                	  $cuenta->abril + $cuenta->mayo + $cuenta->junio}}</td>
		                <td>{{$cuenta->julio + $cuenta->agosto + $cuenta->septiembre +
		                	  $cuenta->octubre + $cuenta->noviembre + $cuenta->diciembre}}</td>
		                <td>{{$cuenta->actual}}</td>
		                <td>{{$cuenta->anterior}}</td>
		            </tr>
		           @endforeach
		        </tbody>
		    </table>	
		  </div>
		</div>
	  </div>
	</div>
	<br>
	<div class="row">
      <div class="col-lg-12">
        <div class="widget-container fluid-height clearfix">
          <div class="widget-content padded clearfix">
			<table id="example3" class="table table-striped" style="width:100%;">
				<h4 align="center">Año Anterior</h4>
		        <thead>
		            <tr>
		                <th width="1.2%">En</th>
		                <th width="1.2%">Febr</th>
		                <th width="1.2%">Mzo</th>
		                <th width="1.2%">Abr</th>
		                <th width="1.2%">My</th>
		                <th width="1.2%">Jun</th>
		                <th width="1.2%">Jul</th>
		                <th width="1.2%">Ag</th>
		                <th width="1.2%">Sept</th>
		                <th width="1.2%">Oct</th>
		                <th width="1.2%">Nov</th>
		                <th width="1.2%">Dic</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($cuentas as $cuenta)
		            <tr>
		                <td>{{$cuenta->eneroPasado}}</td>
		                <td>{{$cuenta->febreroPasado}}</td>
		                <td>{{$cuenta->marzoPasado}}</td>
		                <td>{{$cuenta->abrilPasado}}</td>
		                <td>{{$cuenta->mayoPasado}}</td>
		                <td>{{$cuenta->junioPasado}}</td>
		                <td>{{$cuenta->julioPasado}}</td>
		                <td>{{$cuenta->agostoPasado}}</td>
		                <td>{{$cuenta->septiembrePasado}}</td>
		                <td>{{$cuenta->octubrePasado}}</td>
		                <td>{{$cuenta->noviembrePasado}}</td>
		                <td>{{$cuenta->diciembrePasado}}</td>
		            </tr>
		           @endforeach
		        </tbody>
		    </table>	
		  </div>
		</div>
	  </div>
	</div>
</div>



<script type="text/javascript">

	$(document).ready(function() {
	    $('#example').DataTable();
	    $('#example2').DataTable();
	    $('#example3').DataTable();
	} );
</script>
	<!-- end DataTables Example -->

@endsection