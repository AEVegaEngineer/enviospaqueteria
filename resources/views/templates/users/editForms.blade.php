<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
          {!!Form::open(['route'=>['usuario.update',Auth::user()->id],'method'=>'put'])!!}
          
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
                @if (Auth::user()->privilegio == 5)
                  Administrador
                @endif
              </h3>
              @csrf
              <div class="form-group row">
                <p class="col-md-8 text-md-right">{{ __('Correo Electrónico') }}</p>                  
                <div class="col-md-4">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" readonly="">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              
                
              @if (Auth::user()->privilegio == 1)
                <!--persona-->
                <div class="form-group row">
                    <p class="col-md-8 text-md-right">{{ __('Nombres') }}</p>

                    <div class="col-md-4">
                        <input id="perNombres" type="text" class="form-control @error('perNombres') is-invalid @enderror" name="perNombres" value="{{ $userdata->perNombres }}" required autocomplete="perNombres" autofocus>

                        @error('perNombres')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-md-8 text-md-right">{{ __('Apellidos') }}</p>

                    <div class="col-md-4">
                        <input id="perApellidos" type="text" class="form-control @error('perApellidos') is-invalid @enderror" name="perApellidos" value="{{ $userdata->perApellidos }}" required autocomplete="perApellidos" autofocus>

                        @error('perApellidos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-md-8 text-md-right">{{ __('DNI') }}</p>

                    <div class="col-md-4">
                        <input id="perDni" type="text" class="form-control @error('perDni') is-invalid @enderror" name="perDni" value="{{ $userdata->perDni }}" required autocomplete="perDni" autofocus>

                        @error('perDni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
              @endif
              
              @if (Auth::user()->privilegio == 2)
                <!--comercio-->
                <div class="form-group row">
                    <p class="col-md-8 text-md-right">{{ __('Nombre del Comercio') }}</p>

                    <div class="col-md-4">
                        <input id="comNombre" type="text" class="form-control @error('comNombre') is-invalid @enderror" name="comNombre" value="{{ $userdata->comNombre }}" required autocomplete="comNombre" autofocus>

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
                        <input id="comCuit" type="text" class="form-control @error('comCuit') is-invalid @enderror" name="comCuit" value="{{ $userdata->comCuit }}" required autocomplete="comCuit" autofocus>

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
                        {!! Form::select('comShoppingId', $comShoppingIds, $userdata->comShoppingId, ['class' => 'form-control','required' => 'required']) !!}

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
                <div class="form-group row">
                    <p class="col-md-8 text-md-right">{{ __('Nombre del Shopping') }}</p>

                    <div class="col-md-4">
                        <input id="shopNombre" type="text" class="form-control @error('shopNombre') is-invalid @enderror" name="shopNombre" value="{{ $userdata->shopNombre }}" required autocomplete="shopNombre" autofocus>

                        @error('shopNombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-md-8 text-md-right">{{ __('CUIT del Shopping') }}</p>

                    <div class="col-md-4">
                        <input id="shopCuit" type="text" class="form-control @error('shopCuit') is-invalid @enderror" name="shopCuit" value="{{ $userdata->shopCuit }}" required autocomplete="shopCuit" autofocus>

                        @error('shopCuit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
              @endif


              <div class="form-group row">
                <p class="col-md-8 text-md-right">{{ __('Teléfono') }}</p>

                <div class="col-md-4">
                  <input id="usuTelefono" type="number" class="form-control @error('usuTelefono') is-invalid @enderror" name="usuTelefono" value="{{ Auth::user()->usuTelefono }}" required autocomplete="usuTelefono" autofocus>

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
                  <input id="usuDireccion" type="text" class="form-control @error('usuDireccion') is-invalid @enderror" name="usuDireccion" value="{{ Auth::user()->usuDireccion }}" required autocomplete="usuDireccion" autofocus>

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
              <input type="hidden" name="privilegio" value="{{ Auth::user()->privilegio }}">                
              <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            </div>
          </div>
          {!!Form::close()!!}
        <!--</form>-->
        
      </div>
    </div>
  </div>
</section>
<!-- End Cta Section -->