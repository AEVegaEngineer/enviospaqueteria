<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistema de Envíos</title>
  <meta content="Página web para servicio de envíos de paquetería" name="description">
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
  <link href="{{ asset('css/venobox.css') }}" rel="stylesheet" type="text/css" />
  
  <!-- =======================================================
  * Template Name: OnePage - v2.0.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{ url('/home') }}">EnviosYa</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#banner-inicio">Inicio</a></li>
          <li><a href="#pricing">¿Cómo Funciona?</a></li>
          <li><a href="#about">Sobre Nosotros</a></li>
          <li><a href="#services">Servicios</a></li>
          <!--<li><a href="#portfolio">Portfolio</a></li>-->
          <!--<li><a href="#team">Equipo</a></li>-->
          
          <!--
          <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          -->
          <!--<li><a href="#contact">Contácto</a></li>-->
          <?php if (Auth::user() !== null){ ?>
          <li class="drop-down"><a href="">Mi Perfil</a>
            <ul>
              <li><a href="#" class="btn btn-info">Ver Perfil</a></li>
              <li><a href="#" class="btn btn-secondary">Cerrar Sesión</a></li>
            </ul>
          </li>
          <?php } ?>

        </ul>
      </nav><!-- .nav-menu -->   
      <?php if (Auth::user() === null){ ?>   
      <div class="btn-group ml-5">
        <a href="{{ route('contrato') }}" class="btn btn-success">Registro</a>
        <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
      </div>
      <?php } ?>
      
      <!--
      <button type="button" class="get-started-btn" data-toggle="modal" data-target="#loginModal">
        Iniciar Sesión
      </button>
      -->
    </div>
  </header><!-- End Header -->
  @yield('contenidoFront')
  <!-- ======= Footer ======= -->
  @include('templates.frontFooter')
  <!--
  <div class="col-lg-4 col-md-6 footer-newsletter">
    <h4>Join Our Newsletter</h4>
    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
    <form action="" method="post">
      <input type="email" name="email"><input type="submit" value="Subscribe">
    </form>
  </div>
  -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Template Main JS File -->
  

  <!-- Vendor JS Files -->
  <!--<link href="{{ asset('js/app.js') }}" rel="stylesheet" type="text/css" />-->
  <script src="{{ asset('/js/jquery.min.js') }}" ></script>
  <script src="{{ asset('/js/bootstrap.bundle.min.js') }}" ></script>
  <script src="{{ asset('/js/jquery.easing.min.js') }}" ></script>
  <script src="{{ asset('/js/validate.js') }}" ></script>
  <script src="{{ asset('/js/jquery.waypoints.min.js') }}" ></script>
  <script src="{{ asset('/js/counterup.min.js') }}" ></script>
  <script src="{{ asset('/js/venobox.min.js') }}" ></script>
  <script src="{{ asset('/js/owl.carousel.min.js') }}" ></script>
  <script src="{{ asset('/js/isotope.pkgd.min.js') }}" ></script>
  <script src="{{ asset('/js/aos.js') }}" ></script>
  <script src="{{ asset('/js/main.js') }}"></script>
  <script src="{{ asset('/js/front.js') }}"></script>
  <script src="{{ asset('/js/login-contrato.js') }}"></script>

  <!--
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  -->

  
  <!--<script src="assets/js/main.js"></script>-->


</body>

</html>