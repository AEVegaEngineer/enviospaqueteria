@extends('layouts.innerLayout')

@section('content')

<!-- ======= Cta Section ======= -->
  
<section id="listaEnvios">
  <div class="row mt-3">
    <div class="col-12 col-md-6 offset-md-3">
      <!-- ======= Alertas ======= -->
      @include('alerts.alerts')
    </div>
  </div>
  <div class="row m-2">    
    <div class="col-12 col-md-12">

      
      <h2 class="form-signin-heading text-center" style="display: inline-block; margin-right: 50px;">
        <?php $estado = ["Envío en Espera","Envío Entregado a Logística","Envío en Tránsito a Destino","Envío Entregado en Destino"]; ?>
        Lista de 
        @if($status != 0)
          {{$estado[$status-1]}}
        @else
          Envíos
        @endif
      </h2>
      <input type="hidden" id="_token" value="{{ csrf_token() }}">
      <table id="tablaEnvios" class="table table-responsive-md" style="font-size: 14px;">
        <thead>
          <th>Código</th>
          @if( Auth::user()->privilegio == 3)
          <th>Comercio</th>
          @endif
          <th>Fecha de Registro</th>
          <th>Estado</th>
          @if(Auth::user()->privilegio != 2 || $userdata->comShoppingId == null )
          <th>Costo</th>
          @endif
          @if($status == 4)
          <th>Fecha de Recibido</th>
          <th>Recibido por</th>     
          @endif     
          <th style="text-align: center;">Operaciones</th>
        </thead>
        @foreach($envios as $envio)
        <?php
        //formateando fechas
        $created_at = new DateTime($envio->created_at);
        $envEntregadoEn = new DateTime($envio->envEntregadoEn);        
        ?>
        <tr>
          <td><a href="/seguimiento/{{$envio->envCodigo}}">{{$envio->envCodigo}}</a></td>
          @if( Auth::user()->privilegio == 3)
          <td>{{$envio->comNombre}}</td>
          @endif 
          <td>{{$created_at->format('d-m-Y H:i:s')}}</td>
          <?php if($envio->envEstadoEnvio == 1) { ?>
            <td>En Espera</td>
          <?php } elseif ($envio->envEstadoEnvio == 2) { ?>
            <td>Entregado a Logística</td>
          <?php } elseif ($envio->envEstadoEnvio == 3) { ?>
            <td>En Tránsito a Destino</td>
          <?php } elseif ($envio->envEstadoEnvio == 4) { ?>
            <td>Entregado en Destino</td>
          <?php } ?>

          @if(Auth::user()->privilegio != 2 || $userdata->comShoppingId == null )
          <td>{{ number_format ( $envio->envCosto , $decimals = 2 , "," , "." ) }}</td>
          @endif       

          @if($status == 4)
          <td>
          @if ($envio->envEntregadoEn != null)
          {{$envEntregadoEn->format('d-m-Y H:i:s')}}
          @endif
          </td>
          <td>{{$envio->envEntregadoA}}</td>
          @endif
          <td class="p-1 m-0 text-center">          
            <div class="btn-group">
              <button type="button" id="paqueteDeEnvio{{$envio->envId}}" class="btn btn-info btn-sm" data-toggle="tooltip" title="Detalles del envío">
              	<i class="ri-file-list-3-line"></i>
              </button>
              @if( Auth::user()->privilegio == 5 || Auth::user()->privilegio == 4) 
              	<!-- Botones para comprobantes de envios retirados de origen -->
                @if($envio->envComprobanteImpreso == 0) 
                  <a href="/comprobante/{{$envio->envId}}" target="_blank" class="btn btn-danger btn-sm" id="btnImprimirComprobante{{$envio->envId}}" data-toggle="tooltip" title="Comprobante de retiro en origen NO impreso">
                  	<i class="ri-checkbox-blank-fill"></i>
                  </a>                 
                @else                
                  <a href="/comprobante/{{$envio->envId}}" target="_blank" class="btn btn-secondary btn-sm" id="btnImprimirComprobante{{$envio->envId}}" data-toggle="tooltip" title="Comprobante de retiro en origen impreso">
                  	<i class="ri-checkbox-fill"></i>
                  </a>                
                @endif

              	<!-- Botones para comprobantes de envios a entregar en destino -->
              	@if($envio->envEstadoEnvio == 3) 
                  <a href="/comprobanteEntrega/{{$envio->envId}}" target="_blank" class="btn btn-danger btn-sm" id="btnImprimirComprobanteEntrega{{$envio->envId}}" data-toggle="tooltip" title="Comprobante de entrega en destino">
                  	<i class="ri-article-fill"></i>
                  </a>
                @elseif($envio->envEstadoEnvio == 4)
                  <a href="/comprobanteFirmado/{{$envio->envId}}" target="_blank" class="btn btn-danger btn-sm" id="btnComprobanteFirmado{{$envio->envId}}" data-toggle="tooltip" title="Comprobante de entrega en destino firmado por receptor">
                    <i class="ri-check-double-line"></i>
                  </a>
                @endif


	              @if( $envio->envEstadoEnvio < 4 && $envio->envEstadoEnvio != 3 )
	                {!!Form::open(['route'=>['envio.update',$envio->envId],'method'=>'PUT', 'id' => 'estadoUpdateForm'])!!}   
	                <button class="btn btn-success btn-sm" id="btnStatusUpdate{{$envio->envId}}" data-toggle="tooltip" title="{{$estado[$envio->envEstadoEnvio]}}">
	                	@if($envio->envEstadoEnvio == 1)
	                	<!-- Botón de enviado a logística -->
	                	<i class="ri-archive-line"></i>
	                	@elseif($envio->envEstadoEnvio == 2)
	                	<!-- Botón de tránsito a destino -->
	                	<i class="ri-mail-send-line"></i>
	                	@endif
	                </button>
	                {!!Form::close()!!} 
	              @elseif( $envio->envEstadoEnvio == 3 )   
	                <button class="btn btn-success btn-sm" id="btnEntregar{{$envio->envId}}" data-toggle="tooltip" title="Envio ha sido entregado en destino!">
	                	<i class="ri-mail-check-fill"></i>
	                </button>
	              @endif
	            @endif 
              
            </div>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>  
