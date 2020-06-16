<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name', 'Envios Ya') }}</title>
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

      <h1 class="logo mr-auto"><a href="/">{{ config('app.name', 'Envios Ya') }}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#banner-inicio" class="text-decoration-none">Inicio</a></li>          
          <li><a href="#" class="text-decoration-none">Comercios Asociados</a></li>
          <li class="drop-down"><a href="" class="text-decoration-none">Informes</a>
            <ul>
              <?php if (Auth::user()->privilegio != "comercio" || (Auth::user()->privilegio == "comercio" && Auth::user()->comShoppingId == null)){ ?>
                <li><a href="#" class="text-decoration-none">Pagos</a></li>
              <?php } ?>              
              <li><a href="#" class="text-decoration-none">Envíos</a></li>
            </ul>
          </li>          
          <li><a href="#" class="text-decoration-none">Contácto</a></li>
          <?php if (Auth::user() !== null){ ?>
          
          <li class="drop-down">
            <?php if($userdata->shopNombre != null){ ?>
              <a href="" class="text-decoration-none">{{ $userdata->shopNombre }}</a>
            <?php } else if ($userdata->comNombre != null){ ?>
              <a href="" class="text-decoration-none">{{ $userdata->comNombre }}</a>
            <?php } else if ($userdata->perNombre != null){ ?>
              <a href="" class="text-decoration-none">{{ $userdata->perNombre }}</a>
            <?php } ?>
            <ul>
              <li><a href="#" class="text-decoration-none">Ver Perfil</a></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
          </li>
          <?php } ?>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  
  @yield('content')
  <!-- ======= Footer ======= -->
  @include('templates.frontFooter')
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Template Main JS File -->
  

  <!-- Vendor JS Files -->
  <script src="{{ asset('/js/jquery.min.js') }}" ></script>
  <script src="{{ asset('/js/bootstrap.bundle.min.js') }}" ></script>
  <script src="{{ asset('/js/jquery.easing.min.js') }}" ></script>
  <script src="{{ asset('/js/counterup.min.js') }}" ></script>
  <script src="{{ asset('/js/owl.carousel.min.js') }}" ></script>
  <script src="{{ asset('/js/isotope.pkgd.min.js') }}" ></script>
  <script src="{{ asset('/js/aos.js') }}" ></script>
  <script src="{{ asset('/js/main.js') }}"></script>



</body>

</html>