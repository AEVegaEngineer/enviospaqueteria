@extends('layouts.dashboardLayout')

@section('content')

<!-- ======= Alertas ======= -->
@include('alerts.alerts')
<!-- Sección de registro de envios -->
  
<section id="envios" class="envios">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Registro de envíos</h2>
      <p>Ingrese los datos del envío</p>
    </div>

    <div class="row mt-5">

      <div class="col-lg-4">
        <div class="info">
          <div class="address">
            <i class="icofont-google-map"></i>
            <h4>Location:</h4>
            <p>A108 Adam Street, New York, NY 535022</p>
          </div>

          <div class="email">
            <i class="icofont-envelope"></i>
            <h4>Email:</h4>
            <p>info@example.com</p>
          </div>

          <div class="phone">
            <i class="icofont-phone"></i>
            <h4>Call:</h4>
            <p>+1 5589 55488 55s</p>
          </div>

        </div>

      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12">

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="form-row">
            <div class="col-12 col-md-4">
              <div class="info">
                Indique la dirección de origen del envío
              </div>
            </div>
            <div class="col-12 col-md-8 form-group">
              <input type="text" name="envOrigen" class="form-control" id="envOrigen" placeholder="Ej. Perito Moreno (N) con Libertador 1820" data-rule="minlen:10" data-msg="Por favor, ingresá al menos 10 caracteres" />
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-12 col-md-4">
              <div class="info">
                Indique la dirección de destino del envío
              </div>
            </div>
            <div class="col-12 col-md-8 form-group">
              <input type="text" name="envOrigen" class="form-control" id="envOrigen" placeholder="Ej. Perito Moreno (N) con Libertador 1820" data-rule="minlen:10" data-msg="Por favor, ingresá al menos 10 caracteres" />
              <div class="validate"></div>
            </div>
          </div>
          <!--
          <div class="form-row">
            </div>
            <div class="col-md-4 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
            <div class="validate"></div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
          
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          -->
          <div class="row">
            <div class="col-12 offset-md-4 col-md-4">
              <div class="text-center">
                <button type="submit" class="btn btn-lg btn-success btn-block">Registrar Envío</button>
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