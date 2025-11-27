@extends('layout')

@section('title', 'FobsSMS')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">FobsSMS</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{url("/")}}">Home</a></li>
            <li class="current">FobsSMS</li>
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
                  <img src="assets/img/portfolio/FobsSMS/1.png" alt="Portfolio Image" class="img-fluid" loading="lazy">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/FobsSMS/2.png" alt="Portfolio Image" class="img-fluid" loading="lazy">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/FobsSMS/3.png" alt="Portfolio Image" class="img-fluid" loading="lazy">
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
                <li><strong>Client</strong>: Personal</li>
                <li><strong>Project date</strong>: 01 june, 2025</li>
                <li><strong>Project URL</strong>: <a href="https://sms.fobs.dev" target="_blank">www.fobssms.com</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2>Project Overview</h2>
              <p>
                FobsSMS is a comprehensive School Management System designed making use of both web and mobile platforms. It streamlines administrative, academic, and communication processes for schools, providing tailored experiences based on user roles such as administrators, teachers, students, and parents.
              </p>
              <p>
                The system enables efficient management of student records, attendance, grading, scheduling, and communication, ensuring all stakeholders have secure and easy access to relevant information anytime, anywhere.
              </p>

              <div class="features mt-4">
                <h3>Key Features</h3>
                <div class="row gy-3">
                  <div class="col-md-6">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                      <i class="bi bi-check-circle-fill"></i>
                      <h4>Role-Based Access</h4>
                      <p>Custom dashboards and permissions for administrators, teachers, students, and parents, ensuring each user sees only the information relevant to their role.</p>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="500">
                      <i class="bi bi-shield-check"></i>
                      <h4>Secure Data Management</h4>
                      <p>Advanced security protocols protect sensitive student and school data, with regular backups and encrypted communications across all platforms.</p>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="600">
                      <i class="bi bi-graph-up"></i>
                      <h4>Academic & Administrative Tools</h4>
                      <p>Automated attendance, grading, timetable management, and reporting tools help staff save time and reduce errors.</p>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="700">
                      <i class="bi bi-phone"></i>
                      <h4>Multi-Platform Accessibility</h4>
                      <p>Seamless access via web and mobile apps, allowing users to stay connected and informed whether at school, home, or on the go.</p>
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