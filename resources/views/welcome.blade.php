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
                <p class="lead">I'm a <span class="typed" data-typed-items="Web Developer, Mobile Developer, ML Engineer, Creative Director"></span></p>
                <p class="description">Passionate about creating exceptional digital experiences that blend innovative design with functional development. Let's bring your vision to life.</p>

                <div class="hero-actions">
                  <a href="#portfolio" class="btn btn-primary">View My Work</a>
                  <a href="#contact" class="btn btn-outline">Get In Touch</a>
                </div>

                <div class="social-links">
                    <a href="https://t.me/BoreilFobs"><i class="bi bi-telegram"></i></a>
                    <a href="https://wa.me/+237690383299"><i class="bi bi-whatsapp"></i></a>
                  <a href="https://www.github.com/BoreilFobs/"><i class="bi bi-github"></i></a>
                  <a href="https://www.linkedin.com/in/boreil-fobs-0206b0307/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
              <div class="hero-visual">
                <div class="profile-container">
                  <div class="profile-background"></div>
                  <img src="assets/img/profile/Proile-main.png" alt="Alexander Chen" class="profile-image">
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
                  <img src="assets/img/profile/profile2.png" alt="Profile Image" class="img-fluid">
                </div>
                <div class="profile-badge">
                  <i class="bi bi-check-circle-fill"></i>
                </div>
              </div>

              <div class="profile-content">
                <h3>Boreil Fobasso</h3>
                <p class="profession">Web &amp; Mobile Developer, ML Engineer</p>

                <div class="contact-links">
                  <a href="mailto:fobsboreil@gmail.com" class="contact-item">
                    <i class="bi bi-envelope"></i>
                    fobsboreil@gmail.com
                  </a>
                  <a href="tel:+237690383299" class="contact-item">
                    <i class="bi bi-telephone"></i>
                    +237 690 383 299
                  </a>
                  <a href="#" class="contact-item">
                    <i class="bi bi-geo-alt"></i>
                    Nkolmesseng, Yaoundé, Cameroon
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
            <div class="about-content">
              <div class="section-header">
                <span class="badge-text">Get to Know Me</span>
                <h2>Passionate About Creating Digital Experiences</h2>
              </div>

              <div class="description">

                <p>Passionate and dedicated young mobile and web developer with a keen eye for crafting intuitive and responsive user experiences. Skilled in building modern, efficient applications using the latest technologies, with a strong foundation in both front-end and back-end development.</p>

                <p>Committed to continuous learning and improvement, I thrive on solving complex problems and turning innovative ideas into reality. Experienced in collaborating with teams to deliver scalable, maintainable code and exceptional digital products that delight users.</p>

              </div>


              <div class="stats-grid">
                <div class="stat-item">
                  <div class="stat-number">10+</div>
                  <div class="stat-label">Projects Completed</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">2+</div>
                  <div class="stat-label">Years Experience</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number">98%</div>
                  <div class="stat-label">Client Satisfaction</div>
                </div>
              </div>

              <div class="details-grid">
                <div class="detail-row">
                  <div class="detail-item">
                    <span class="detail-label">Specialization</span>
                    <span class="detail-value">Development</span>
                  </div>
                  <div class="detail-item">
                    <span class="detail-label">Experience Level</span>
                    <span class="detail-value">Professional</span>
                  </div>
                </div>
                <div class="detail-row">
                  <div class="detail-item">
                    <span class="detail-label">Education</span>
                    <span class="detail-value">HND in Software Engineering</span>
                  </div>
                  <div class="detail-item">
                    <span class="detail-label">Languages</span>
                    <span class="detail-value">English,  French</span>
                  </div>
                </div>
              </div>

              <div class="cta-section">
                <a href="{{ asset('/resume/Fobs.pdf') }}" class="btn btn-primary" target="_blank" rel="noopener">
                  <i class="bi bi-download"></i>
                  Download Resume
                </a>
                <a href="https://wa.me/+237690383299" class="btn btn-outline">
                  <i class="bi bi-chat-dots"></i>
                  Let's Talk
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
        <h2>Skills</h2>
        <p>My technical expertise spans both front-end and back-end development, enabling me to build seamless, high-performance web and mobile applications. I am passionate about mastering new technologies and delivering solutions that are both visually appealing and functionally robust. Below are some of the key skills and tools I work with:</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-6">
            <div class="skills-category" data-aos="fade-up" data-aos-delay="200">
              <h3>Front-end Development</h3>
              <div class="skills-animation">
                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4>HTML/CSS/Javascript</h4>
                    <span class="skill-percentage">95%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip">Expert level knowledge of semantic HTML5 and modern CSS3 techniques</div>
                </div>

                
                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4>React</h4>
                    <span class="skill-percentage">80%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip">Experience with React hooks, state management, and component architecture</div>
                </div>
                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4>React Native</h4>
                    <span class="skill-percentage">80%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip">xperience with React hooks, state management, and component architecture</div>
                </div>

              </div>
            </div><!-- End Frontend Skills -->
          </div>

          <div class="col-lg-6">
            <div class="skills-category" data-aos="fade-up" data-aos-delay="300">
              <h3>Back-end Development</h3>
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
                    Backend development and API integration with PHP.
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
                  <div class="skill-tooltip">Server-side PHP development with Laravel and REST APIs</div>
                </div>

                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4>SQL</h4>
                    <span class="skill-percentage">80%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip">Database design, optimization, and complex queries</div>
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
        <h2>Resume</h2>
        <p>If you want results, you have to put in the work. No shortcuts, no excuses—just skill, dedication, and a relentless drive to deliver. Mediocrity isn’t welcome here.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <!-- Left column with summary and contact -->
          <div class="col-lg-4">
            <div class="resume-side" data-aos="fade-right" data-aos-delay="100">
              <div class="profile-img mb-4">
                <img src="assets/img/profile/profile1.jpg" alt="Profile" class="img-fluid rounded">
              </div>

              <h3>Professional Summary</h3>
              <p>
                Creative and detail-oriented Web and Mobile Developer skilled in Laravel, React.js, JavaScript, and React Native. Experienced in building responsive, user-focused applications with clean code and intuitive UX/UI. Passionate about solving real-world problems and eager to collaborate on impactful projects.
            </p>
              <h3 class="mt-4">Contact Information</h3>
              <ul class="contact-info list-unstyled">
                <li><i class="bi bi-geo-alt"></i> Nkolmesseng, Yaounde, Cameroon</li>
                <li><i class="bi bi-envelope"></i> fobsboreil@gmail.com</li>
                <li><i class="bi bi-phone"></i> +237 690 383 299</li>
                <li><i class="bi bi-linkedin"></i>Boreil Fobs </li>
              </ul>

              <div class="skills-animation mt-4">
                <h3>Technical Skills</h3>
                <div class="skill-item">
                  <div class="d-flex justify-content-between">
                    <span>Web Development</span>
                    <span>95%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="d-flex justify-content-between">
                    <span>Mobile develoment</span>
                    <span>75%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="d-flex justify-content-between">
                    <span>Teaching</span>
                    <span>80%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>

                <div class="skill-item">
                  <div class="d-flex justify-content-between">
                    <span>Project Management</span>
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
              <h3><i class="bi bi-briefcase me-2"></i>Professional Experience</h3>

              <div class="resume-item">
                <h4>FREELANCE WEB DEVELOPER</h4> 
                {{-- <h5>2022 - Present</h5> --}}
                {{-- <p class="company"><i class="bi bi-building"></i> Tech Innovations Inc.</p> --}}
                <ul>
                  <li>Freelance Web Developer with hands-on experience building custom websites and applications for individuals and businesses.</li>
                  <li>Skilled at delivering tailored solutions and managing full project lifecycles.</li>
                  <li>Committed to client satisfaction through responsive design and clean, efficient code.</li>

                </ul>
              </div>

              <div class="resume-item">
                <h4>Assistant Developer</h4>
                {{-- <h5>2019 - 2022</h5> --}}
                {{-- <p class="company"><i class="bi bi-building"></i> Digital Solutions Corp.</p> --}}
                <ul>
                  <li>Served as Assistant Web and Mobile Developer on EDUCAM, a GCE revision platform.</li>
                  <li>Contributed to the design and development of both web and Android applications.</li>
                  <li>Collaborated with a team to implement features enhancing student learning experiences.</li>
                  <li>Ensured responsive design, smooth navigation, and content accessibility across devices.</li>

                </ul>
              </div>
              <div class="resume-item">
                  <h4>Independent Software Developer</h4>
                  {{-- <h5>2019 - 2022</h5> --}}
                  {{-- <p class="company"><i class="bi bi-building"></i> Digital Solutions Corp.</p> --}}
                  <ul>
                    <li>Independent Web Developer focused on solving real-world problems through code.</li>
                    <li>Developed personal projects including a comprehensive school management system and a community saving pools (tontines) software solution.</li>
                    <li>Experienced in building full-stack applications from the ground up with an emphasis on usability, efficiency, and real-life impact.</li>
      
                  </ul>
                </div>
              </div>

            <!-- Education Section -->
            <div class="resume-section" data-aos="fade-up" data-aos-delay="100">
              <h3><i class="bi bi-mortarboard me-2"></i>Education</h3>

              <div class="resume-item">
                <h4>HND in Software Engineering</h4>
                <h5>2024 - 2025</h5>
                <p class="company"><i class="bi bi-building"></i> Azimut higher institute</p>
                <p>Currently pursuing 2nd year of Software Engineering training at Azimut for the 2024-2025 academic year.</p>
              </div>

              <div class="resume-item">
                <h4>GCE Advanced Level in Sciences</h4>
                <h5>2022-2023</h5>
                <p class="company"><i class="bi bi-building"></i> GBHS Yaoundé</p>
                <p>Completed Advanced Level studies in sciences at Government Bilingual High School Yaoundé.</p>
              </div>
            </div>

            <!-- Certifications Section -->
            <div class="resume-section" data-aos="fade-up" data-aos-delay="200">
              <h3><i class="bi bi-award me-2"></i>Certifications</h3>

              <div class="resume-item">
                <h4>W3Schools HTML and CSS Certification</h4>
                <h5>2023</h5>
              </div>

              <div class="resume-item">
                <h4>W3Schools SQL Certification</h4>
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
        <p>Explore a curated selection of my web, mobile, and design projects. Each project demonstrates my commitment to quality, creativity, and delivering real value to clients. From innovative web applications to engaging mobile experiences and creative branding, my portfolio highlights the diverse skills and solutions I bring to every collaboration.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row">
            <div class="col-lg-3 filter-sidebar">
              <div class="filters-wrapper" data-aos="fade-right" data-aos-delay="150">
                <ul class="portfolio-filters isotope-filters">
                  <li data-filter="*" class="filter-active">All Projects</li>
                  {{-- <li data-filter=".filter-photography">Photography</li>
                  <li data-filter=".filter-design">Design</li>
                  <li data-filter=".filter-automotive">Automotive</li>
                  <li data-filter=".filter-nature">Nature</li> --}}
                </ul>
              </div>
            </div>

            <div class="col-lg-9">
              <div class="row gy-4 portfolio-container isotope-container" data-aos="fade-up" data-aos-delay="200">
                <a href="{{url("/FobsSMS")}}">
                  <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-photography">
                    <div class="portfolio-wrap">
                      <img src="assets/img/portfolio/FobsSMS/1.png" class="img-fluid" alt="Portfolio Image" loading="lazy">
                      <div class="portfolio-info">
                        <div class="content">
                          <span class="category">App development</span>
                          <h4>FobsSMS</h4>
                          <div class="portfolio-links">
                            <a href="assets/img/portfolio/FobsSMS/1.png" class="glightbox" title="Capturing Moments"><i class="bi bi-plus-lg"></i></a>
                            <a href={{url("/FobsSMS")}} title="More Details"><i class="bi bi-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a><!-- End Portfolio Item -->


                <a href="{{url("/Educam")}}">
                  <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-design">
                    <div class="portfolio-wrap">
                      <img src="assets/img/portfolio/Educam/1.png" class="img-fluid" alt="Portfolio Image" loading="lazy">
                      <div class="portfolio-info">
                        <div class="content">
                          <span class="category">App Development</span>
                          <h4>EDUCAM</h4>
                          <div class="portfolio-links">
                            <a href="assets/img/portfolio/Educam/1.png" class="glightbox" title="Digital Experience"><i class="bi bi-plus-lg"></i></a>
                            <a href="{{url("/Educam")}}" title="More Details"><i class="bi bi-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a><!-- End Portfolio Item -->

                 <a href="{{url("/glowandchic")}}">
                  <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-design">
                    <div class="portfolio-wrap">
                      <img src="assets/img/portfolio/glowandchic/1.png" class="img-fluid" alt="Portfolio Image" loading="lazy">
                      <div class="portfolio-info">
                        <div class="content">
                          <span class="category">Web Development</span>
                          <h4>Glow & Chic</h4>
                          <div class="portfolio-links">
                            <a href="assets/img/portfolio/glowandchic/1.png" class="glightbox" title="Digital Experience"><i class="bi bi-plus-lg"></i></a>
                            <a href="{{url("/glowandchic")}}" title="More Details"><i class="bi bi-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </a><!-- End Portfolio Item -->

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
        <p>Discover a range of services designed to elevate your business, enhance your brand, and accelerate your digital transformation. From creative branding and design systems to robust digital platforms and growth strategies, I deliver solutions tailored to your unique goals.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="service-header">
          <div class="row align-items-center">
            <div class="col-lg-8 col-md-12">
              <div class="service-intro">
                <h2 class="service-heading">
                  <div>Future Oriented</div>
                  <div><span>Business Solutions</span></div>
                </h2>
              </div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div class="service-summary">
                <p>
                  We integrate forward-thinking strategies, creative approaches, and state-of-the-art technologies to deliver exceptional customer experiences that drive growth and engage target markets.
                </p>
                <a href="#services" class="service-btn">
                  View All Services
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
                <i class="bi bi-phone"></i>
              </div>
              <a href="#" class="card-action d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
              </a>
              <h3>
                <a href="#">
                  Mobile <span>Development</span>
                </a>
              </h3>
              <p>
                Building robust, user-friendly mobile applications for Android and iOS using modern frameworks like React Native. Focused on delivering seamless user experiences and high performance.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card position-relative z-1">
              <div class="service-icon">
                <i class="bi bi-laptop"></i>
              </div>
              <a href="#" class="card-action d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
              </a>
              <h3>
                <a href="#">
                  Web <span>Development</span>
                </a>
              </h3>
              <p>
                Creating modern, responsive websites and web applications using technologies like Laravel, PHP, JavaScript, and React. Emphasis on clean code, scalability, and intuitive interfaces.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-card position-relative z-1">
              <div class="service-icon">
                <i class="bi bi-mortarboard"></i>
              </div>
              <a href="#" class="card-action d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
              </a>
              <h3>
                <a href="#">
                  Technical <span>Instruction</span>
                </a>
              </h3>
              <p>
                Delivering engaging and practical training sessions in web and mobile development. Helping students and teams master programming concepts, frameworks, and best practices.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-card position-relative z-1">
              <div class="service-icon">
                <i class="bi bi-code-slash"></i>
              </div>
              <a href="#" class="card-action d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
              </a>
              <h3>
                <a href="#">
                  API <span>Integration</span>
                </a>
              </h3>
              <p>
                Integrating third-party APIs and building custom RESTful APIs to connect applications and enhance functionality across platforms.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-card position-relative z-1">
              <div class="service-icon">
                <i class="bi bi-graph-up"></i>
              </div>
              <a href="#" class="card-action d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
              </a>
              <h3>
                <a href="#">
                  Project <span>Consulting</span>
                </a>
              </h3>
              <p>
                Advising on digital strategy, technology stack selection, and best practices for web and mobile projects to ensure successful outcomes.
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-card position-relative z-1">
              <div class="service-icon">
                <i class="bi bi-people"></i>
              </div>
              <a href="#" class="card-action d-flex align-items-center justify-content-center rounded-circle">
                <i class="bi bi-arrow-up-right"></i>
              </a>
              <h3>
                <a href="#">
                  Mentorship & <span>Support</span>
                </a>
              </h3>
              <p>
                Providing mentorship and ongoing support for junior developers and teams, fostering growth and continuous improvement in software development.
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
        <h2>Testimonials</h2>
        <p>See what clients and collaborators from Cameroon and across Africa say about working with me—real feedback on project results, professionalism, and impact.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="testimonial-masonry">

          <div class="testimonial-item" data-aos="fade-up">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>Working with Boreil was a game-changer for our business. His web solutions helped us reach more customers in Yaoundé and improved our online presence.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="https://images.unsplash.com/photo-1519125323398-675f0ddb6308?auto=format&fit=facearea&w=96&h=96&facepad=2" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Atoh Francis</h3>
                  <span class="position">Developer, Cameroon</span>
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
              <p>Professional, creative, and always available for support. I highly recommend Boreil for any digital project in Africa.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="https://images.unsplash.com/photo-1463453091185-61582044d556?auto=format&fit=facearea&w=96&h=96&facepad=2" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Donguepe Steeve</h3>
                  <span class="position">Startup Founder, Cameroon</span>
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
              <p>Boreil’s attention to detail and understanding of local needs made our project stand out. We’re grateful for his expertise.</p>
              <div class="client-info">
                <div class="client-image">
                  <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=facearea&w=96&h=96&facepad=2" alt="Client">
                </div>
                <div class="client-details">
                  <h3>Yotta Jovence</h3>
                  <span class="position">Devops, Cameroon</span>
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
        <p>If you’d like to discuss a project, collaborate, or just say hello, feel free to reach out using the form below or through my contact details. I look forward to connecting with you!</p></div><!-- End Section Title -->

      <div class="container">

        <div class="row g-4 g-lg-5">
          <div class="col-lg-5">
            <div class="info-box">
              <h3>Contact Info</h3>
                <p>If you have a project in mind, want to collaborate, or just want to say hello, feel free to contact me using the details below.</p>

              <div class="info-item">
                <div class="icon-box">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="content">
                  <h4>Our Location</h4>
                  <p>Nkolmesseng</p>
                  <p>Yaounde, Cameroon</p>
                </div>
              </div>

              <div class="info-item">
                <div class="icon-box">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="content">
                  <h4>Phone Number</h4>
                  <p>+237 690 383 299</p>
                  {{-- <p>+1 6678 254445 41</p> --}}
                </div>
              </div>

              <div class="info-item">
                <div class="icon-box">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="content">
                  <h4>Email Address</h4>
                  <p>fobsboreil@gmail.com</p>
                  {{-- <p>contact@example.com</p> --}}
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="contact-form">
              <h3>Get In Touch</h3>
                <p>If you have any questions, project ideas, or just want to connect, please fill out the form below. I look forward to hearing from you!</p>

              <form action="forms/contact.php" method="post" class="php-email-form">
                <div class="row gy-4">

                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                  </div>

                  <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                  </div>

                  <div class="col-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                  </div>

                  <div class="col-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                  </div>

                  <div class="col-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>

                    <button type="submit" class="btn">Send Message</button>
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
