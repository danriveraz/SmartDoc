@extends('Layouts.app_administradores')
@section('content')
@include('flash::message')
<div class="modal-shiftfix">
	<div class="container main-content">
      	<div class="row">
      		<div class="col-lg-12">
      			<div class="widget-container fluid-height">
					<div class="col-md-6 text-center" style="border-right: solid 2px rgba(210, 215, 217, 0.75);">
      					<div id="inicio">
							<div class="heading">
								<div class="col-xs-12 col-md-12 text-center" style="color: #9aa0ac">
								  <i class=""></i> PERSONAL
								  <span id="nombre"></span>
								</div>
							</div>
		               		<br>
      		     		</div>
      		     		<div class="widget-container fluid-height">
							<div class="col-md-6 text-center">
								@foreach($personalesIzq as $personal)
								<div class="widget-content padded">
									<div class="profile-info clearfix">
										<label class="pull-left">
											<div class="custom-control custom-checkbox">
					                            <input type="checkbox" id="{{$personal->id}}" class="custom-control-input" name="entities[1][0]" value="{{$personal->id}}" >
					                            <label class="custom-control-label" for="{{$personal->id}}"></label>
											</div>
										</label>
										<img width="80" height="80" class="avatar pull-left" src="images/admin/trabajador.png">
										<div class="profile-details">
											<p class="user-name">{{$personal->nombreCompleto}}</p>
											<p>${{$personal->salario}}</p>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="col-md-6 text-center">
								@foreach($personalesDer as $personal)
								<div class="widget-content padded">
									<div class="profile-info clearfix">
										<label class="pull-left">
											<div class="custom-control custom-checkbox">
					                            <input type="checkbox" id="{{$personal->id}}" class="custom-control-input" name="entities[1][0]" value="{{$personal->id}}" >
					                            <label class="custom-control-label" for="{{$personal->id}}"></label>
											</div>
										</label>
										<img width="80" height="80" class="avatar pull-left" src="images/admin/trabajador.png">
										<div class="profile-details">
											<p class="user-name">{{$personal->nombreCompleto}}</p>
											<p>${{$personal->salario}}</p>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
      				</div>
      				<div class="col-md-6"> 
      					<div id="inicio">
							<div class="heading">
								<div class="col-xs-12 col-md-12 text-center" style="color: #9aa0ac">
								  <i class=""></i> Acá va la agenda...
								  <span id="nombre"></span>
								</div>
							</div>
		               		<br>
      		     		</div>
      				</div>
      			</div>
      		</div>
      	</div>
    </div>
</div>

<style type="text/css">
	@media (min-width: 992px){
	  .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, 
	  .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, 
	  .col-md-11 
	  {float: left;
	   background: #fff;
	  }}

	.avatar {
	    width: 4rem;
	    height: 4rem;
	}
	#inicio{
		border-bottom: solid 2px rgba(210, 215, 217, 0.75);
	}

</style>
@endsection