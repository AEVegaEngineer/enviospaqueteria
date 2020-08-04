@extends('layouts.dashboardLayout')

@section('content')


<!-- Sección de registro de envios -->
  
<section id="envios" class="envios">
  <div class="container" data-aos="fade-up">
    
    <div class="section-title mt-5">
      <!-- ======= Alertas ======= -->
      <div class="col-12 col-md-6 offset-md-3">
        @include('alerts.alerts')
      </div>      
      <h2>Registro de envíos</h2>
      <p>Confirma las direcciones de orígen y destino del envío</p>
    </div>
    <div class="mt-4">
      <p>Seleccione la dirección de orígen del envío o registre una nueva.</p>
    </div>
    <div class="row mt-2">
      @foreach ($direccionesOrigen as $direccion)
        <div class="card">
          <div class="card-body ml-3">
            <input class="form-check-input" type="radio" value="{{$direccion->dirId}}" name="origen">
            <label class="form-check-label" >
              {{$direccion->dirLinea1}}, {{$direccion->dirLinea2}}, {{$direccion->dirCiudad}}, {{$direccion->dirProvincia}}, {{$direccion->dirDepartamento}}, {{$direccion->dirZip}}
            </label>            
            <a href="/direccion/{{$direccion->dirId}}/edit" class="btn btn-secondary btn-sm">Editar esta dirección</a>
          </div>
        </div>
      @endforeach      
    </div>
    <div class="row">
      <div class="col-12">
        <a href="/direccion/create?dirOrigenDestino=origen" class="btn btn-primary btn-sm">Registrar nueva dirección de orígen del envío</a>
      </div>      
    </div>
    @if($direccionesDestino == [])
    <div class="mt-4">
      <p>Para registrar una dirección de destino, use el siguiente botón.</p>      
    </div>
    @else
    <div class="mt-4">
      <p>Seleccione la dirección de destino del envío o registre una nueva.</p>
    </div>
    @endif
    <div class="row mt-2">
      @foreach ($direccionesDestino as $direccion)
        <div class="card">
          <div class="card-body ml-3">
            <input class="form-check-input" type="radio" value="{{$direccion->dirId}}"  name="destino">
            <label class="form-check-label" >
              {{$direccion->dirLinea1}}, {{$direccion->dirLinea2}}, {{$direccion->dirCiudad}}, {{$direccion->dirProvincia}}, {{$direccion->dirDepartamento}}, {{$direccion->dirZip}}
            </label>
            <a href="/direccion/{{$direccion->dirId}}/edit" class="btn btn-secondary btn-sm">Editar esta dirección</a>
          </div>
        </div>
      @endforeach      
    </div>
    <div class="row">
      <div class="col-12">
        <a href="/direccion/create?dirOrigenDestino=destino" class="btn btn-primary btn-sm">Registrar nueva dirección de destino del envío</a>
      </div>      
    </div>
    <div class="row mt-3">
      <div class="col-12 offset-md-4 col-md-4">
        <div class="text-center">
          <!--<button type="submit" class="btn btn-lg btn-success btn-block">Actualizar Dirección</button>-->
          <a onclick="pasarAEnvio()" href="javascript:void(0);" class="btn btn-lg btn-success btn-block">Siguiente</a>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
function pasarAEnvio()
{  
  const origen = $("input[name='origen']:checked").val();
  const destino = $("input[name='destino']:checked").val();
  location.href = '/envio/create?origen='+origen+"&destino="+destino;
}
  
</script>
<!-- Fin de sección de registro de envios -->


</main><!-- End #main -->

@endsection