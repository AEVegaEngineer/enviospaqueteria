<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">
    <div class="row">
      <div class="col-12">
        <h3 class="text-center">Registro de usuarios</h3>
      </div>
    </div>
    @csrf
    {!!Form::open(['route'=>'usuario.store','method'=>'post'])!!}
    <div class="row mt-5">
      
      <div class="col-12 col-md-6 offset-md-3">
        <p class="text-center">Seleccione el tipo de usuario a registrar</p>
        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">           
          <label class="btn btn-info">
          <input required="" type="radio" name="privilegio" id="personaRadio" autocomplete="off" value="persona"> Persona
          </label>
          <label class="btn btn-warning">
          <input required="" type="radio" name="privilegio" id="comercioRadio" autocomplete="off" value="comercio"> Comercio
          </label>
          <label class="btn btn-success">
          <input required="" type="radio" name="privilegio" id="shoppingRadio" autocomplete="off" value="shopping"> Shopping
          </label>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12 col-md-4">
        <p class="text-center">Correo Electrónico</p>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-md-right">Contraseña</p>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-md-right">Confirme Contraseña</p>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>
    </div>
    <div class="row mt-3 rowPersona">
      <div class="col-12 col-md-4">
        <p class="text-center">Nombres</p>
        <input id="perNombres" type="text" class="form-control @error('perNombres') is-invalid @enderror" name="perNombres" value="{{ old('perNombres') }}" required autocomplete="perNombres" autofocus>

        @error('perNombres')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">Apellidos</p>
        <input id="perApellidos" type="text" class="form-control @error('perApellidos') is-invalid @enderror" name="perApellidos" value="{{ old('perApellidos') }}" required autocomplete="perApellidos" autofocus>

        @error('perApellidos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">DNI</p>
        <input id="perDni" type="number" class="form-control @error('perDni') is-invalid @enderror" name="perDni" value="{{ old('perDni') }}" required autocomplete="perDni" autofocus>

        @error('perDni')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12 col-md-4 offset-md-2">
        <p class="text-center">Teléfono</p>
        <input id="usuTelefono" type="number" class="form-control @error('usuTelefono') is-invalid @enderror" name="usuTelefono" value="{{ old('usuTelefono') }}" required autocomplete="usuTelefono" autofocus>

        @error('usuTelefono')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">Dirección</p>
        <input id="usuDireccion" type="text" class="form-control @error('usuDireccion') is-invalid @enderror" name="usuDireccion" value="{{ old('usuDireccion') }}" required autocomplete="usuDireccion" autofocus>

        @error('usuDireccion')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12 col-md-4 offset-md-4">
        <button type="submit" class="btn btn-outline-light btn-block">
          {{ __('Registrar') }}
        </button>
      </div>
    </div>
    {!!Form::close()!!}
  </div>
</section>
<!-- End Cta Section -->