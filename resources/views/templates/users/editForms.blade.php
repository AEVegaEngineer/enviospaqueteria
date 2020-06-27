<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">
    <div class="row">
      <div class="text-center">
        <div class="col-12 col-md-8 offset-md-2">
          <form method="PUT" action="{{ route('usuario.update',$userdata->id) }}">
            <div class="container" data-aos="zoom-in">
              <div class="text-center">
                <h3 class="mb-5 mt-3">
                  Perfil de 
                  @if (Auth::user()->privilegio == 1)
                    Usuario
                  @endif
                  @if (Auth::user()->privilegio == 2)
                    Comercio
                  @endif
                  @if (Auth::user()->privilegio == 3)
                    Shopping
                  @endif
                </h3>
                @csrf
                <div class="form-group row">
                  <p class="col-md-8 text-md-right">{{ __('Correo Electrónico') }}</p>                  
                  <div class="col-md-4">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <p class="col-md-8 text-md-right">{{ __('Contraseña') }}</p>

                  <div class="col-md-4">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                  
                @if (Auth::user()->privilegio == 1)
                  <!--persona-->
                  persona
                @endif
                
                @if (Auth::user()->privilegio == 2)
                  <!--comercio-->
                  <div class="form-group row">
                      <p class="col-md-8 text-md-right">{{ __('Nombre del Comercio') }}</p>

                      <div class="col-md-4">
                          <input id="comNombre" type="text" class="form-control @error('comNombre') is-invalid @enderror" name="comNombre" value="{{ old('comNombre') }}" required autocomplete="comNombre" autofocus>

                          @error('comNombre')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                      <p class="col-md-8 text-md-right">{{ __('CUIT del Comercio') }}</p>

                      <div class="col-md-4">
                          <input id="comCuit" type="text" class="form-control @error('comCuit') is-invalid @enderror" name="comCuit" value="{{ old('comCuit') }}" required autocomplete="comCuit" autofocus>

                          @error('comCuit')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                  
                  <div class="form-group row">
                      <p class="col-md-8 text-md-right">{{ __('Si su comercio se encuentra afiliado a algún shopping registrado, seleccionálo de la lista, si no lo está o su shopping no se encuentra en la lista, seleccioná "No"') }}</p>

                      <div class="col-md-4">
                          {!! Form::select('comShoppingId', $comShoppingIds, null, ['class' => 'form-control','required' => 'required']) !!}

                          @error('comShoppingId')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      
                  </div>        
                   
              
                @endif

                @if (Auth::user()->privilegio == 3)
                  <!--shopping-->
                  shopping
                @endif


                <div class="form-group row">
                  <p class="col-md-8 text-md-right">{{ __('Teléfono') }}</p>

                  <div class="col-md-4">
                    <input id="usuTelefono" type="number" class="form-control @error('usuTelefono') is-invalid @enderror" name="usuTelefono" value="{{ old('usuTelefono') }}" required autocomplete="usuTelefono" autofocus>

                    @error('usuTelefono')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div> 
                <div class="form-group row">
                  <p class="col-md-8 text-md-right">{{ __('Dirección') }}</p>

                  <div class="col-md-4">
                    <input id="usuDireccion" type="text" class="form-control @error('usuDireccion') is-invalid @enderror" name="usuDireccion" value="{{ old('usuDireccion') }}" required autocomplete="usuDireccion" autofocus>

                    @error('usuDireccion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div> 
                <div class="row">
                  <div class="col-12 col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-outline-light btn-block">
                      {{ __('Actualizar') }}
                    </button>
                  </div>
                </div>
                <input type="hidden" name="privilegio">
                
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Cta Section -->