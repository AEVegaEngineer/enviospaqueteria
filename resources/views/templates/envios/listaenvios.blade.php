<section id="listaEnvios">
  <div class="row mt-3">
    <div class="col-md-10 offset-md-1 col-sm-12">
      <h2 class="form-signin-heading text-center" style="display: inline-block; margin-right: 50px;">Lista de Envios</h2>
      <table class="table table-responsive-md">
        <thead>
          <th>Fecha de Registro</th>
          <th>Orígen</th>
          <th>Destino</th>
          <th>Estado</th>
          <th>Costo</th>
          <th>Fecha de Recibido</th>
          <th>Recibido por</th>          
          <th width="170px">Operaciones</th>
        </thead>
        @foreach($envios as $envio)
        <tr>
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
          <td>{{$envio->envEntregadoEn}}</td>
          <td>{{$envio->envEntregadoA}}</td>
          <td>          
            <div class="btn-group">
              <button type="button" id="paqueteDeEnvio{{$envio->envId}}" class="btn btn-sm btn-info">Ver Paquetes</button>
              @if(Auth::user()->privilegio == 5)
                <a href="/comprobante/{{$envio->envId}}" class="btn btn-sm btn-warning">Ver Comprobante</a>
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