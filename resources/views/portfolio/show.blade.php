@extends('layout')
@section('title', $portfolioItem->title)
@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">{{ $portfolioItem->title }}</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="current">{{ $portfolioItem->title }}</li>
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
                @if($portfolioItem->gallery_images && count($portfolioItem->gallery_images) > 0)
                  @foreach($portfolioItem->gallery_images as $image)
                    <div class="swiper-slide">
                      <img src="{{ asset($image) }}" alt="{{ $portfolioItem->title }}" class="img-fluid" loading="lazy">
                    </div>
                  @endforeach
                @else
                  <div class="swiper-slide">
                    <img src="{{ asset($portfolioItem->main_image) }}" alt="{{ $portfolioItem->title }}" class="img-fluid" loading="lazy">
                  </div>
                @endif
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-left" data-aos-delay="200">
              <h3>Project Information</h3>
              <ul>
                <li><strong>Category</strong>: {{ $portfolioItem->category }}</li>
                @if($portfolioItem->client)
                  <li><strong>Client</strong>: {{ $portfolioItem->client }}</li>
                @endif
                @if($portfolioItem->project_date)
                  <li><strong>Project date</strong>: {{ $portfolioItem->project_date }}</li>
                @endif
                @if($portfolioItem->project_url_external)
                  <li><strong>Project URL</strong>: 
                    <a href="{{ $portfolioItem->project_url_external }}" target="_blank">
                      {{ $portfolioItem->project_url_external_text ?? str_replace(['http://', 'https://'], '', $portfolioItem->project_url_external) }}
                    </a>
                  </li>
                @endif
              </ul>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2>Project Overview</h2>
              
              @if($portfolioItem->overview)
                <p>{{ $portfolioItem->overview }}</p>
              @endif
              
              @if($portfolioItem->overview_additional)
                <p>{{ $portfolioItem->overview_additional }}</p>
              @endif

              @if($portfolioItem->features && count($portfolioItem->features) > 0)
                <div class="features mt-4">
                  <h3>Key Features</h3>
                  <div class="row gy-3">
                    @foreach($portfolioItem->features as $index => $feature)
                      <div class="col-md-6">
                        <div class="feature-item" data-aos="fade-up" data-aos-delay="{{ 400 + ($index * 100) }}">
                          <i class="bi {{ $feature['icon'] ?? 'bi-check-circle-fill' }}"></i>
                          <h4>{{ $feature['title'] }}</h4>
                          <p>{{ $feature['description'] }}</p>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endif

              @if($portfolioItem->technologies && count($portfolioItem->technologies) > 0)
                <div class="technologies mt-4">
                  <h3>Technologies Used</h3>
                  <div class="tech-stack">
                    @foreach($portfolioItem->technologies as $tech)
                      <span class="tech-badge">{{ $tech }}</span>
                    @endforeach
                  </div>
                </div>
              @endif
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->

  </main>
@endsection
