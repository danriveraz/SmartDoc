@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<!--Realizado por Daniel Alejandro Rivera, ing-->
<!-- DataTables Example -->
<div>	
	<a class="btn btn-pill btn-primary" href="{{url('/Servicio')}}" title="Volver">
		<span class="fa fa-chevron-left" style="margin-right: 0px;">
		</span>
	</a>
</div>
<br>
<div class="container">
  <div class="row">
      <div class="col-lg-12">
        <div class="widget-container fluid-height clearfix">
          <div class="widget-content padded clearfix">
			<table id="example" class="table table-striped" style="width:100%">
		        <thead>
		            <tr>
		            	<th></th>
		                <th width="8.33%">En</th>
		                <th width="8.33%">Febr</th>
		                <th width="8.33%">Mzo</th>
		                <th width="8.33%">Abr</th>
		                <th width="8.33%">My</th>
		                <th width="8.33%">Jun</th>
		                <th width="8.33%">Jul</th>
		                <th width="8.33%">Ag</th>
		                <th width="8.33%">Sept</th>
		                <th width="8.33%">Oct</th>
		                <th width="8.33%">Nov</th>
		                <th width="8.33%">Dic</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($cuentas as $cuenta)
		            <tr>
		            	<td>{{$cuenta->titulo}}</td>
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
		           <tr>
		            	<td>Cartera</td>
		            	@foreach($cartera as $c)
		                <td>
		                	{{$c}}
		                </td>
		                @endforeach		               
		            </tr>
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
		            	<th width="11.11%"> </th>
		                <th width="11.11%">1er tri</th>
		                <th width="11.11%">2do tri</th>
		                <th width="11.11%">3er tri</th>
		                <th width="11.11%">4to tri</th>
		                <th width="11.11%">1er sem</th>
		                <th width="11.11%">2do sem</th>
		                <th width="11.11%">Año actual</th>
		                <th width="11.11%">Año pasado</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($cuentas as $cuenta)
		            <tr>
		            	<td>{{$cuenta->titulo}}</td>
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
		           <tr>
		           		<td>Cartera</td>
		           		<td>{{$cartera[0]+$cartera[1]+$cartera[2]}}</td>
		           		<td>{{$cartera[3]+$cartera[4]+$cartera[5]}}</td>
		           		<td>{{$cartera[6]+$cartera[7]+$cartera[8]}}</td>
		           		<td>{{$cartera[9]+$cartera[10]+$cartera[11]}}</td>
		           		<td>{{$cartera[0]+$cartera[1]+$cartera[2]+$cartera[3]+$cartera[4]+$cartera[5]}}</td>
		           		<td>{{$cartera[6]+$cartera[7]+$cartera[8]+$cartera[9]+$cartera[10]+$cartera[11]}}</td>
		           		<td>{{$cartera[0]+$cartera[1]+$cartera[2]+$cartera[3]+$cartera[4]+$cartera[5]+$cartera[6]+$cartera[7]+$cartera[8]+$cartera[9]+$cartera[10]+$cartera[11]}}</td>
		           		<td>{{$carteraAnterior[0]+$carteraAnterior[1]+$carteraAnterior[2]+$carteraAnterior[3]+$carteraAnterior[4]+$carteraAnterior[5]+$carteraAnterior[6]+$carteraAnterior[7]+$carteraAnterior[8]+$carteraAnterior[9]+$carteraAnterior[10]+$carteraAnterior[11]}}</td>

		           </tr>
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
		                <th></th>
		                <th width="8.33%">En</th>
		                <th width="8.33%">Febr</th>
		                <th width="8.33%">Mzo</th>
		                <th width="8.33%">Abr</th>
		                <th width="8.33%">My</th>
		                <th width="8.33%">Jun</th>
		                <th width="8.33%">Jul</th>
		                <th width="8.33%">Ag</th>
		                <th width="8.33%">Sept</th>
		                <th width="8.33%">Oct</th>
		                <th width="8.33%">Nov</th>
		                <th width="8.33%">Dic</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@foreach($cuentas as $cuenta)
		            <tr>
		            	<td>{{$cuenta->titulo}}</td>
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
		           <tr>
		            	<td>Cartera</td>
		            	@foreach($carteraAnterior as $c)
		                <td>
		                	{{$c}}
		                </td>
		                @endforeach			               
		            </tr>
		        </tbody>
		    </table>	
		  </div>
		</div>
	  </div>
	</div>
</div>



<script type="text/javascript">

	$(document).ready(function() {
		$('#example').DataTable( {
	        dom: 'lBfrtip',
	        buttons: [
	            {
	                extend:    'excelHtml5',
	                text:      '<i class="fa fa-file-excel-o"></i>',
	                titleAttr: 'Descarga Excel'
	            },
	            {
	                extend:    'pdfHtml5',
	                text:      '<i class="fa fa-file-pdf-o"></i>',
	                titleAttr: 'Descarga PDF'
	            }
	        ]
    	} );
	    
	    $('#example2').DataTable( {
	        dom: 'lBfrtip',
	        buttons: [
	            {
	                extend:    'excelHtml5',
	                text:      '<i class="fa fa-file-excel-o"></i>',
	                titleAttr: 'Descarga Excel'
	            },
	            {
	                extend:    'pdfHtml5',
	                text:      '<i class="fa fa-file-pdf-o"></i>',
	                titleAttr: 'Descarga PDF'
	            }
	        ]
    	} );
	    
	    $('#example3').DataTable( {
	        dom: 'lBfrtip',
	        buttons: [
	            {
	                extend:    'excelHtml5',
	                text:      '<i class="fa fa-file-excel-o"></i>',
	                titleAttr: 'Descarga Excel'
	            },
	            {
	                extend:    'pdfHtml5',
	                text:      '<i class="fa fa-file-pdf-o"></i>',
	                titleAttr: 'Descarga PDF'
	            }
	        ]
    	} );
	} );
</script>
	<!-- end DataTables Example -->

@endsection