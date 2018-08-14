		<div class="info-cliente" style="margin-top: 20px;">
				<div class="row" id="toggle">
					<div class="col-md-12 text-center">
					  <a class="invoice-client mrg10T pocketMorado" >Información deL Cliente:</a>
					</div>
				</div>
				<div class="row row-cards">
			        <div class="col-md-4">
				        <div class="invoice-address col-md-12">
				          <div class="input-group">
				            <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>
				            <input id="nombre" class="form-control" placeholder="Nombre" type="text" name="nombre" value="{{$historiaClinica->nombreCompleto}}" disabled="">
				          </div>
				        </div> 
				        <div class="invoice-address col-md-12">
				          <div class="input-group">
				            <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
				            <input id="nit" class="form-control" placeholder="Nit o Identificacion" type="text" name="nit" value="{{$historiaClinica->documento}}" disabled="">
				          </div>
				        </div> 
			        </div>
			        <div class="col-md-4">
				        <div class="invoice-address col-md-12">
				          <div class="input-group">
				            <span class="input-group-addon"><i class="fa fa-volume-control-phone"></i></span>
				            <input id="telefono" class="form-control" placeholder="Telefono" type="text" name="telefono" value="{{$historiaClinica->telefono}}" disabled="">
				          </div>
				        </div> 
				        <div class="invoice-address col-md-12">
				          <div class="input-group">
				            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
				            <input id="direccion" class="form-control" placeholder="Direccion" type="text" name="direccion" value="{{$historiaClinica->direccion}}" disabled="">
				          </div>
				        </div>     
			        </div>
			        <div class="col-md-4">
				        <div class="invoice-address col-md-12">
				          <div class="input-group">
				            <span class="input-group-addon"><i class="fa fa-envelope-open-o"></i></span>
				            <input id="mail" class="form-control" placeholder="Email" type="text" name="mail" value="{{$historiaClinica->email}}" disabled="">
				          </div>
				        </div>      
				    </div>
				</div>        
			</div>   
		    <div class="row row-cards"  style=" margin-top: 80px;">
			    <div class="col-lg-12">
		            <div class="headers clearfix" style="margin-bottom: 10px;">
		            	<div class="row" style="align-items: center; border-bottom: 1px solid #EBECEE; color: #A2A6AC;">
			              	<div class="col-sm-1" style="padding-right: 5px; padding-left: 5px;">Cuota</div>
			                <div class="col-sm-7">Servicio</div>
			                <div class="FactPocket col-sm-2 text-center">Abono</div>
			                <div class="FactPocket col-sm-2 text-right">Saldo</div>
		            	</div>
		            </div>
		            <div class="items" id="tabla" style="margin-bottom: 20px;">
		                <div class="row item" style="align-items: center; padding-bottom: 8px; border-bottom: 1px solid #EBECEE">
		                	<div class="col-sm-1 desc text-center" >{{$cuota}} </div>
		                  	<div class="FactPocket col-sm-7 amount text-left">{{$servicio->procedimiento->nombre}} </div>
		                  	<div class="FactPocket col-sm-2 amount text-center">
		                  		<input  type="number" class="popover-trigger" value="0" style="text-align:right;" onkeyup="validarMinMax();" name="abono" id="abono" max="{{$saldo}}" min="0">  
		                 	</div>
		                  	<div class="FactPocket col-sm-2 amount text-right"> $<?php echo number_format($saldo,0,",","."); ?></div>        
		                </div>
		            </div>
          		</div>
			</div>




		<div class="row">
            <div class="col-lg-12">   
            <div class="col-md-3 pull-right"> 
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-refresh"></i></span>
                    <input class="form-control" id="cambio" disabled="" placeholder="Cambio" type="text" style="color: #20A720; font-weight: bold;">
                  </div>
                </div>            
              </div>                       
              <div class="col-md-3 pull-right"> 
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                    <input class="form-control" placeholder="Efectivo" onkeyup="validarEfectivo();" type="text" id="efectivo">
                  </div>
                </div>            
              </div>   
          </div>
          <div class="col-lg-12"> 
              @if($empresa->tipoRegimen == "comun")
                <br>
                <div class="text-center">
                <strong  style="text-align: center;">Resolución DIAN: {{$empresa->nResolucionFacturacion}} de {{$empresa->fechaResolucion}} del No. {{$empresa->nInicioFactura}} hasta {{$empresa->nFinFactura}}
                </strong>
              </div>
                @endif
            </div>
          </div>  