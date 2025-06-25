<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>FobsDev | @yield('title', "Portfolio")</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
<!-- Favicons -->
<link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png') }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/aos/aos.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">

<!-- Main CSS File -->
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

  <!-- =======================================================
  * Template Name: SnapFolio
  * Template URL: https://bootstrapmade.com/snapfolio-bootstrap-portfolio-template/
  * Updated: Jun 13 2025 with Bootstrap v5.3.6
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column justify-content-center">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="header-container d-flex flex-column align-items-start">
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
          <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
          <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
          <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
          <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
          {{-- <li class="dropdown"><a href="#"><i class="bi bi-menu-button navicon"></i> <span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li> --}}
          <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
        </ul>
      </nav>

      <div class="social-links text-center">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>

  </header>

@yield('content')
  <footer id="footer" class="footer position-relative">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">FobsDev</strong> <span>All Rights Reserved</span></p>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/typed.js/typed.umd.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

<!-- Main JS File -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>