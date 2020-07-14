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
        <?php $estado = ["En Espera","Entregado a Logística","En Tránsito a Destino","Entregado en Destino"]; ?>
      Lista de Envios {{$estado[$status-1]}}</h2>
      <table class="table table-responsive-md" style="font-size: 14px;">
        <thead>
          <th>Código</th>
          <th>Fecha de Registro</th>
          <th>Orígen</th>
          <th>Destino</th>
          <th>Estado</th>
          <th>Costo</th>
          @if($status == 4)
          <th>Fecha de Recibido</th>
          <th>Recibido por</th>     
          @endif     
          <th width="200px"  style="text-align: center;">Operaciones</th>
        </thead>
        @foreach($envios as $envio)
        <tr>
          <td>{{$envio->envCodigo}}</td>
          <td>{{$envio->created_at}}</td>
          <td>{{$envio->envOrigen}}</td>
          <td>{{$envio->envDestino}}</td>
          <?php if($envio->envEstadoEnvio == 1) { ?>
            <td>En Espera</td>
          <?php } elseif ($envio->envEstadoEnvio == 2) { ?>
            <td>Entregado a Logística</td>
          <?php } elseif ($envio->envEstadoEnvio == 3) { ?>
            <td>En Tránsito a Destino</td>
          <?php } elseif ($envio->envEstadoEnvio == 4) { ?>
            <td>Entregado en Destino</td>
          <?php } ?>
          <td>{{ number_format ( $envio->envCosto , $decimals = 2 , "," , "." ) }}</td>
          @if($status == 4)
          <td>{{$envio->envEntregadoEn}}</td>
          <td>{{$envio->envEntregadoA}}</td>
          @endif
          <td>          
            <div class="btn-group">
              <button type="button" id="paqueteDeEnvio{{$envio->envId}}" class="btn btn-info btn-sm">Paquetes</button>
              @if(Auth::user()->privilegio == 5)
                <a href="/comprobante/{{$envio->envId}}" target="_blank" class="btn btn-warning btn-sm">Comprobante</a>                
              @endif
              @if( (Auth::user()->privilegio == 5 || Auth::user()->privilegio == 4) && $status < 4 && $status != 3 )
                {!!Form::open(['route'=>['envio.update',$envio->envId],'method'=>'PUT'])!!}
                  {!!Form::submit($estado[$status],['class'=>'btn btn-success btn-sm'])!!} 
                {!!Form::close()!!} 
              @elseif( (Auth::user()->privilegio == 5 || Auth::user()->privilegio == 4) && $status == 3 )   
                <button class="btn btn-success btn-sm" id="btnEntregar{{$envio->envId}}">Entregado</button>
              @endif
            </div>
          </td>
        </tr>
        @endforeach
      </table>
      {!!$envios->render()!!} 
    </div>
  </div>  
</section>

<!-- Modal -->
<div id="modalListaPaquetes" class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Lista de Paquetes</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>        
      </div>
      <div class="modal-body">
        <table class="table table-responsive-md" id="tablaListaPaquetes">
          <thead>            
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Alto</th>
            <th>Ancho</th>
            <th>Largo</th>
            <th>Peso</th>
          </thead>
          
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@if( $status == 3 )   
<!-- Modal para ingresar los detalles de entrega en destino, solo se debe mostrar en status 3 -->
<div id="modalDetallesEntrega" class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    {!!Form::open(['route'=>['envio.update',1],'method'=>'PUT'])!!}
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
            <input type="text" class="form-control" name="envEntregadoEn" id="envEntregadoEn">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <p>Comprobante de Entrega</p>
            <input type="file" class="form-control" style="min-height: 200px" name="envComprobanteEntrega" id="envComprobanteEntrega">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        {!!Form::submit($estado[$status],['class'=>'btn btn-success'])!!} 
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    {!!Form::close()!!}
  </div>
</div>
@endif