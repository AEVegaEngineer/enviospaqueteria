@extends('layouts.innerLayout')

@section('content')
<script type="text/javascript">
  var paquetes = JSON.parse('<?php echo $paquetes; ?>');
  var costoPeso = <?php echo $costoPeso; ?>;
  var costoVolumen = <?php echo $costoVolumen; ?>;
</script>

<!-- Sección de registro de envios -->
  
<section id="envios" class="envios">
  <div class="container" data-aos="fade-up">
    
    <div class="section-title mt-5">
      <!-- ======= Alertas ======= -->
      <div class="col-12 col-md-6 offset-md-3">
        @include('alerts.alerts')
      </div>      
      <h2>Registro de envíos</h2>
      <p>Ingrese los datos del envío, los costos del envío se calcularán según el mayor entre el costo por dimensión y el costo por peso para cada paquete, luego se totalizarán todos los costos.</p>
    </div>

    <div class="row mt-5">
      <div class="col-12">
        <form method="POST" action="{{ route('envio.store') }}" id="formListaPaquetes" role="form" class="php-email-form">
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
                Seleccione un paquete
              </div>
            </div>
            <div class="col-12 col-md-4 form-group">
              {!! Form::select('paqDescripcion', $paqDescripciones, $userdata->paqDescripcion, ['class' => 'form-control select2','required' => 'required','id'=>'paqDescripcion']) !!}
              <!--<input type="text" name="paqDescripcion" id="paqDescripcion" class="form-control" placeholder="Descripción del paquete" data-rule="minlen:10" data-msg="Por favor, ingresá al menos 10 caracteres" value="Paquete de envío estándar" readonly="" required="" />-->
              @error('paqDescripcion')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div> 
            <div class="col-12 col-md-2">
              <div class="info text-right">
                Cantidad de paquetes
              </div>
            </div>
            <div class="col-12 col-md-1 form-group">
              <input type="number" name="listCantidadPaq" id="listCantidadPaq" class="form-control" placeholder="Cantidad" value="1" required="" min="1" />@error('listCantidadPaq')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>    
          </div>
          <div class="row mt-3">
            <div class="col-12 col-md-6">
              <p class="text-center">Peso</p>
              <h3 class="text-center" id="lblPeso">0,00</h3>
            </div> 
            <div class="col-12 col-md-6">
              <p class="text-center">Volumen</p>
              <h3 class="text-center" id="lblVolumen">0,00</h3>
            </div>             
          </div>
          <?php if (Auth::user()->privilegio != 2 || (Auth::user()->privilegio == 2 && $userdata->comShoppingId == null)){ ?>
          <div class="row mt-3">
            <div class="col-12 col-md-4">
              <p class="text-center">Costo calculado en base al</p>
              <h3 class="text-center" id="lblBaseCalculo"></h3>
            </div>
            <div class="col-12 col-md-4">
              <p class="text-center">Costo por Kg.</p>
              <h3 class="text-center" id="lblCostoPeso">0,00</h3>
            </div>
            <div class="col-12 col-md-4">
              <p class="text-center">Costo por m&sup3;</p>
              <h3 class="text-center" id="lblCostoVolumen">0,00</h3>
            </div>
          </div>
          <?php } ?>  
          <div class="row mt-3">
            <div class="col-12 offset-md-4 col-md-4">
              <div class="text-center">
                <button type="button" class="btn btn-lg btn-primary btn-block" id="btnAgregarPaquete">Agregar Paquete a Lista de Envío</button>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <table id="tablaListaPaquetes" class="table table-responsive-md table-light">
              <thead>
                <th>Descripción del paquete</th>
                <th>Cantidad</th>
                <th>Costo</th>
                <th>Opciones</th>
              </thead>              
            </table>
          </div>
          
          <input  name="envListaPaquetes" id="envListaPaquetes" type="hidden"/>
          <input  name="envCosto" id="envCosto" type="hidden"/>
          <div class="row mt-5">
            <div class="col-12 offset-md-4 col-md-4">
              <div class="text-center">
                <!--<button type="submit" class="btn btn-lg btn-success btn-block">Registrar Envío</button>-->
                <button type="button" class="btn btn-lg btn-success btn-block" id="registrarEnvio">Registrar Envío</button>
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
<script src="{{ asset('/js/utils/tableHandler.js') }}"></script>
<script src="{{ asset('/js/envios/createTableHandler.js') }}"></script>
<script src="{{ asset('js/utils/dimensionesYPesosHandlers.js') }}"></script>
<script src="{{ asset('/js/envios/create.js') }}"></script>

@endsection