<section id="listaEnvios">
  <div class="row">
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
        <tbody>
          <td>{{$envio->created_at}}</td>
          <td>{{$envio->envOrigen}}</td>
          <td>{{$envio->envDestino}}</td>
          <td>{{$envio->envEstadoEnvio}}</td>
          <td>{{ number_format ( $envio->envCosto , $decimals = 2 , "," , "." ) }}</td>
          <td>{{$envio->envEntregadoEn}}</td>
          <td>{{$envio->envEntregadoA}}</td>
          <td>          
            <div class="btn-group">
              <button type="button" id="obtenerPaquete{{$envio->envListaPaqueteId}}" ass="btn btn-sm btn-info">Ver Paquetes</button>
            </div>
          </td>
        </tbody>
        @endforeach
      </table>
      {!!$envios->render()!!} 
    </div>
  </div>  
</section>

<!-- Modal -->
<div id="modalListaPaquetes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Lista de Paquetes</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>        
      </div>
      <div class="modal-body">
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
          <tbody>
            <td>{{$envio->created_at}}</td>
            <td>{{$envio->envOrigen}}</td>
            <td>{{$envio->envDestino}}</td>
            <td>{{$envio->envEstadoEnvio}}</td>
            <td>{{ number_format ( $envio->envCosto , $decimals = 2 , "," , "." ) }}</td>
            <td>{{$envio->envEntregadoEn}}</td>
            <td>{{$envio->envEntregadoA}}</td>
            <td>          
              <div class="btn-group">
                <button type="button" id="obtenerPaquete{{$envio->envListaPaqueteId}}" ass="btn btn-sm btn-info">Ver Paquetes</button>
              </div>
            </td>
          </tbody>
          @endforeach
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>