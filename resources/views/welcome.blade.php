@extends('layouts.frontPageLayout')

@section('contenidoFront')

<!-- ======= Alertas ======= -->
@include('alerts.alerts')

<!-- ======= Hero Section ======= -->

<section id="hero" class="d-flex align-items-center">
  <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center mt-4" id="banner-inicio">
      <div class="col-xl-7 col-lg-9 text-center">
        <h1>EnviosYa</h1>
        <h2>Tu delivery a tiempos inmejorables y calidad premium</h2>
      </div>
    </div>
    <div class="text-center">
      <a href="/contrato" class="btn-get-started scrollto text-decoration-none">Obtené tu cotización ahora!</a>
    </div>    
  </div>
</section>

<!-- End Hero -->

<main id="main">

  <!-- ======= Pricing Section ======= -->
  
  <section id="pricing" class="pricing">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Una nueva forma de realizar tus envíos</h2>
        <p>Ahora podés realizar envíos y hacer seguimiento las 24 hs, desde la comodidad de tu casa u oficina.</p>
      </div>

      <div class="row">

        <div class="col-lg-3 col-md-6" data-aos="zoom-im" data-aos-delay="100">
          <div class="box">
            <h4>1</h4>
            <h3>Registráte</h3>            
            <p>Completá el registro para comenzar</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="zoom-im" data-aos-delay="100">
          <div class="box">
            <h4>2</h4>
            <h3>Crea un nuevo envío</h3>            
            <p>Ingresa todos los datos requeridos y registra tu nuevo envío</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="zoom-im" data-aos-delay="100">
          <div class="box">
            <h4>3</h4>
            <h3>Aboná</h3>            
            <p>Realizá el pago por cualquiera de nuestras plataformas de pago disponibles</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="zoom-im" data-aos-delay="100">
          <div class="box">
            <h4>4</h4>
            <h3>Envialo</h3>
            <p>Realizá el envío y haz seguimiento de tus paquetes en todo momento</p>
          </div>
        </div>

      </div>

    </div>
  </section>
  
  <!-- End Pricing Section -->

  <!-- ======= About Section ======= -->
  
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Sobre Nosotros</h2>
        <p>Excelencia en traslados de mercancía y paquetería</p>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
          </ul>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum.
          </p>
          <a href="#" class="btn-learn-more">Learn More</a>
        </div>
      </div>

    </div>

  </section>
  




  <!-- ======= Services Section ======= -->
  
  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Servicios</h2>
        <p>Enviá tu paquetería a cualquier destino dentro de El Gran San Juan, tenemos servicios que se ajustan a tus necesidades</p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box iconbox-blue">
            <div class="icon">
              <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
              </svg>
              <i class="ri-home-4-fill"></i>
            </div>
            <h4>Personas</h4>
            <ul>
              <li>Servicio a domicilio</li>
              <li>No se requiere ser responsable inscripto</li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box iconbox-orange ">
            <div class="icon">
              <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
              </svg>
              <i class="ri-building-fill"></i>
            </div>
            <h4>Comercios</h4>
            <ul>
              <li>Facilitamos la logística a PYMES y altos comercios</li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box iconbox-pink">
            <div class="icon">
              <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
              </svg>
              <i class="ri-building-4-fill"></i>
            </div>
            <h4>Shoppings</h4>
            <ul>
              <li>Gestiona la paquetería de tus comercios afiliados</li>
              <li>Lleva un mejor control sobre lo que entra y sale de tus instalaciones</li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </section>
  
  <!-- End Sevices Section -->

  <!-- ======= Cta Section ======= -->
  
  <section id="cta" class="cta">
    <div class="container" data-aos="zoom-in">
      <div class="text-center">
        <h3>¡El mejor servicio al mas bajo precio!</h3>
        <p> ¡No esperés más y comenzá a enviar ya!</p>
        <a class="cta-btn" href="/contrato">Registráte</a>
      </div>
    </div>
  </section>
  
  <!-- End Cta Section -->



  <!-- ======= Frequently Asked Questions Section ======= -->
  <!--
  <section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Frequently Asked Questions</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="faq-list">
        <ul>
          <li data-aos="fade-up">
            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
              <p>
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="100">
            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-2" class="collapse" data-parent=".faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="200">
            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-3" class="collapse" data-parent=".faq-list">
              <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="300">
            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-4" class="collapse" data-parent=".faq-list">
              <p>
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
              </p>
            </div>
          </li>

          <li data-aos="fade-up" data-aos-delay="400">
            <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
            <div id="faq-list-5" class="collapse" data-parent=".faq-list">
              <p>
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
              </p>
            </div>
          </li>

        </ul>
      </div>

    </div>
  </section>
  -->
  <!-- End Frequently Asked Questions Section -->

  <!-- ======= Contact Section ======= -->
  <!--
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contácto</h2>
      </div>
        <p>Estámos a su plena disposición para resolver sus dudas o sugerencias, escribínos!.</p>

      <div>
        <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13604.37110365174!2d-68.54787003879397!3d-31.521611729983107!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x968141cf3ef29233%3A0xd8e870e0d06725c0!2sPaseo%20San%20Juan!5e0!3m2!1ses-419!2sar!4v1595371523593!5m2!1ses-419!2sar" frameborder="0" allowfullscreen></iframe>

      </div>

      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="icofont-google-map"></i>
              <h4>Localización:</h4>
              <p>Paseo San Juan, San Juan, Argentina, 5400</p>
            </div>

            <div class="email">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>envios@casa2000.com.ar</p>
            </div>

            <div class="phone">
              <i class="icofont-phone"></i>
              <h4>Teléfono:</h4>
              <p>+54 264 554 8855</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Ingrese su nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Ingrese asunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Ingrese su comentario o sugerencia" placeholder="Message"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Cargando</div>
              <div class="error-message"></div>
              <div class="sent-message">Su mensaje ha sido enviado. Muchas gracias!</div>
            </div>
            <div class="text-center"><button type="submit">Enviar Mensaje</button></div>
          </form>

        </div>

      </div>

    </div>
  </section>
  -->
  <!-- End Contact Section -->
</main><!-- End #main -->
@endsection