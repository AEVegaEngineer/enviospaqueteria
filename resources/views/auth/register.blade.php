@extends('layouts.authLayout')

@section('content')

<!-- ======= Alertas ======= -->
<div class="mt-5"></div>

<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">
    <div class="row">
      <div class="col-12">
        <h3 class="text-center">Registro de usuarios</h3>
        <p class="text-center">Los elementos marcados con * son obligatorios</p>
        @include('alerts.alerts')
      </div>
    </div>
    @csrf
    {!!Form::open(['route'=>'register','method'=>'post','id'=>'registerForm'])!!}
    <div class="row mt-5">
      
      <div class="col-12 col-md-6 offset-md-3">
        <p class="text-center">Seleccione el tipo de usuario a registrar *</p>
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
          <!--
          <label class="btn btn-secondary">
          <input required="" type="radio" name="privilegio" id="empleadoRadio" autocomplete="off" value="4"> Empleado
          </label>
          <label class="btn btn-secondary">
          <input required="" type="radio" name="privilegio" id="adminRadio" autocomplete="off" value="5"> Administrador
          </label>
        -->
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12 col-md-4">
        <p class="text-center">Correo Electrónico *</p>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">Contraseña *</p>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">Confirme Contraseña *</p>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>
    </div>
    <div class="row mt-3 rowPersona ">
      <div class="col-12 col-md-4">
        <p class="text-center">Nombres *</p>
        <input id="perNombres" type="text" class="form-control @error('perNombres') is-invalid @enderror" name="perNombres" value="{{ old('perNombres') }}" required autocomplete="perNombres" autofocus>

        @error('perNombres')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">Apellidos *</p>
        <input id="perApellidos" type="text" class="form-control @error('perApellidos') is-invalid @enderror" name="perApellidos" value="{{ old('perApellidos') }}" required autocomplete="perApellidos" autofocus>

        @error('perApellidos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">DNI *</p>
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
        <p class="text-center">Nombre del comercio *</p>
        <input id="comNombre" type="text" class="form-control @error('comNombre') is-invalid @enderror" name="comNombre" value="{{ old('comNombre') }}" required autocomplete="comNombre" autofocus>

        @error('comNombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">CUIL del comercio *</p>
        <input id="comCuit" type="number" class="form-control @error('comCuit') is-invalid @enderror" name="comCuit" value="{{ old('comCuit') }}" required autocomplete="comCuit" autofocus>

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
        <p class="text-center">Nombre del shopping *</p>
        <input id="shopNombre" type="text" class="form-control @error('shopNombre') is-invalid @enderror" name="shopNombre" value="{{ old('shopNombre') }}" required autocomplete="shopNombre" autofocus>

        @error('shopNombre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">CUIL del shopping *</p>
        <input id="shopCuit" type="number" class="form-control @error('shopCuit') is-invalid @enderror" name="shopCuit" value="{{ old('shopCuit') }}" required autocomplete="shopCuit" autofocus>

        @error('shopCuit')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12 col-md-4">
        <p class="text-center">Teléfono *</p>
        <input id="usuTelefono" type="number" class="form-control @error('usuTelefono') is-invalid @enderror" name="usuTelefono" value="{{ old('usuTelefono') }}" required autocomplete="usuTelefono" autofocus>

        @error('usuTelefono')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">Departamento *</p>
        <select id="dirDepartamento" class="form-control select2 @error('dirDepartamento') is-invalid @enderror" name="dirDepartamento" value="{{ old('dirDepartamento') }}" required autocomplete="dirDepartamento" autofocus style="width:100%; height: 100%;">
          <option selected disabled>Seleccione...</option>
          <option value="Rawson, Villa Krause"><b>Rawson</b> Villa Krause</option>
          <option value="Capital, San Juan"><b>Capital</b> San Juan</option>
          <option value="Chimbas, Villa Paula Albarracín de Constanza"><b>Chimbas</b> Villa Paula Albarracín de Constanza</option>
          <option value="Rivadavia"><b>Rivadavia</b> Rivadavia</option>
          <option value="Pocito, Aberastain"><b>Pocito</b> Aberastain</option>
          <option value="Santa Lucía"><b>Santa Lucía</b> Santa Lucía</option>
          <option value="Caucete"><b>Caucete</b> Caucete</option>
          <option value="Albardón, General San Martín"><b>Albardón</b> General San Martín</option>
          <option value="Sarmiento, Media Agua"><b>Sarmiento</b> Media Agua</option>
          <option value="Jáchal, San José de Jáchal"><b>Jáchal</b> San José de Jáchal</option>
          <option value="25 de Mayo, Santa Rosa"><b>25 de Mayo</b> Santa Rosa</option>
          <option value="San Martín"><b>San Martín</b> San Martín</option>
          <option value="9 de Julio"><b>9 de Julio</b> 9 de Julio</option>
          <option value="Iglesia Rodeo"><b>Iglesia Rodeo</b> </option>
          <option value="Calingasta, Tamberías"><b>Calingasta</b> Tamberías</option>
          <option value="Angaco, Villa del Salvador"><b>Angaco</b> Villa del Salvador</option>
          <option value="Valle Fértil, San Agustín"><b>Valle Fértil</b> San Agustín</option>
          <option value="Ullum, Villa Ibáñez"><b>Ullum</b> Villa Ibáñez</option>
          <option value="Zonda, Villa Basilio Nievas"><b>Zonda</b> Villa Basilio Nievas</option>
        </select>        

        @error('dirDepartamento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="col-12 col-md-4">
        <p class="text-center">Código Postal (Zip Code) *</p>
        <input id="dirZip" type="text" class="form-control @error('dirZip') is-invalid @enderror" name="dirZip" value="{{ old('dirZip') }}" required autocomplete="dirZip" autofocus>

        @error('dirZip')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      
    </div>
    <div class="row mt-3">
      <div class="col-12">
        <p class="text-center">Dirección Linea 1: Localidad / barrio, Calle, Número *</p>
        <input id="dirLinea1" type="text" class="form-control @error('dirLinea1') is-invalid @enderror" name="dirLinea1" value="{{ old('dirLinea1') }}" required autocomplete="dirLinea1" autofocus>

        @error('dirLinea1')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12">
        <p class="text-center">Dirección Linea 2: Piso / Departamento, entre qué calles se encuentra, punto de referencia, indicaciones adicionales para encontrar el domicilio *</p>
        <input id="dirLinea2" type="text" class="form-control @error('dirLinea2') is-invalid @enderror" name="dirLinea2" value="{{ old('dirLinea2') }}" required autocomplete="dirLinea2" autofocus>

        @error('dirLinea2')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <!--
    <div class="row mt-3">
      <div class="col-12 col-md-8">
        <p class="text-center">Ciudad</p>
        <input id="dirCiudad" type="text" class="form-control @error('dirCiudad') is-invalid @enderror" name="dirCiudad" value="{{ old('dirCiudad') }}" required autocomplete="dirCiudad" autofocus>

        @error('dirCiudad')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    
    <div class="row mt-3">
      <div class="col-12 col-md-8">
        <p class="text-center">Provincia</p>
        <input id="dirProvincia" type="text" class="form-control @error('dirProvincia') is-invalid @enderror" name="dirProvincia" value="{{ old('dirProvincia') }}" required autocomplete="dirProvincia" autofocus>

        @error('dirProvincia')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    -->
    
    <div class="row mt-3">
      
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

</main><!-- End #main -->
<script src="{{ asset('js/utils/getDepartamento.js') }}"></script>
@endsection