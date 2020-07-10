@extends('layouts.dashboardLayout')

@section('content')

<!-- ======= Alertas ======= -->
@include('alerts.alerts')

<div class="mt-5"></div>

@include('templates.users.registerForms')

</main><!-- End #main -->

@endsection