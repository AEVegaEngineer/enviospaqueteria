@extends('layouts.dashboardLayout')

@section('content')

<!-- ======= Alertas ======= -->
@include('alerts.alerts')

<!-- ======= Cta Section ======= -->
  
@include('templates.envios.listaenvios')

<!-- End Cta Section -->


</main><!-- End #main -->

@endsection