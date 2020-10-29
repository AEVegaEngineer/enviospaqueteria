@extends('layouts.innerLayout')

@section('content')



<div class="mt-5"></div>

<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">
    <div class="row">
        <div class="col-12 col-md-12">
          {!!Form::open(['route'=>['paquete.update',$paquete->paqId],'method'=>'PUT'])!!}
          <div class="container" data-aos="zoom-in">
            <div class="text-center">

              <h3 class="mb-5 mt-3">
                Actualizar Paquete
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
                  <input id="paqDescripcion" type="text" placeholder="Ej: Televisor 50 pulgadas" class="form-control @error('paqDescripcion') is-invalid @enderror" name="paqDescripcion" required value="{{$paquete->paqDescripcion}}">
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
                    <option value="''">Pulgada('')</option>
                    <option value="cm">Centímetros(cm)</option>
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
                  <input id="paqDimensionAlto" type="number" step=".1" placeholder="Ej. 150,5" class="form-control @error('paqDimensionAlto') is-invalid @enderror" name="paqDimensionAlto" value="{{$paquete->paqDimensionAlto}}" required >
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
                  <input id="paqDimensionAncho" type="number" step=".1" placeholder="Ej. 150,5" class="form-control @error('paqDimensionAncho') is-invalid @enderror" name="paqDimensionAncho" value="{{$paquete->paqDimensionAncho}}" required >
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
                  <input id="paqDimensionLargo" type="number" step=".1" placeholder="Ej. 150,5" class="form-control @error('paqDimensionLargo') is-invalid @enderror" name="paqDimensionLargo" value="{{$paquete->paqDimensionLargo}}" required >
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
                  <input id="paqPeso" type="number" step=".1" placeholder="Ej. 150,5" class="form-control @error('paqPeso') is-invalid @enderror" name="paqPeso" value="{{$paquete->paqPeso}}" required >
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
                    {{ __('Actualizar') }}
                  </button>
                </div>
              </div>
              
            </div>
          </div>
          {!!Form::close()!!}        
      </div>
    </div>
  </div>
</section>
<!-- End Cta Section -->

</main><!-- End #main -->
<script type="text/javascript">
  $('#paqDimensionUnidad').val("<?php echo $paquete->paqDimensionUnidad ?>");
  $('#paqPesoUnidad').val("<?php echo $paquete->paqPesoUnidad ?>");
</script>
@endsection