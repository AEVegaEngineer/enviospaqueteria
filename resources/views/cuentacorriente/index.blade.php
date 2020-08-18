@extends('layouts.innerLayout')

@section('content')


<!-- Sección de registro de envios -->
  
<section id="envios" class="envios">
  <div class="container" data-aos="fade-up">
    
    <div class="section-title mt-5">
      <!-- ======= Alertas ======= -->
      <div class="col-12 col-md-6 offset-md-3">
        @include('alerts.alerts')
      </div>      
      <h2>Cuentas Corrientes</h2>
      <?php 
      $priv = Auth::user()->privilegio; 
      $userid = Auth::user()->id;
      ?>
      @if( $priv == 5 || $priv == 4 || $priv == 3 )
      <p>Seleccione un Shopping para ver su cuenta corriente</p>
      @endif
    </div>
    <div class="row">
      <div class="col-12 col-md-4">
        <label for="desde">Desde</label>
        <input type="date" name="desde" id="desde" class="form-control">
      </div>
      <div class="col-12 col-md-4">
        <label for="hasta">Hasta</label>
        <input type="date" name="hasta" id="hasta" class="form-control">
      </div>
      <div class="col-12 col-md-4">
        <label for="shopId">Seleccione un shopping</label>
        {!! Form::select('shopId', $shoppings, null, ['class' => 'form-control','required' => 'required', 'id'=>'shopId']) !!}
      </div>
      <input type="hidden" id="_token" value="{{ csrf_token() }}">
    </div>

    <div class="row mt-5">
      <div class="col-12">
        <table id="tablaCuentaCorriente" class="table table-responsive-md" style="font-size: 14px;">
          
        </table>
      </div>

    </div>

  </div>
</section>
  
<!-- Fin de sección de registro de envios -->


</main><!-- End #main -->
<script type="text/javascript">
  const priv = <?php echo $priv; ?>;
  const userid = <?php echo $userid; ?>;
</script>
<script src="{{ asset('js/cuentacorriente/listaCuentaCorriente.js') }}"></script>
@endsection