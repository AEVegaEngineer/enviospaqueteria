@extends('layouts.innerLayout')

@section('content')



<div class="mt-5"></div>

<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">
    <div class="row">
        <div class="col-12 col-md-12">
          
          
          <div class="container" data-aos="zoom-in">
            <div class="text-center">
              {!!Form::open(['route'=>'paquete.store','method'=>'POST'])!!}
                <h3 class="mb-5 mt-3">
                  Definición de Paquetes y Dimensiones
                </h3>
                <!-- ======= Alertas ======= -->
                @include('alerts.alerts')
                <p>Introduzca los datos del paquete y sus dimensiones</p>
                @csrf
                <div class="form-group row">              
                  <div class="col-12 col-md-6">
                    <p class="text-center">
                      Descripción del Paquete
                    </p>
                    <input id="paqDescripcion" type="text" placeholder="Ej: Televisor 50 pulgadas" class="form-control @error('paqDescripcion') is-invalid @enderror" name="paqDescripcion" value="" required >
                    @error('paqDescripcion')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-12 col-md-3">
                    <p class="text-center">
                      Unidad de dimensiones
                    </p>
                    <select class="form-control" id="paqDimensionUnidad" name="paqDimensionUnidad">
                      <option value="mm">Milímetros(mm)</option>
                      <option value="in">Pulgada(in)</option>
                      <option value="cm" selected>Centímetros(cm)</option>
                      <option value="m">Metros(m)</option>
                    </select>
                    @error('carCostoKilogramo')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>                
                  <div class="col-12 col-md-3">
                    <p class="text-center">
                      Unidad de peso
                    </p>
                    <select class="form-control" id="paqPesoUnidad" name="paqPesoUnidad">
                      <option value="mg">Miligramos(mg)</option>
                      <option value="gr" selected>Gramos(gr)</option>
                      <option value="oz">Onza(oz)</option>
                      <option value="kg">Kilogramos(kg)</option>
                      <option value="lb">Libra(lb)</option>                    
                      <option value="t">Tonelada(t)</option>
                    </select>
                    @error('carCostoKilogramo')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row"> 
                  <div class="col-12 col-md-3">
                    <p class="text-center">
                      Alto
                    </p>
                    <input id="paqDimensionAlto" type="number" step=".1" placeholder="Ej. 150,5" class="form-control @error('paqDimensionAlto') is-invalid @enderror" name="paqDimensionAlto" value="" required >
                    @error('paqDimensionAlto')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>                
                  <div class="col-12 col-md-3">
                    <p class="text-center">
                      Ancho
                    </p>
                    <input id="paqDimensionAncho" type="number" step=".1" placeholder="Ej. 150,5" class="form-control @error('paqDimensionAncho') is-invalid @enderror" name="paqDimensionAncho" value="" required >
                    @error('paqDimensionAncho')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="col-12 col-md-3">
                    <p class="text-center">
                      Largo
                    </p>
                    <input id="paqDimensionLargo" type="number" step=".1" placeholder="Ej. 150,5" class="form-control @error('paqDimensionLargo') is-invalid @enderror" name="paqDimensionLargo" value="" required >
                    @error('paqDimensionLargo')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>                
                  <div class="col-12 col-md-3">
                    <p class="text-center">
                      Peso
                    </p>
                    <input id="paqPeso" type="number" step=".1" placeholder="Ej. 150,5" class="form-control @error('paqPeso') is-invalid @enderror" name="paqPeso" value="" required >
                    @error('paqPeso')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                
                <div class="row mt-5">
                  <div class="col-12 col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-outline-light btn-block">
                      {{ __('Registrar') }}
                    </button>
                  </div>
                </div>
              {!!Form::close()!!}
              <div class="row mt-5">
                <div class="col-12">
                  <table class="table table-responsive-md table-dark">
                    <thead>
                      <th>Descripción</th>
                      <th>Alto</th>
                      <th>Ancho</th>
                      <th>Largo</th>
                      <th>Peso</th>
                      <th>Fecha Registro</th>
                      <th>Opciones</th>
                    </thead>                    
                    @foreach($paquetes as $paquete)                    
                    <tr>
                      <td>{{$paquete->paqDescripcion}}</td>
                      <td>{{number_format($paquete->paqDimensionAlto, 2, ',', '.')}} {{$paquete->paqDimensionUnidad}}</td>
                      <td>{{number_format($paquete->paqDimensionAncho, 2, ',', '.')}} {{$paquete->paqDimensionUnidad}}</td>
                      <td>{{number_format($paquete->paqDimensionLargo, 2, ',', '.')}} {{$paquete->paqDimensionUnidad}}</td>
                      <td>{{number_format($paquete->paqPeso, 2, ',', '.')}} {{$paquete->paqPesoUnidad}}</td>
                      <?php $created_at = new DateTime($paquete->created_at) ?>
                      <td>{{$created_at->format('d-m-Y H:i:s')}}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Grupo de botones de opciones de paquetes">
                          <!-- Editar -->
                          <a href="/paquete/{{$paquete->paqId}}/edit" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Editar">
                            <i class="ri-edit-2-fill"></i>
                          </a>                                                   
                          <!-- Eliminar -->
                          {!!Form::open(['route'=>['paquete.destroy',$paquete->paqId],'method'=>'DELETE'])!!}
                          <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar">
                            <i class="ri-eraser-fill"></i>
                          </button>
                          {!!Form::close()!!}  
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </table>
                  {!!$paquetes->render()!!} 
                </div>
              </div>
            </div>
          </div>
                  
      </div>
    </div>
  </div>
</section>
<!-- End Cta Section -->

</main><!-- End #main -->

@endsection