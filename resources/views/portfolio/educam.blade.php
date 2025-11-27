@extends('layout')

@section('title', 'Educam')

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Educam</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href={{url("/")}}>Home</a></li>
            <li class="current">Educam</li>
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
                  <img src="assets/img/portfolio/Educam/1.png" alt="Portfolio Image" class="img-fluid" loading="lazy">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/Educam/2.png" alt="Portfolio Image" class="img-fluid" loading="lazy">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/Educam/3.png" alt="Portfolio Image" class="img-fluid" loading="lazy">
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
                <li><strong>Client</strong>: Atoh Francis</li>
                <li><strong>Project date</strong>: 24 Mai, 2025</li>
                <li><strong>Project URL</strong>: <a href="https://educam.helonyxe.com" target="_blank">www.educam.helonyxe.com</a></li>
              </ul>
            </div>
          </div>

            <div class="col-lg-12">
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2>Project Overview</h2>
              <p>
              Educam is a comprehensive web and mobile application designed specifically for Cameroon GCE students. The platform provides a wide range of revision materials, past questions, interactive quizzes, and study resources to help students prepare effectively for their exams.
              </p>
              <p>
              The application aims to simplify the revision process by offering organized content, instant feedback, and progress tracking. With both web and mobile versions, students can access their study materials anytime, anywhere, ensuring flexibility and convenience.
              </p>

              <div class="features mt-4">
              <h3>Key Features</h3>
              <div class="row gy-3">
                <div class="col-md-6">
                <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-check-circle-fill"></i>
                  <h4>Responsive Design</h4>
                  <p>The platform is optimized for both web and mobile devices, providing a seamless experience for students on any device.</p>
                </div>
                </div>

                <div class="col-md-6">
                <div class="feature-item" data-aos="fade-up" data-aos-delay="500">
                  <i class="bi bi-book"></i>
                  <h4>Extensive Revision Materials</h4>
                  <p>Access to a large database of GCE past questions, answers, and detailed explanations for comprehensive revision.</p>
                </div>
                </div>

                <div class="col-md-6">
                <div class="feature-item" data-aos="fade-up" data-aos-delay="600">
                  <i class="bi bi-bar-chart"></i>
                  <h4>Progress Tracking</h4>
                  <p>Students can monitor their revision progress, identify strengths and weaknesses, and focus on areas that need improvement.</p>
                </div>
                </div>

                <div class="col-md-6">
                <div class="feature-item" data-aos="fade-up" data-aos-delay="700">
                  <i class="bi bi-people"></i>
                  <h4>Interactive Quizzes</h4>
                  <p>Engage with interactive quizzes and instant feedback to reinforce learning and boost exam confidence.</p>
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