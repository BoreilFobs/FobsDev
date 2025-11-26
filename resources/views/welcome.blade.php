@extends('layout')
@section('content')
    
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="background-elements">
        <div class="bg-circle circle-1"></div>
        <div class="bg-circle circle-2"></div>
      </div>

      <div class="hero-content">

        <div class="container">
          <div class="row align-items-center">

            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
              <div class="hero-text">
                <h1>Fobs<span class="accent-text">Dev</span></h1>
                <h2>Boreil Fobasso</h2>
                <p class="lead">Je suis <span class="typed" data-typed-items="Développeur Web, Développeur Mobile, Créateur de Sites Vitrines"></span></p>
                <p class="description">Spécialisé dans la création de sites vitrines professionnels de qualité, livrés en 7 jours. Basé en Italie, je transforme votre vision en une présence digitale élégante et performante.</p>

                <div class="hero-actions">
                  <a href="#portfolio" class="btn btn-primary">Voir Mes Réalisations</a>
                  <a href="/devis" class="btn btn-outline">Demander un Devis</a>
                </div>

                <div class="social-links">
                    <a href="https://t.me/BoreilFobs"><i class="bi bi-telegram"></i></a>
                    <a href="https://wa.me/+393511262532"><i class="bi bi-whatsapp"></i></a>
                  <a href="https://www.github.com/BoreilFobs/"><i class="bi bi-github"></i></a>
                  <a href="https://www.linkedin.com/in/boreil-fobs-0206b0307/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
              <div class="hero-visual">
                <div class="profile-container">
                  <div class="profile-background"></div>
                  <img src="assets/img/profile/Proile-main.png" alt="Boreil Fobasso" class="profile-image">
                  <div class="floating-elements">
                    <div class="floating-icon icon-1"><i class="bi bi-palette"></i></div>
                    <div class="floating-icon icon-2"><i class="bi bi-code-slash"></i></div>
                    <div class="floating-icon icon-3"><i class="bi bi-lightbulb"></i></div>
                    <div class="floating-icon icon-4"><i class="bi bi-graph-up"></i></div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="200">
            <div class="profile-card">
              <div class="profile-header">
                <div class="profile-image">
                  <img src="assets/img/profile/profile2.png" alt="Photo de Profil" class="img-fluid">
                </div>
                <div class="profile-badge">
                  <i class="bi bi-check-circle-fill"></i>
                </div>
              </div>

              <div class="profile-content">
                <h3>Boreil Fobasso</h3>
                <p class="profession">Développeur Web &amp; Mobile, Créateur de Sites Vitrines</p>

                <div class="contact-links">
                  <a href="mailto:fobsboreil@gmail.com" class="contact-item">
                    <i class="bi bi-envelope"></i>
                    fobsboreil@gmail.com
                  </a>
                  <a href="tel:+393511262532" class="contact-item">
                    <i class="bi bi-telephone"></i>
                    +39 351 126 2532
                  </a>
                  <a href="#" class="contact-item">
                    <i class="bi bi-geo-alt"></i>
                    Rome, Italie
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
            <div class="about-content">
              <div class="section-header">
                <span class="badge-text">À Propos de Moi</span>
                <h2>Passionné par la Création d'Expériences Digitales</h2>
              </div>

              <div class="description">

                <p>Développeur web et mobile basé en Italie, spécialisé dans la création de sites vitrines professionnels de haute qualité. Je vous offre un service rapide et efficace avec une livraison garantie en 7 jours, sans compromis sur la qualité.</p>

                <p>Mon expertise couvre la conception de sites vitrines modernes, responsives et optimisés pour le référencement. Que vous soyez une petite entreprise, un artisan ou un professionnel indépendant, je crée votre présence en ligne avec un design élégant et une expérience utilisateur exceptionnelle.</p>

              </div>


              <div class="stats-grid">
                <div class="stat-item">
                  <div class="stat-number">20+</div>
                  <div class="stat-label">Sites Livrés</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">7</div>
                  <div class="stat-label">Jours de Livraison</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">100%</div>
                  <div class="stat-label">Satisfaction Client</div>
                </div>
              </div>

              <div class="details-grid">
                <div class="detail-row">
                  <div class="detail-item">
                    <span class="detail-label">Spécialisation</span>
                    <span class="detail-value">Sites Vitrines Professionnels</span>
                  </div>
                  <div class="detail-item">
                    <span class="detail-label">Expérience</span>
                    <span class="detail-value">3+ Ans</span>
                  </div>
                </div>
                <div class="detail-row">
                  <div class="detail-item">
                    <span class="detail-label">Formation</span>
                    <span class="detail-value">Ingénierie Logicielle</span>
                  </div>
                  <div class="detail-item">
                    <span class="detail-label">Langues</span>
                    <span class="detail-value">Français, Italien, Anglais</span>
                  </div>
                </div>
              </div>

              <div class="cta-section">
                <a href="{{ asset('/resume/Fobs.pdf') }}" class="btn btn-primary" target="_blank" rel="noopener">
                  <i class="bi bi-download"></i>
                  Télécharger CV
                </a>
                <a href="https://wa.me/+393511262532" class="btn btn-outline">
                  <i class="bi bi-chat-dots"></i>
                  Discutons
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    {{-- <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="stats-wrapper">
              <div class="stats-item" data-aos="zoom-in" data-aos-delay="150">
                <div class="icon-wrapper">
                  <i class="bi bi-emoji-smile"></i>
                </div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Happy Clients</p>
              </div><!-- End Stats Item -->

              <div class="stats-item" data-aos="zoom-in" data-aos-delay="200">
                <div class="icon-wrapper">
                  <i class="bi bi-journal-richtext"></i>
                </div>
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projects</p>
              </div><!-- End Stats Item -->

              <div class="stats-item" data-aos="zoom-in" data-aos-delay="250">
                <div class="icon-wrapper">
                  <i class="bi bi-headset"></i>
                </div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hours Of Support</p>
              </div><!-- End Stats Item -->

              <div class="stats-item" data-aos="zoom-in" data-aos-delay="300">
                <div class="icon-wrapper">
                  <i class="bi bi-people"></i>
                </div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hard Workers</p>
              </div><!-- End Stats Item -->
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Stats Section --> --}}

    <!-- Skills Section -->
    <section id="skills" class="skills section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Compétences</h2>
        <p>Mon expertise technique couvre le développement front-end et back-end, me permettant de créer des sites vitrines professionnels performants et élégants. Je maîtrise les technologies modernes pour vous offrir une présence en ligne de qualité supérieure, livrée rapidement et adaptée à vos besoins spécifiques.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-6">
            <div class="skills-category" data-aos="fade-up" data-aos-delay="200">
              <h3>Développement Front-end</h3>
              <div class="skills-animation">
                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4>HTML/CSS/Javascript</h4>
                    <span class="skill-percentage">95%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip">Maîtrise expert de HTML5 sémantique et CSS3 moderne</div>
                </div>

                
                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4>React</h4>
                    <span class="skill-percentage">80%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip">Expérience avec React hooks, gestion d'état et architecture composants</div>
                </div>
                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4>Design Responsive</h4>
                    <span class="skill-percentage">90%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip">Sites optimisés pour tous les appareils (mobile, tablette, desktop)</div>
                </div>

              </div>
            </div><!-- End Frontend Skills -->
          </div>

          <div class="col-lg-6">
            <div class="skills-category" data-aos="fade-up" data-aos-delay="300">
              <h3>Développement Back-end</h3>
              <div class="skills-animation">
                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4>PHP</h4>
                    <span class="skill-percentage">85%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                <div class="skill-tooltip">
                    Développement backend et intégration API avec PHP.
                </div>
                </div>
                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4>Laravel</h4>
                    <span class="skill-percentage">85%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip">Développement PHP côté serveur avec Laravel et APIs REST</div>
                </div>

                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4>SEO & Performance</h4>
                    <span class="skill-percentage">88%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip">Optimisation pour les moteurs de recherche et performances web</div>
                </div>
              </div>
            </div><!-- End Backend Skills -->
          </div>
        </div>

      </div>

    </section><!-- /Skills Section -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Parcours</h2>
        <p>Si vous voulez des résultats, il faut s'investir. Pas de raccourcis, pas d'excuses—juste des compétences, du dévouement et une volonté inébranlable de livrer. La médiocrité n'a pas sa place ici.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <!-- Left column with summary and contact -->
          <div class="col-lg-4">
            <div class="resume-side" data-aos="fade-right" data-aos-delay="100">
              <div class="profile-img mb-4">
                <img src="assets/img/profile/profile1.jpg" alt="Profil" class="img-fluid rounded">
              </div>

              <h3>Résumé Professionnel</h3>
              <p>
                Développeur Web et Mobile créatif et minutieux, spécialisé en Laravel, React.js, JavaScript et React Native. Expérimenté dans la création d'applications responsives centrées sur l'utilisateur avec un code propre et une UX/UI intuitive. Passionné par la résolution de problèmes réels et désireux de collaborer sur des projets à fort impact.
            </p>
              <h3 class="mt-4">Informations de Contact</h3>
              <ul class="contact-info list-unstyled">
                <li><i class="bi bi-geo-alt"></i> Rome, Italie</li>
                <li><i class="bi bi-envelope"></i> fobsboreil@gmail.com</li>
                <li><i class="bi bi-phone"></i> +39 351 126 2532</li>
                <li><i class="bi bi-linkedin"></i>Boreil Fobs </li>
              </ul>

              <div class="skills-animation mt-4">
                <h3>Compétences Techniques</h3>
                <div class="skill-item">
                  <div class="d-flex justify-content-between">
                    <span>Développement Web</span>
                    <span>95%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="d-flex justify-content-between">
                    <span>Développement Mobile</span>
                    <span>75%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="d-flex justify-content-between">
                    <span>Enseignement</span>
                    <span>80%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="d-flex justify-content-between">
                    <span>Gestion de Projet</span>
                    <span>80%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Right column with experience and education -->
          <div class="col-lg-8 ps-4 ps-lg-5">
            <!-- Experience Section -->
            <div class="resume-section" data-aos="fade-up">
              <h3><i class="bi bi-briefcase me-2"></i>Expérience Professionnelle</h3>

              <div class="resume-item">
                <h4>DÉVELOPPEUR WEB FREELANCE</h4> 
                {{-- <h5>2022 - Present</h5> --}}
                {{-- <p class="company"><i class="bi bi-building"></i> Tech Innovations Inc.</p> --}}
                <ul>
                  <li>Développeur Web Freelance avec une expérience pratique dans la création de sites web et d'applications personnalisés pour les particuliers et les entreprises.</li>
                  <li>Compétent dans la livraison de solutions sur mesure et la gestion complète du cycle de vie des projets.</li>
                  <li>Engagement envers la satisfaction client grâce à un design responsive et un code propre et efficace.</li>

                </ul>
              </div>

              <div class="resume-item">
                <h4>Développeur Assistant</h4>
                {{-- <h5>2019 - 2022</h5> --}}
                {{-- <p class="company"><i class="bi bi-building"></i> Digital Solutions Corp.</p> --}}
                <ul>
                  <li>Développeur Web et Mobile Assistant sur EDUCAM, une plateforme de révision GCE.</li>
                  <li>Contribution à la conception et au développement d'applications web et Android.</li>
                  <li>Collaboration avec une équipe pour implémenter des fonctionnalités améliorant l'expérience d'apprentissage des étudiants.</li>
                  <li>Assurance d'un design responsive, d'une navigation fluide et d'une accessibilité du contenu sur tous les appareils.</li>

                </ul>
              </div>
              <div class="resume-item">
                  <h4>Développeur Logiciel Indépendant</h4>
                  {{-- <h5>2019 - 2022</h5> --}}
                  {{-- <p class="company"><i class="bi bi-building"></i> Digital Solutions Corp.</p> --}}
                  <ul>
                    <li>Développeur Web indépendant axé sur la résolution de problèmes réels à travers le code.</li>
                    <li>Développement de projets personnels incluant un système de gestion scolaire complet et une solution logicielle de tontines communautaires.</li>
                    <li>Expérience dans la création d'applications full-stack de zéro avec un accent sur l'utilisabilité, l'efficacité et l'impact réel.</li>
      
                  </ul>
                </div>
              </div>

            <!-- Education Section -->
            <div class="resume-section" data-aos="fade-up" data-aos-delay="100">
              <h3><i class="bi bi-mortarboard me-2"></i>Formation</h3>

              <div class="resume-item">
                <h4>HND en Génie Logiciel</h4>
                <h5>2024 - 2025</h5>
                <p class="company"><i class="bi bi-building"></i> Institut Supérieur Azimut</p>
                <p>Actuellement en 2ème année de formation en Génie Logiciel à l'Institut Azimut pour l'année académique 2024-2025.</p>
              </div>

              <div class="resume-item">
                <h4>GCE Advanced Level en Sciences</h4>
                <h5>2022-2023</h5>
                <p class="company"><i class="bi bi-building"></i> GBHS Yaoundé</p>
                <p>Études de niveau avancé en sciences complétées au Lycée Bilingue de Yaoundé.</p>
              </div>
            </div>

            <!-- Certifications Section -->
            <div class="resume-section" data-aos="fade-up" data-aos-delay="200">
              <h3><i class="bi bi-award me-2"></i>Certifications</h3>

              <div class="resume-item">
                <h4>Certification W3Schools HTML et CSS</h4>
                <h5>2023</h5>
              </div>

              <div class="resume-item">
                <h4>Certification W3Schools SQL</h4>
                <h5>2024</h5>
              </div>
            </div>
          </div>
        </div>
      </div>


      </div>

    </section><!-- /Resume Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Découvrez une sélection de sites vitrines professionnels que j'ai créés pour mes clients en Europe. Chaque projet démontre mon engagement envers la qualité, la créativité et la livraison rapide. Des designs élégants aux expériences utilisateurs intuitives, mon portfolio illustre la diversité des solutions que j'apporte à chaque collaboration.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row">
            <div class="col-lg-3 filter-sidebar">
              <div class="filters-wrapper" data-aos="fade-right" data-aos-delay="150">
                <ul class="portfolio-filters isotope-filters">
                  <li data-filter="*" class="filter-active">Tous les Projets</li>
                  {{-- <li data-filter=".filter-photography">Photography</li>
                  <li data-filter=".filter-design">Design</li>
                  <li data-filter=".filter-automotive">Automotive</li>
                  <li data-filter=".filter-nature">Nature</li> --}}
                </ul>
              </div>
            </div>

            <div class="col-lg-9">
              <div class="row gy-4 portfolio-container isotope-container" data-aos="fade-up" data-aos-delay="200">
                @forelse($portfolioItems as $item)
                  <div class="col-lg-6 col-md-6 portfolio-item isotope-item">
                    <a href="{{ route('portfolio.show', $item->slug) }}">
                      <div class="portfolio-wrap">
                        <img src="{{ asset($item->main_image) }}" class="img-fluid" alt="{{ $item->title }}" loading="lazy">
                        <div class="portfolio-info">
                          <div class="content">
                            <span class="category">{{ $item->category }}</span>
                            <h4>{{ $item->title }}</h4>
                            <div class="portfolio-links">
                              <a href="{{ asset($item->main_image) }}" class="glightbox" title="{{ $item->title }}"><i class="bi bi-plus-lg"></i></a>
                              <a href="{{ route('portfolio.show', $item->slug) }}" title="More Details"><i class="bi bi-arrow-right"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                @empty
                  <div class="col-12">
                    <p class="text-center">Aucun projet disponible pour le moment.</p>
                  </div>
                @endforelse
              </div><!-- End Portfolio Container -->
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Découvrez ma gamme de services conçus pour propulser votre entreprise et renforcer votre présence digitale. De la création de sites vitrines professionnels aux solutions web sur mesure, je livre des résultats de qualité en 7 jours, adaptés à vos objectifs uniques.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="service-header">
          <div class="row align-items-center">
            <div class="col-lg-8 col-md-12">
              <div class="service-intro">
                <h2 class="service-heading">
                  <div>Solutions Digitales</div>
                  <div><span>Professionnelles</span></div>
                </h2>
              </div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div class="service-summary">
                <p>
                  J'intègre des stratégies innovantes, des approches créatives et les dernières technologies pour créer des expériences digitales exceptionnelles qui engagent votre audience et font croître votre activité.
                </p>
                <a href="#services" class="service-btn">
                  Voir Tous les Services
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-card position-relative z-1">
              <div class="service-icon">
                <i class="bi bi-laptop"></i>
              </div>
              <a href="#" class="card-action d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
              </a>
              <h3>
                <a href="#">
                  Sites Vitrines <span>Professionnels</span>
                </a>
              </h3>
              <p>
                Création de sites vitrines élégants et performants, livrés en 7 jours. Design moderne, responsive et optimisé SEO pour maximiser votre visibilité en ligne.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card position-relative z-1">
              <div class="service-icon">
                <i class="bi bi-palette"></i>
              </div>
              <a href="#" class="card-action d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
              </a>
              <h3>
                <a href="#">
                  Design <span>Sur Mesure</span>
                </a>
              </h3>
              <p>
                Conception d'interfaces uniques et attrayantes adaptées à votre identité de marque. Design personnalisé pour vous démarquer de la concurrence.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-card position-relative z-1">
              <div class="service-icon">
                <i class="bi bi-graph-up"></i>
              </div>
              <a href="#" class="card-action d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
              </a>
              <h3>
                <a href="#">
                  Optimisation <span>SEO</span>
                </a>
              </h3>
              <p>
                Référencement naturel optimisé pour améliorer votre positionnement sur Google. Votre site sera visible par vos clients potentiels.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-card position-relative z-1">
              <div class="service-icon">
                <i class="bi bi-phone"></i>
              </div>
              <a href="#" class="card-action d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
              </a>
              <h3>
                <a href="#">
                  Design <span>Responsive</span>
                </a>
              </h3>
              <p>
                Sites parfaitement adaptés à tous les écrans (mobile, tablette, desktop). Garantie d'une expérience utilisateur optimale sur tous les appareils.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card position-relative z-1">
              <div class="service-icon">
                <i class="bi bi-speedometer2"></i>
              </div>
              <a href="#" class="card-action d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
              </a>
              <h3>
                <a href="#">
                  Livraison <span>Rapide</span>
                </a>
              </h3>
              <p>
                Votre site professionnel livré en 7 jours. Service rapide et efficace sans compromis sur la qualité du résultat final.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-card position-relative z-1">
              <div class="service-icon">
                <i class="bi bi-headset"></i>
              </div>
              <a href="#" class="card-action d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
              </a>
              <h3>
                <a href="#">
                  Support & <span>Maintenance</span>
                </a>
              </h3>
              <p>
                Accompagnement continu et maintenance de votre site. Support technique disponible pour assurer le bon fonctionnement de votre présence en ligne.
              </p>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Témoignages</h2>
        <p>Découvrez ce que mes clients d'Europe disent de leur expérience avec moi—des retours authentiques sur les résultats, le professionnalisme et l'impact de mes services de création de sites vitrines.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="testimonial-masonry">

          <div class="testimonial-item" data-aos="fade-up">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>Boreil a créé un site vitrine magnifique pour mon restaurant en seulement 7 jours. Le design est moderne et nos réservations en ligne ont augmenté de 40%. Service excellent!</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=facearea&w=96&h=96&facepad=2" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Marco Rossi</h3>
                  <span class="position">Propriétaire Restaurant, Rome</span>
                </div>
              </div>
            </div>
          </div>

          {{-- <div class="testimonial-item highlight" data-aos="fade-up" data-aos-delay="100">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>Boreil’s mobile app for our community project was intuitive and reliable. He listened to our needs and delivered beyond expectations.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?auto=format&fit=facearea&w=96&h=96&facepad=2" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Jean-Paul Mbarga</h3>
                  <span class="position">Community Leader, Cameroon</span>
                </div>
              </div>
            </div>
          </div> --}}

          {{-- <div class="testimonial-item" data-aos="fade-up" data-aos-delay="200">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>His dedication and technical skills made our education platform a success. Students found the app easy to use and engaging.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=facearea&w=96&h=96&facepad=2" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Clarisse Tchoumba</h3>
                  <span class="position">Educator, Cameroon</span>
                </div>
              </div>
            </div>
          </div> --}}

          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="300">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>Professionnel, créatif et toujours disponible. Mon site vitrine pour mon studio de photographie est exactement ce que je voulais. Je recommande vivement!</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="https://images.unsplash.com/photo-1463453091185-61582044d556?auto=format&fit=facearea&w=96&h=96&facepad=2" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Sophia Bianchi</h3>
                  <span class="position">Photographe, Milan</span>
                </div>
              </div>
            </div>
          </div>

          {{-- <div class="testimonial-item highlight" data-aos="fade-up" data-aos-delay="400">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>His mentorship helped me grow as a junior developer. I learned best practices and gained confidence in my coding skills.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=facearea&w=96&h=96&facepad=2" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Fatoumata Diop</h3>
                  <span class="position">Junior Developer, Senegal</span>
                </div>
              </div>
            </div>
          </div> --}}

          <div class="testimonial-item" data-aos="fade-up" data-aos-delay="500">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>Excellent travail! Le site pour mon cabinet d'avocats reflète parfaitement notre professionnalisme. Livraison rapide et communication impeccable.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=facearea&w=96&h=96&facepad=2" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Alessandro Ferrari</h3>
                  <span class="position">Avocat, Florence</span>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Si vous souhaitez discuter d'un projet, collaborer, ou simplement dire bonjour, n'hésitez pas à me contacter via le formulaire ci-dessous ou par mes coordonnées. J'ai hâte d'échanger avec vous!</p></div><!-- End Section Title -->

      <div class="container">

        <div class="row g-4 g-lg-5">
          <div class="col-lg-5">
            <div class="info-box">
              <h3>Informations de Contact</h3>
                <p>Si vous avez un projet en tête, souhaitez collaborer, ou simplement dire bonjour, n'hésitez pas à me contacter via les coordonnées ci-dessous.</p>

              <div class="info-item">
                <div class="icon-box">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="content">
                  <h4>Notre Localisation</h4>
                  <p>Rome</p>
                  <p>Italie</p>
                </div>
              </div>

              <div class="info-item">
                <div class="icon-box">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="content">
                  <h4>Numéro de Téléphone</h4>
                  <p>+39 351 126 2532</p>
                  {{-- <p>+1 6678 254445 41</p> --}}
                </div>
              </div>

              <div class="info-item">
                <div class="icon-box">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="content">
                  <h4>Adresse Email</h4>
                  <p>fobsboreil@gmail.com</p>
                  {{-- <p>contact@example.com</p> --}}
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="contact-form">
              <h3>Entrer en Contact</h3>
                <p>Si vous avez des questions, des idées de projets, ou souhaitez simplement échanger, veuillez remplir le formulaire ci-dessous. J'ai hâte de vous lire!</p>

              <form action="forms/contact.php" method="post" class="php-email-form">
                <div class="row gy-4">

                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Votre Nom" required="">
                  </div>

                  <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Votre Email" required="">
                  </div>

                  <div class="col-12">
                    <input type="text" class="form-control" name="subject" placeholder="Sujet" required="">
                  </div>

                  <div class="col-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                  </div>

                  <div class="col-12 text-center">
                    <div class="loading">Chargement</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Votre message a été envoyé. Merci!</div>

                    <button type="submit" class="btn">Envoyer le Message</button>
                  </div>

                </div>
              </form>

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>
@endsection
