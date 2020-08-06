@extends('layouts.dashboardLayout')

@section('content')


<!-- Sección de registro de envios -->
  
<section id="envios" class="envios">
  <div class="container" data-aos="fade-up">
    
    <div class="section-title mt-5">
      <!-- ======= Alertas ======= -->
      <div class="col-12 col-md-6 offset-md-3">
        @include('alerts.alerts')
      </div>      
      <h2>Registro de envíos</h2>
      <p>Ingrese los datos del envío</p>
    </div>

    <div class="row mt-5">
      <div class="col-12">
        <form method="POST" action="{{ route('envio.store') }}" role="form" class="php-email-form">
          @csrf   
          <div class="row">
            <div class="col-12 col-md-4">
              <div class="info text-right">
                
              </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body ml-3">
                  <input type="hidden" name="envOrigen" value="{{$origen->dirId}}">
                  <label class="form-check-label" >
                    <i class="icofont-google-map"></i> Dirección de origen del envío:  {{$origen->dirLinea1}}, {{$origen->dirLinea2}}, {{$origen->dirCiudad}}, {{$origen->dirProvincia}}, {{$origen->dirDepartamento}}, {{$origen->dirZip}}
                  </label>        

                  <a href="/direccion/{{$origen->dirId}}/edit" class="btn btn-secondary btn-sm">Editar esta dirección</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body ml-3">
                  <input type="hidden" name="envDestino" value="{{$destino->dirId}}">
                  <label class="form-check-label" >
                    <i class="icofont-google-map"></i> Dirección de destino del envío:  {{$destino->dirLinea1}}, {{$destino->dirLinea2}}, {{$destino->dirCiudad}}, {{$destino->dirProvincia}}, {{$destino->dirDepartamento}}, {{$destino->dirZip}}
                  </label>        

                  <a href="/direccion/{{$destino->dirId}}/edit" class="btn btn-secondary btn-sm">Editar esta dirección</a>
                </div>
              </div>
            </div>
          </div>
          <!--
          <div class="form-row">
            <div class="col-12">
              <div class="text-center m-5">
                <button class="btn btn-lg btn-info" id="addPaqueteToListaPaquetes">Agregar Nuevo Paquete al Envío</button>
              </div>              
            </div>            
          </div>
          -->
          
          <div class="form-row mt-3">
            <div class="col-12 col-md-2">
              <div class="info text-right">
                Descripción del Paquete
              </div>
            </div>
            <div class="col-12 col-md-4 form-group">
              <input type="text" name="paqDescripcion" id="paqDescripcion" class="form-control" placeholder="Descripción del paquete" data-rule="minlen:10" data-msg="Por favor, ingresá al menos 10 caracteres" value="Paquete de envío estándar" readonly="" required="" />
              @error('paqDescripcion')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div> 
            <div class="col-12 col-md-2">
              <div class="info text-right">
                Cantidad de Paquetes
              </div>
            </div>
            <div class="col-12 col-md-1 form-group">
              <input type="number" name="listCantidadPaq" id="listCantidadPaq" class="form-control" placeholder="Cantidad" value="1" required="" min="1" />@error('listCantidadPaq')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>         
            @if(Auth::user()->privilegio != 2 || (Auth::user()->privilegio == 2 && $userdata->comShoppingId == null))
            <div class="col-12 col-md-2">
              <div class="info text-right">
                Costo del Envío
              </div>
            </div>
            <div class="col-12 col-md-1 form-group">
              @endif
              <input  name="envCosto" id="envCosto" class="form-control" placeholder="Costo del Envío" value="100" readonly="" required="" @if(Auth::user()->privilegio != 2 || (Auth::user()->privilegio == 2 && $userdata->comShoppingId == null)) type="text" @else type="hidden" @endif />
                  @if(Auth::user()->privilegio != 2 || (Auth::user()->privilegio == 2 && $userdata->comShoppingId == null))
                  @error('envCosto')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            @endif
          </div>
          <!--        
          <div class="form-row">
            <div class="col-12 col-md-4">
              <div class="info text-right">
                Alto
              </div>
            </div>
            <div class="col-12 col-md-8 form-group">
              <input type="text" name="paqDescripcion" id="paqDescripcion" class="form-control" placeholder="Descripción del paquete" data-rule="minlen:10" data-msg="Por favor, ingresá al menos 10 caracteres" value="Paquete de envío estándar" />              
            </div>        
          </div>
          

          <div class="row">
            <div class="col-md-12">
              <table class="table table-responsive-md">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Descripción del paquete</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          -->
          <!--
          <div class="form-row">
            </div>
            <div class="col-md-4 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
            <div class="validate"></div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
          
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          -->
          <div class="row">
            <div class="col-12 offset-md-4 col-md-4">
              <div class="text-center">
                <button type="submit" class="btn btn-lg btn-success btn-block">Registrar Envío</button>
              </div>
            </div>
          </div>
          
        </form>

      </div>

    </div>

  </div>
</section>
  
<!-- Fin de sección de registro de envios -->


</main><!-- End #main -->

@endsection