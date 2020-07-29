<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name', 'Autenticación - Envios Ya') }}</title>
  <meta content="Autenticación para servicio de envíos de paquetería" name="description">
  <meta content="web,paquetería,servicio,envios" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
  
  <!-- Vendor CSS Files -->
  
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/aos.css') }}" rel="stylesheet" type="text/css" /> 
  <link href="{{ asset('css/boxicons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/icofont.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/remixicon.css') }}" rel="stylesheet" type="text/css" />  
  <link href="{{ asset('css/estilosPersonalizados.css') }}" rel="stylesheet" type="text/css" />  
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" />  

  <script src="{{ asset('/js/jquery.min.js') }}" ></script>
  <script src="{{ asset('/js/bootstrap.bundle.min.js') }}" ></script>
  <script src="{{ asset('/js/select2.min.js') }}" ></script>
  
  <!-- =======================================================
  * Template Name: OnePage - v2.0.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top mb-5">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="/">{{ config('app.name', 'Autenticación - Envios Ya') }}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->      

    </div>
  </header><!-- End Header -->
  
  @yield('content')
  <!-- ======= Footer ======= -->
  @include('templates.frontFooter')
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>
  <div id="preloaderConsultas"></div>

  <!-- Template Main JS File -->
  

  <!-- Vendor JS Files -->
  
  <script src="{{ asset('/js/jquery.easing.min.js') }}" ></script>
  <script src="{{ asset('/js/counterup.min.js') }}" ></script>
  <script src="{{ asset('/js/owl.carousel.min.js') }}" ></script>
  <script src="{{ asset('/js/isotope.pkgd.min.js') }}" ></script>
  <script src="{{ asset('/js/aos.js') }}" ></script>
  <script src="{{ asset('/js/main.js') }}"></script>
  <script src="{{ asset('/js/envios/create.js') }}"></script>
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>
  <!-- Script solo usado en lista de envios -->
  <script src="{{ asset('js/utils/getJson.js') }}"></script>
  <!-- Script solo usado en lista de usuarios -->
  <script src="{{ asset('js/users/detalleUsuarios.js') }}"></script>
  <!-- Script solo usado registros de usuarios por el admin -->
  <script src="{{ asset('js/users/usuario-register.js') }}"></script>
  <!-- Script solo usado al entregar envíos en destino -->
  <script src="{{ asset('js/envios/entregaEnDestino.js') }}"></script>
  
</body>

</html>