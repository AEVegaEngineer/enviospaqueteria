@extends('layouts.dashboardLayout')

@section('content')


<div class="mt-5"></div>
@if (Auth::user()->privilegio == 5 || Auth::user()->privilegio == 4)

  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">
      <div class="text-center">
        @include('alerts.alerts')
        <h3>Bienvenido al Panel Administrativo del Sistema de Envíos</h3>
        @if (isset($enviosEnEspera))
          <p>Se han detectado envíos para los que no se han impreso sus comprobantes y siguen en espera</p>
          <a class="btn btn-outline-light" href="/en-espera">Ver envíos en espera</a>
        @else
          <p>Seleccione una opción del menú superior para continuar</p>
        @endif
        
      </div>
    </div>
  </section>
@else
  
  <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <!-- ======= Alertas ======= -->
      <div class="row">
        <div class="col-12 col-md-4 offset-md-4">
          @include('alerts.alerts')
        </div>
      </div>
      
      <div class="container" data-aos="zoom-in">
        <div class="text-center">
        	@if (Auth::user()->privilegio == 1)
          	<h3>¡Ya estas listo para comenzar!</h3>
          	<p>No esperes más, hacé clic aquí para comenzar a gestionar tu envío</p>
            <a class="btn btn-outline-light" href="/direccion">Comenzar</a>
         	@endif
         	@if (Auth::user()->privilegio == 3)
          	<h3>Invitá a registrarse a tus comercios afiliados o realizá envíos ahora!</h3>
          	<p>No esperes más, hacé clic aquí para comenzar a gestionar tu envío</p>
            <a class="btn btn-outline-light" href="/direccion">Comenzar</a>
         	@endif
          @if (Auth::user()->privilegio == 2)
            @if ($userdata->comShoppingId == null)
              <h3>¿Tu comercio se encuentra afiliado con un shopping?</h3>
              <p>Establecé aquí tu afiliación con tu shopping huesped</p>
              <a class="btn btn-outline-light" href="/usuario/{{Auth::user()->id}}/edit">Establecer Afiliación</a>
              <p class="pt-5">O podés comenzar ya a gestionar tus envíos</p>
              <a class="btn btn-outline-light" href="/direccion">Gestionar Envío</a>
            @else
              <h3>¡Ya estas listo para comenzar!</h3>
              <p>No esperes más, hacé clic aquí para comenzar a gestionar tu envío</p>
              <a class="btn btn-outline-light" href="/direccion">Comenzar</a>
            @endif
          @endif
          @if (isset($envios) && !$envios->isEmpty())
            <p class="mt-3">Para ver tus envíos haz clic aquí</p>
            <a class="btn btn-outline-light" href="/envio">Ver envíos</a>
          @endif
        </div>
      </div>
    </section>
  <!-- End Cta Section -->
@endif
</main><!-- End #main -->

@endsection