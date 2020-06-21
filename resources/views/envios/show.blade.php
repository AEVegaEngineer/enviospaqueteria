@extends('layouts.dashboardLayout')

@section('content')

<!-- ======= Alertas ======= -->
@include('alerts.alerts')

<!-- ======= Cta Section ======= -->
  
<section id="listaEnvios">
  <h2 class="form-signin-heading" style="display: inline-block; margin-right: 50px;">Lista de Envios</h2>
  <table class="table">
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
          <a href="#" class="btn btn-sm btn-primary">Test1</a>
          <a href="#" class="btn btn-sm btn-danger">Test2</a>
        </div>
      </td>
    </tbody>
    @endforeach
  </table>
  {!!$envios->render()!!} 
</section>

<!-- End Cta Section -->


</main><!-- End #main -->

@endsection