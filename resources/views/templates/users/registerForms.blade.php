<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">
    <div class="row">
      <div class="col-12">
        <h3 class="text-center">Registro de usuarios</h3>
      </div>
    </div>
    @csrf
    {!!Form::open(['route'=>'usuario.store','method'=>'post','id'=>'registerForm'])!!}
    <div class="row mt-5">
      
      <div class="col-12 col-md-6 offset-md-3">
        <p class="text-center">Seleccione el tipo de usuario a registrar</p>
        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">           
          <label class="btn btn-info">
          <input required="" type="radio" name="privilegio" id="personaRadio" autocomplete="off" value="1"> Persona
          </label>
          <label class="btn btn-warning">
          <input required="" type="radio" name="privilegio" id="comercioRadio" autocomplete="off" value="2"> Comercio
          </label>
          <label class="btn btn-success">
          <input required="" type="radio" name="privilegio" id="shoppingRadio" autocomplete="off" value="3"> Shopping
          </label>
          <label class="btn btn-secondary">
          <input required="" type="radio" name="privilegio" id="empleadoRadio" autocomplete="off" value="4"> Empleado
          </label>
          <label class="btn btn-secondary">
          <input required="" type="radio" name="privilegio" id="adminRadio" autocomplete="off" value="5"> Administrador
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
        <p class="text-center">Contraseña</p>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">Confirme Contraseña</p>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>
    </div>
    <div class="row mt-3 rowPersona ">
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
    <div class="row mt-3 rowComercio ">
      <div class="col-12 col-md-4">
        <p class="text-center">Nombre del comercio</p>
        <input id="comNombre" type="text" class="form-control @error('comNombre') is-invalid @enderror" name="comNombre" value="{{ old('comNombre') }}" required autocomplete="comNombre" autofocus>

        @error('comNombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">CUIL del comercio</p>
        <input id="comCuil" type="number" class="form-control @error('comCuil') is-invalid @enderror" name="comCuil" value="{{ old('comCuil') }}" required autocomplete="comCuil" autofocus>

        @error('comCuil')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">Asociado a Shopping</p>
        {!! Form::select('comShoppingId', $comShoppingIds, null, ['class' => 'form-control','required' => 'required']) !!}
        @error('comShoppingId')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <div class="row mt-3 rowShopping ">
      <div class="col-12 col-md-4 offset-md-2">
        <p class="text-center">Nombre del shopping</p>
        <input id="shopNombre" type="text" class="form-control @error('shopNombre') is-invalid @enderror" name="shopNombre" value="{{ old('shopNombre') }}" required autocomplete="shopNombre" autofocus>

        @error('shopNombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">CUIL del shopping</p>
        <input id="shopCuil" type="number" class="form-control @error('shopCuil') is-invalid @enderror" name="shopCuil" value="{{ old('shopCuil') }}" required autocomplete="shopCuil" autofocus>

        @error('shopCuil')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12 col-md-4">
        <p class="text-center">Teléfono</p>
        <input id="usuTelefono" type="number" class="form-control @error('usuTelefono') is-invalid @enderror" name="usuTelefono" value="{{ old('usuTelefono') }}" required autocomplete="usuTelefono" autofocus>

        @error('usuTelefono')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-8">
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
        <button type="submit" id="btnRegistrar" class="btn btn-outline-light btn-block">
          {{ __('Registrar') }}
        </button>
      </div>
    </div>
    {!!Form::close()!!}
  </div>
</section>
<!-- End Cta Section -->