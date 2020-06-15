@extends('layouts.dashboardLayout')

@section('content')

<!-- ======= Alertas ======= -->
@include('alerts.alerts')

<!-- ======= Cta Section ======= -->
  
<section id="cta" class="cta mt-4">
  <div class="container" data-aos="zoom-in">
    <div class="text-center">
    	@if (Auth::user()->privilegio == 'persona' || Auth::user()->privilegio == 'comercio')
      	<h3>¡Ya estas listo para comenzar!</h3>
      	<p>No esperes más, hacé clic aquí para comenzar a gestionar tu envío</p>
     	@endif
     	@if (Auth::user()->privilegio == 'shopping')
      	<h3>Registrá tus comercios afiliados o realizá envíos</h3>
      	<p>No esperes más, hacé clic aquí para comenzar a gestionar tu envío</p>
     	@endif
      <a class="cta-btn" href="#">Comenzar</a>
    </div>
  </div>
</section>

<!-- End Cta Section -->


</main><!-- End #main -->

@endsection