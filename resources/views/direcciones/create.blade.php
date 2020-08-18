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
      <h2>Registro de Direcciones</h2>
      <p>Por favor ingresa los datos de la dirección de {{$dirOrigenDestino}}</p>
    </div>

    <div class="row">
      <div class="col-12">
        <form method="POST" action="{{ route('direccion.store') }}" role="form" class="php-email-form">
          @csrf   
          
          <div>
            @include('templates.envios.dirOrigenRegister')

          </div>   
          <input type="hidden" id="dirOrigenDestino" name="dirOrigenDestino" value="{{$dirOrigenDestino}}">       
          <div class="row mt-3">
            <div class="col-12 offset-md-4 col-md-4">
              <div class="text-center">
                <button type="submit" class="btn btn-lg btn-success btn-block">Registrar Dirección</button>
              </div>
            </div>
          </div>
          
        </form>

      </div>

    </div>

  </div>
</section>
  
<!-- Fin de sección de registro de envios -->


</main><!-- End #main -->

@endsection