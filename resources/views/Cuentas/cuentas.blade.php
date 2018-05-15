@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')

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
		                <td>{{$cuenta->en}}</td>
		                <td>{{$cuenta->feb}}</td>
		                <td>{{$cuenta->mrz}}</td>
		                <td>{{$cuenta->abr}}</td>
		                <td>{{$cuenta->my}}</td>
		                <td>{{$cuenta->jun}}</td>
		                <td>{{$cuenta->jul}}</td>
		                <td>{{$cuenta->ag}}</td>
		                <td>{{$cuenta->sept}}</td>
		                <td>{{$cuenta->oct}}</td>
		                <td>{{$cuenta->nov}}</td>
		                <td>{{$cuenta->dic}}</td>
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
	} );
</script>
	<!-- end DataTables Example -->

@endsection