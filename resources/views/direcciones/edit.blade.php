@extends('layouts.innerLayout')

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
      <p>Actualización de dirección</p>
    </div>

    <div class="row">
      <div class="col-12">
        {!!Form::open(['route'=>['direccion.update',$direccion->dirId],'method'=>'put'])!!}
          @csrf   
          
          <div>
            @include('templates.envios.dirOrigenUpdate')

          </div>   
          <div class="row mt-3">
            <div class="col-12 offset-md-4 col-md-4">
              <div class="text-center">
                <button type="submit" class="btn btn-lg btn-success btn-block">Actualizar Dirección</button>
              </div>
            </div>
          </div>
          
        {!!Form::close()!!}

      </div>

    </div>

  </div>
</section>
  
<!-- Fin de sección de registro de envios -->


</main><!-- End #main -->

@endsection