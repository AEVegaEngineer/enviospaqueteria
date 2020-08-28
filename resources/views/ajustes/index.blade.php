@extends('layouts.innerLayout')

@section('content')

<!-- ======= Alertas ======= -->
@include('alerts.alerts')

<div class="mt-5"></div>

<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container" data-aos="zoom-in">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
          {!!Form::open(['route'=>'ajustes.store','method'=>'post'])!!}
          
          <div class="container" data-aos="zoom-in">
            <div class="text-center">

              <h3 class="mb-5 mt-3">
                Ajustes del Sistema
              </h3>
              <p>Introduzca los costos usando punto como decimal y sin signo dolar</p>
              @csrf
              <div class="form-group row">
                <div class="col-12 col-md-4 offset-md-2">
                  <p class="text-md-right">
                    Costo de envío por kilogramo
                  </p>
                </div>               
                <div class="col-md-4">
                  <input id="carCostoKilogramo" type="number" step=".001" class="form-control @error('carCostoKilogramo') is-invalid @enderror" name="carCostoKilogramo" value="" required >

                  @error('carCostoKilogramo')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12 col-md-4 offset-md-2">
                  <p class="text-md-right">
                    Costo de envío por volumen
                  </p>
                </div>               
                <div class="col-md-4">
                  <input id="carCostoVolumen" type="number" step=".001" class="form-control @error('carCostoVolumen') is-invalid @enderror" name="carCostoVolumen" value="" required >

                  @error('carCostoVolumen')
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
              <div class="row pt-3">
                <div class="col-12">
                  <table class="table table-responsive-md table-dark">
                    <thead>
                      <th>Costo por Peso</th>
                      <th>Costo por Volumen</th>
                      <th>Fecha de Ajuste</th>
                    </thead>
                    <?php $count = 0 ?>
                    @foreach($cardexcostos as $cardex)
                    <?php if($count == 0){ $count++;?>
                    <tr class="bg-success">
                    <?php } else { ?>
                    <tr>
                    <?php } ?>
                      <td>$ {{$cardex->carCostoKilogramo}}</td>
                      <td>$ {{$cardex->carCostoVolumen}}</td>
                      <?php $created_at = new DateTime($cardex->created_at) ?>
                      <td>{{$created_at->format('d-m-Y H:i:s')}}</td>
                    </tr>
                    @endforeach
                  </table>
                  {!!$cardexcostos->render()!!} 
                </div>
              </div>
            </div>
          </div>
          {!!Form::close()!!}
        <!--</form>-->
        
      </div>
    </div>
  </div>
</section>
<!-- End Cta Section -->

</main><!-- End #main -->

@endsection