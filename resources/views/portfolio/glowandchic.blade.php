@extends('layout')
@section('title', "FobsSMS")
@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Glow & Chic</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{url("/")}}">Home</a></li>
            <li class="current">Glow & Chic</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper init-swiper">

              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/glowandchic/1.png" alt="Portfolio Image" class="img-fluid" loading="lazy">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/glowandchic/2.png" alt="Portfolio Image" class="img-fluid" loading="lazy">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/glowandchic/3.png" alt="Portfolio Image" class="img-fluid" loading="lazy">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-left" data-aos-delay="200">
              <h3>Project Information</h3>
              <ul>
                <li><strong>Category</strong>: Web and Mobile Development</li>
                <li><strong>Client</strong>: Mme Susie</li>
                <li><strong>Project date</strong>: 25 june, 2025</li>
                <li><strong>Project URL</strong>: <a href="https://glowandchicgarden.fobs.dev" target="_blank">www.glowandchicgarden.com</a></li>
              </ul>
            </div>
          </div>

        <div class="col-lg-12">
    <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
        <h2>Project Overview: Glow & Chic Garden App</h2>
        <p>
            The Glow & Chic Garden App is a comprehensive solution designed to revolutionize beauty salon operations. It seamlessly integrates online booking for clients with robust internal management tools for the salon, streamlining appointments, staff schedules, and critical stock management.
        </p>
        <p>
            This intuitive platform provides a tailored experience for salon owners, staff, and clients. It ensures efficient service delivery, optimizes resource allocation, and enhances customer satisfaction by providing easy access to services, appointment history, and personalized offers.
        </p>

        <div class="features mt-4">
            <h3>Key Features</h3>
            <div class="row gy-3">
                <div class="col-md-6">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-calendar-check"></i>
                        <h4>Effortless Online Booking</h4>
                        <p>Clients can easily browse services, view staff availability, and book appointments 24/7 through a user-friendly interface, reducing no-shows and administrative calls.</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-box-seam"></i>
                        <h4>Intelligent Stock Management</h4>
                        <p>Track product inventory in real-time, receive low-stock alerts, manage supplier orders, and analyze product consumption to optimize stock levels and minimize waste.</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="600">
                        <i class="bi bi-people"></i>
                        <h4>Client & Staff Management</h4>
                        <p>Maintain detailed client profiles, service history, and preferences. Efficiently manage staff schedules, commissions, and performance, ensuring smooth salon operations.</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="700">
                        <i class="bi bi-bar-chart"></i>
                        <h4>Performance Analytics & Reporting</h4>
                        <p>Gain insights into popular services, peak booking times, staff performance, and stock turnover with comprehensive reports and dashboards to drive business growth.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        </div>

      </div>

    </section><!-- /Portfolio Details Section -->

  </main>
  @endsection