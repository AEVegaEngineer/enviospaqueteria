@extends('layouts.frontPageLayout')

@section('contenidoFront')

<!-- ======= Alertas ======= -->
@include('alerts.alerts')

<main id="main">

  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <?php
      $estado;
      switch ($envio->envEstadoEnvio) {
        case 1:
          $estado = "en espera";
          break;
        case 2:
          $estado = "entregado a logística";
          break;
        case 3:
          $estado = "en tránsito a destino";
          break;
        case 4:
          $estado = "entregado en destino";
          break;
        default:
          $estado = "ERROR: no se puede leer estado del envío";
          break;
      }
      ?>
      <div class="section-title">
        <h2>Seguimiento de envío</h2>
        <p>Su envío actualmente está <b>{{$estado}}</b></p>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="progress">
            @if($envio->envEstadoEnvio >= 1)
            <div class="progress-bar progress-bar-primary" role="progressbar" style="width:25%">
              En Espera
            </div>
            @endif
            @if($envio->envEstadoEnvio >= 2)
            <div class="progress-bar progress-bar-warning" role="progressbar" style="width:25%">
              Entregado a Logística
            </div>
            @endif
            @if($envio->envEstadoEnvio >= 3)
            <div class="progress-bar progress-bar-danger" role="progressbar" style="width:25%">
              En Tránsito a Destino
            </div>
            @endif
            @if($envio->envEstadoEnvio == 4)
            <div class="progress-bar progress-bar-success" role="progressbar" style="width:25%">
              Entregado {{$envio->envEstadoEnvio}}
            </div>
            @endif
          </div>
        </div>
      </div>
      
      

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="icofont-google-map"></i>
              <h4>Localización Actual:</h4>
              <p>Paseo San Juan, San Juan, Argentina, 5400</p>
            </div>

            <div class="email">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>envios@casa2000.com.ar</p>
            </div>

            <div class="phone">
              <i class="icofont-phone"></i>
              <h4>Teléfono:</h4>
              <p>+54 264 554 8855</p>
            </div>

          </div>

        </div>
        <div class="col-lg-8">
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13604.37110365174!2d-68.54787003879397!3d-31.521611729983107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x968141cf3ef29233%3A0xd8e870e0d06725c0!2sPaseo%20San%20Juan!5e0!3m2!1ses-419!2sar!4v1595371523593!5m2!1ses-419!2sar" frameborder="0" allowfullscreen></iframe>

        </div>
      
      </div>

    </div>
  </section>
  
  <!-- End Contact Section -->
</main><!-- End #main -->
@endsection