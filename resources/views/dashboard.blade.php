@extends('layouts.dashboardLayout')

@section('content')

<!-- ======= Alertas ======= -->
@include('alerts.alerts')

<!-- ======= Cta Section ======= -->
  
<section id="cta" class="cta mt-5">
  <div class="container" data-aos="zoom-in">
    <div class="text-center">
    	@if (Auth::user()->privilegio == 'persona')
      	<h3>¡Ya estas listo para comenzar!</h3>
      	<p>No esperes más, hacé clic aquí para comenzar a gestionar tu envío</p>
        <a class="cta-btn text-decoration-none" href="/envio/create">Comenzar</a>
     	@endif
     	@if (Auth::user()->privilegio == 'shopping')
      	<h3>Invitá a registrarse a tus comercios afiliados o realizá envíos ahora!</h3>
      	<p>No esperes más, hacé clic aquí para comenzar a gestionar tu envío</p>
        <a class="cta-btn text-decoration-none" href="#">Comenzar</a>
     	@endif
      @if (Auth::user()->privilegio == 'comercio')
        @if ($userdata->comShoppingId == null)
          <h3>¿Tu comercio se encuentra afiliado con un shopping?</h3>
          <p>Establecé aquí tu afiliación con tu shopping huesped</p>
          <a class="cta-btn text-decoration-none" href="#">Establecer Afiliación</a>
          <p class="pt-5">O podés comenzar ya a gestionar tus envíos</p>
          <a class="cta-btn text-decoration-none" href="/envio/create">Gestionar Envío</a>
        @else
          <h3>¡Ya estas listo para comenzar!</h3>
          <p>No esperes más, hacé clic aquí para comenzar a gestionar tu envío</p>
          <a class="cta-btn text-decoration-none" href="/envio/create">Comenzar</a>
        @endif
      @endif
    </div>
  </div>
</section>

<!-- End Cta Section -->


</main><!-- End #main -->

@endsection