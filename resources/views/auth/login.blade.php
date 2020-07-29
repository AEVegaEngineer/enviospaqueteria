




@extends('layouts.authLayout')

@section('content')

<!-- ======= Alertas ======= -->
<div class="mt-5"></div>

<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">
    <div class="row">
      <div class="col-12">
        <h3 class="text-center">Inicio de Sesión</h3>
        @include('alerts.alerts')
      </div>
    </div>
    @csrf
    {!!Form::open(['route'=>'login','method'=>'post','id'=>'loginForm'])!!}
    
    <div class="row mt-3">      
      <div class="col-12 col-md-4 offset-md-4">
        <p class="text-center">Correo Electrónico</p>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>      
    </div>
    <div class="row mt-2">
        <div class="col-12 col-md-4 offset-md-4">
            <p class="text-center">Contraseña</p>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div> 
    <div class="form-group row">
      <div class="col-md-6 offset-md-4">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

          <label class="form-check-label text-center" for="remember">
            {{ __('Recordame') }}
          </label>
        </div>
      </div>
    </div>  
    
    <div class="row mt-4">
      <div class="col-12 col-md-4 offset-md-4">
        <button type="submit" id="btnRegistrar" class="btn btn-outline-light btn-block">
          {{ __('Iniciar Sesión') }}
        </button>
        @if (Route::has('password.request'))
          <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('¿Olvidó su contraseña?') }}
          </a>
        @endif
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12 col-md-4 offset-md-4">
        <p class="text-center">¿No estas registrado aún? Registrate <a href="/register" style="color:cyan;">aquí</a> </p>
      </div>
    </div>
    {!!Form::close()!!}
  </div>
</section>
<!-- End Cta Section -->

</main><!-- End #main -->

@endsection