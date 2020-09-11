<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">
    <div class="row">
        <div class="col-12 col-md-4 offset-md-4">
        <!-- ======= Alertas ======= -->
              @include('alerts.alerts')
        </div>      
        <div class="col-12">
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
                @if (Auth::user()->privilegio == 4)
                  Empleado
                @endif
                @if (Auth::user()->privilegio == 5)
                  Administrador
                @endif
              </h3>
              @csrf
              

              
                
              
              
              

              









              <div class="row mt-3">
                <div class="col-12 col-md-4">
                  <p class="text-center">Correo Electrónico</p>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $userdata->email }}" required autocomplete="email" readonly="">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-12 col-md-4">
                  <p class="text-center">Contraseña Anterior</p>
                  <input id="password-old" type="password" class="form-control @error('password') is-invalid @enderror" name="password_old" required autocomplete="new-password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12 col-md-4">
                  <p class="text-center">Nueva Contraseña</p>
                  <input id="password-new" type="password" class="form-control" name="password_new" autocomplete="new-password">
                </div>
              </div>

              @if (Auth::user()->privilegio == 1 || Auth::user()->privilegio == 4 || Auth::user()->privilegio == 5)
              <!--persona-->
              <div class="row mt-3 rowPersona ">
                <div class="col-12 col-md-4">
                  <p class="text-center">Nombres</p>
                  <input id="perNombres" type="text" class="form-control @error('perNombres') is-invalid @enderror" name="perNombres" value="{{ $userdata->perNombres }}" required autocomplete="perNombres" autofocus>

                  @error('perNombres')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12 col-md-4">
                  <p class="text-center">Apellidos</p>
                  <input id="perApellidos" type="text" class="form-control @error('perApellidos') is-invalid @enderror" name="perApellidos" value="{{ $userdata->perApellidos }}" required autocomplete="perApellidos" autofocus>

                  @error('perApellidos')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12 col-md-4">
                  <p class="text-center">DNI</p>
                  <input id="perDni" type="text" class="form-control @error('perDni') is-invalid @enderror" name="perDni" value="{{ $userdata->perDni }}" required autocomplete="perDni" autofocus>

                  @error('perDni')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              @elseif (Auth::user()->privilegio == 2)
              <!--comercio-->
              <div class="row mt-3 rowComercio ">
                <div class="col-12 col-md-4">
                  <p class="text-center">Nombre del comercio</p>
                  <input id="comNombre" type="text" class="form-control @error('comNombre') is-invalid @enderror" name="comNombre" value="{{ $userdata->comNombre }}" required autocomplete="comNombre" autofocus>

                  @error('comNombre')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12 col-md-4">
                  <p class="text-center">CUIL del comercio</p>
                  <input id="comCuit" type="text" class="form-control @error('comCuit') is-invalid @enderror" name="comCuit" value="{{ $userdata->comCuit }}" required autocomplete="comCuit" autofocus>

                  @error('comCuit')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12 col-md-4">
                  <p class="text-center">{{ __('Si su comercio se encuentra afiliado a algún shopping registrado, seleccionálo de la lista, si no lo está o su shopping no se encuentra en la lista, seleccioná "No"') }}</p>
                  {!! Form::select('comShoppingId', $comShoppingIds, $userdata->comShoppingId, ['class' => 'form-control','required' => 'required']) !!}

                  @error('comShoppingId')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              @elseif (Auth::user()->privilegio == 3)
                <!--shopping-->
                <div class="row mt-3 rowShopping ">
                  <div class="col-12 col-md-4 offset-md-2">
                    <p class="text-center">Nombre del shopping</p>
                    <input id="shopNombre" type="text" class="form-control @error('shopNombre') is-invalid @enderror" name="shopNombre" value="{{ $userdata->shopNombre }}" required autocomplete="shopNombre" autofocus>

                    @error('shopNombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="col-12 col-md-4">
                    <p class="text-center">CUIT del shopping</p>
                    <input id="shopCuit" type="text" class="form-control @error('shopCuit') is-invalid @enderror" name="shopCuit" value="{{ $userdata->shopCuit }}" required autocomplete="shopCuit" autofocus>

                    @error('shopCuit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              @endif
              <div class="row mt-3">
                <div class="col-12 col-md-4">
                  <p class="text-center">Teléfono</p>
                  <input id="usuTelefono" type="number" class="form-control @error('usuTelefono') is-invalid @enderror" name="usuTelefono" value="{{ Auth::user()->usuTelefono }}" required autocomplete="usuTelefono" autofocus>

                  @error('usuTelefono')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-12 col-md-4">
                  <p class="text-center">Departamento </p>
                  <select id="dirDepartamento" class="form-control select2 @error('dirDepartamento') is-invalid @enderror" name="dirDepartamento" value="{{ old('dirDepartamento') }}" required autocomplete="dirDepartamento" autofocus style="width:100%; height: 100%;">
                    <option selected disabled value="0">Seleccione...</option>
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
                  <p class="text-center">Código Postal (Zip Code) </p>
                  <input id="dirZip" type="text" class="form-control @error('dirZip') is-invalid @enderror" name="dirZip" value="{{ $userdata->dirZip }}" required autocomplete="dirZip" autofocus>

                  @error('dirZip')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12">
                  <p class="text-center">Dirección Linea 1: Localidad / barrio, Calle, Número </p>
                  <input id="dirLinea1" type="text" class="form-control @error('dirLinea1') is-invalid @enderror" name="dirLinea1" value="{{ $userdata->dirLinea1 }}" required autocomplete="dirLinea1" autofocus>

                  @error('dirLinea1')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-12">
                  <p class="text-center">Dirección Linea 2: Piso / Departamento, entre qué calles se encuentra, punto de referencia, indicaciones adicionales para encontrar el domicilio </p>
                  <input id="dirLinea2" type="text" class="form-control @error('dirLinea2') is-invalid @enderror" name="dirLinea2" value="{{ $userdata->dirLinea2 }}" required autocomplete="dirLinea2" autofocus>

                  @error('dirLinea2')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
    














              <div class="row mt-4">
                <div class="col-12 col-md-4 offset-md-4">
                  <button type="submit" id="btnRegistrar" class="btn btn-outline-light btn-block">
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
<script type="text/javascript">
  $('.select2').select2();
  console.log("editForms")
</script>