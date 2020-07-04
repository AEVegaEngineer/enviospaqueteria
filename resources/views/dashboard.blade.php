@extends('layouts.dashboardLayout')

@section('content')


<div class="mt-5"></div>
@if (Auth::user()->privilegio == 5)
  <h3>Bienvenido al Panel Administrativo del Sistema de Envíos</h3>
  <p>Seleccione una opción del menú superior para continuar</p>
@else
  @if (!isset($envios) || $envios->isEmpty())
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
            <a class="btn btn-outline-light" href="/envio/create">Comenzar</a>
         	@endif
         	@if (Auth::user()->privilegio == 3)
          	<h3>Invitá a registrarse a tus comercios afiliados o realizá envíos ahora!</h3>
          	<p>No esperes más, hacé clic aquí para comenzar a gestionar tu envío</p>
            <a class="btn btn-outline-light" href="/envio/create">Comenzar</a>
         	@endif
          @if (Auth::user()->privilegio == 2)
            @if ($userdata->comShoppingId == null)
              <h3>¿Tu comercio se encuentra afiliado con un shopping?</h3>
              <p>Establecé aquí tu afiliación con tu shopping huesped</p>
              <a class="btn btn-outline-light" href="/usuario/{{Auth::user()->id}}/edit">Establecer Afiliación</a>
              <p class="pt-5">O podés comenzar ya a gestionar tus envíos</p>
              <a class="btn btn-outline-light" href="/envio/create">Gestionar Envío</a>
            @else
              <h3>¡Ya estas listo para comenzar!</h3>
              <p>No esperes más, hacé clic aquí para comenzar a gestionar tu envío</p>
              <a class="btn btn-outline-light" href="/envio/create">Comenzar</a>
            @endif
          @endif
          
        </div>
      </div>
    </section>
  <!-- End Cta Section -->
  @else
    @include('templates.envios.listaenvios')
  @endif
@endif


</main><!-- End #main -->

@endsection