</section>

<!-- Modal -->
<div id="modalListaPaquetes" class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detalle del envío</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>        
      </div>
      <div class="modal-body">


        <h5 class="modal-title">Detalles del envío</h5>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body ml-3">
                <label class="form-check-label" >
                  <i class="icofont-google-map"></i> Dirección de origen del envío: <span id="dirOrigen"></span> 
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body ml-3">                
              <label class="form-check-label" >
                  <i class="icofont-google-map"></i> Dirección de destino del envío: <span id="dirDestino"></span> 
                </label>
              </div>
            </div>
          </div>
        </div>


        <h5 class="modal-title">Lista de Paquetes</h3>
        <table class="table table-responsive" id="tablaListaPaquetes">
          <thead>            
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Alto</th>
            <th>Ancho</th>
            <th>Largo</th>
            <th>Peso</th>
          </thead>
          
        </table>
        <div class="row">
        	<div class="col-12 col-md-5 offset-md-1">
        		<span><b>Volumen Total: </b></span><span id="spanVolumenTotal"></span>

        	</div>
        	<div class="col-12 col-md-5">
        		<span><b>Peso Total: </b></span><span id="spanPesoTotal"></span>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal para ingresar los detalles de entrega en destino, solo se debe mostrar en status 3 -->
<div id="modalDetallesEntrega" class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    {!!Form::open(['route'=>'comprobanteFirmado.store','method'=>'POST', 'id' => 'formFinalizarEntrega','files'=>'true'])!!}    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingrese los Detalles de la Entrega</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>        
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-6">
              <p>Entregado a</p>
              <input type="text" class="form-control" name="envEntregadoA" id="envEntregadoA">
            </div>
            <div class="col-12 col-md-6">
              <p>fecha de entrega</p>
              <input type="date" class="form-control" name="envEntregadoEn" id="envEntregadoEn" value="{{$fechaHoy}}">
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12">
              <p>Comprobante de Entrega</p>
              <input type="file" class="form-control" style="min-height: 150px" name="envComprobanteEntrega" id="envComprobanteEntrega" accept="application/pdf,image/bmp,  image/jpeg">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="modalDetallesEnvId" id="modalDetallesEnvId">
          <a href="#" class="btn btn-success" id="btnCompletarEntrega">Completar Entrega</a>          
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    {!!Form::close()!!}
  </div>
</div>

<!-- End Cta Section -->


</main><!-- End #main -->

<script src="{{ asset('js/envios/listaEnvios.js') }}"></script>

@endsection