@extends('layouts.frontPageLayout')

@section('contenidoFront')

<!-- ======= Alertas ======= -->
@include('alerts.alerts')

<!-- ======= Hero Section ======= -->

<section id="hero" class="d-flex align-items-center">
  <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center mt-4" id="banner-inicio">
      <div class="col-xl-7 col-lg-9 text-center">
        <h1>EnviosYa</h1>
        <h2>Tu delivery a tiempos inmejorables y calidad premium</h2>
      </div>
    </div>
    <div class="text-center">
      <a href="#" class="btn-get-started scrollto text-decoration-none">Obtené tu cotización ahora!</a>
    </div>

    <div class="row icon-boxes">
      <div class="col-md-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
        <a href="#">
          <div class="icon-box">
            <div class="icon"><i class="ri-stack-line"></i></div>
            <h4 class="title">Servicio para Personas</h4>
            <p class="description">Servicio de paquetería y mensajería a domicilio para personas naturales</p>
          </div>
        </a>
      </div>

      <div class="col-md-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="ri-stack-line"></i></div>
          <h4 class="title"><a href="">Servicio para Comercios</a></h4>
          <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
        </div>
      </div>

      <div class="col-md-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
        <div class="icon-box">
          <div class="icon"><i class="ri-stack-line"></i></div>
          <h4 class="title"><a href="">Servicio para Shoppings</a></h4>
          <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
        </div>
      </div>


    </div>
  </div>
</section>

<!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Sobre Nosotros</h2>
        <p>Excelencia en traslados de mercancía y paquetería</p>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
          </ul>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <a href="#" class="btn-learn-more">Learn More</a>
        </div>
      </div>

    </div>

  </section>
  
  <!-- End About Section -->
</main>
@endsection