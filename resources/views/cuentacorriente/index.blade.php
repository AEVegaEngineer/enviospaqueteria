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
      <div class="col-12 col-md-4 offset-md-4">
        {!! Form::select('shopId', $shoppings, null, ['class' => 'form-control','required' => 'required', 'id'=>'shopId']) !!}
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-12">
        
      </div>

    </div>

  </div>
</section>
  
<!-- Fin de sección de registro de envios -->


</main><!-- End #main -->
<script type="text/javascript">
  const priv = <?php echo $priv; ?>;
  const userid = <?php echo $userid; ?>;
  $('select#shopId option:first').attr('disabled', true); 
  if (priv == 3){
    llenarTablaCtaCorriente(userid)
  }

  function llenarTablaCtaCorriente(id){
    id = id || null; // parámetro opcional
    if(id)
      alert("llenar tablas para shopping "+id);
  }
  $('#shopId').change(function(){
    alert("changed")
  });
</script>
@endsection