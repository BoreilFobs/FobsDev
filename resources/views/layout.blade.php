<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>@yield('title', 'FobsDev - Création de Sites Vitrines Professionnels en 7 Jours | Pavia, Italie')</title>
  
  <!-- SEO Meta Tags -->
  <meta name="description" content="@yield('description', 'Développeur web freelance basé en Italie, spécialisé dans la création de sites vitrines professionnels livrés en 7 jours. Design moderne, responsive et optimisé SEO pour votre entreprise.')">
  <meta name="keywords" content="@yield('keywords', 'développeur web, sites vitrines, création site web, développeur freelance, site web professionnel, Rome Italie, design responsive, SEO, livraison rapide, développement Laravel, React, sites vitrines professionnels')">
  <meta name="author" content="Boreil Fobasso - FobsDev">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
  <meta name="googlebot" content="index, follow">
  <link rel="canonical" href="{{ url()->current() }}">
  
  <!-- Open Graph Meta Tags (Facebook, LinkedIn) -->
  <meta property="og:locale" content="fr_IT">
  <meta property="og:type" content="website">
  <meta property="og:title" content="@yield('og_title', 'FobsDev - Sites Vitrines Professionnels en 7 Jours')">
  <meta property="og:description" content="@yield('og_description', 'Création de sites vitrines professionnels de qualité. Design moderne, responsive et optimisé SEO. Basé en Italie, livraison garantie en 7 jours.')">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:site_name" content="FobsDev">
  <meta property="og:image" content="{{ asset('assets/img/profile/Proile-main.png') }}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="FobsDev - Développeur Web Professionnel">
  
  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@yield('twitter_title', 'FobsDev - Sites Vitrines Professionnels')">
  <meta name="twitter:description" content="@yield('twitter_description', 'Création de sites vitrines professionnels en 7 jours. Design moderne et responsive.')">
  <meta name="twitter:image" content="{{ asset('assets/img/profile/Proile-main.png') }}">
  <meta name="twitter:creator" content="@BoreilFobs">
  
  <!-- Additional SEO Tags -->
  <meta name="language" content="French">
  <meta name="geo.region" content="IT-RM">
  <meta name="geo.placename" content="Rome">
  <meta name="geo.position" content="41.902782;12.496366">
  <meta name="ICBM" content="41.902782, 12.496366">
  
  <!-- Mobile Optimization -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-title" content="FobsDev">
  
  <!-- Theme Color -->
  <meta name="theme-color" content="#a86d37">
  <meta name="msapplication-TileColor" content="#a86d37">
  
  <!-- Structured Data (JSON-LD) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "Boreil Fobasso",
    "url": "{{ url('/') }}",
    "image": "{{ asset('assets/img/profile/Proile-main.png') }}",
    "sameAs": [
      "https://www.linkedin.com/in/boreil-fobs-0206b0307/",
      "https://github.com/BoreilFobs",
      "https://t.me/BoreilFobs"
    ],
    "jobTitle": "Développeur Web & Mobile",
    "worksFor": {
      "@type": "Organization",
      "name": "FobsDev"
    },
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Pavia",
      "addressCountry": "IT"
    },
    "email": "contact@fobs.dev",
    "telephone": "+393517699065"
  }
  </script>
  
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "FobsDev",
    "description": "Création de sites vitrines professionnels en 7 jours. Design moderne, responsive et optimisé SEO.",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('assets/img/profile/Proile-main.png') }}",
    "image": "{{ asset('assets/img/profile/Proile-main.png') }}",
    "telephone": "+393517699065",
    "email": "contact@fobs.dev",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Pavia",
      "addressCountry": "IT"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": "41.902782",
      "longitude": "12.496366"
    },
    "areaServed": [
      {
        "@type": "Country",
        "name": "Italy"
      },
      {
        "@type": "Country",
        "name": "France"
      }
    ],
    "priceRange": "€€",
    "serviceType": [
      "Création de Sites Vitrines",
      "Développement Web",
      "Design Responsive",
      "Optimisation SEO"
    ]
  }
  </script>

  <!-- Favicons -->
<!-- Favicons -->
{{-- <link rel="icon" href="{{ asset('assets/img/favicon.png') }}"> --}}
{{-- <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png') }}"> --}}

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
          <li><a href="/#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
          <li><a href="/#about"><i class="bi bi-person navicon"></i> About</a></li>
          <li><a href="/#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
          <li><a href="/#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
          <li><a href="/#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
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
          <li><a href="/#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
        </ul>
      </nav>

      <div class="social-links text-center">
        <a href="https://x.com/BoreilFobs" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="https://facebook.com/" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/fobsdev/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://wa.me/+393517699065" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
        <a href="https://www.linkedin.com/" class="linkedin"><i class="bi bi-linkedin"></i></a>
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