@extends('layouts.dashboardPersonaLayout')

@section('content')

<!-- ======= Alertas ======= -->
@include('alerts.alerts')

<!-- ======= Cta Section ======= -->
  
<section id="cta" class="cta mt-4">
  <div class="container" data-aos="zoom-in">
    <div class="text-center">
      <h3>Todavía no has hecho tu primer envío.</h3>
      <p>No esperes más, hacé clic aquí para comenzar a gestionar tu envío</p>
      <a class="cta-btn" href="#">Comenzar</a>
    </div>
  </div>
</section>

<!-- End Cta Section -->


</main><!-- End #main -->

@endsection