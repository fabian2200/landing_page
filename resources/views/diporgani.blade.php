<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICP360RH - Instituto Colombiano de Psicometría | Evaluación, Consultoría y Capacitación</title>
    
    <!-- Meta Description -->
    <meta name="description" content="Especialistas en soluciones integrales para el desarrollo profesional y organizacional.">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="ICP360RH - Instituto Colombiano de Psicometría | Evaluación, Consultoría y Capacitación en RRHH">
    <meta property="og:description" content="Especialistas en soluciones integrales para el desarrollo profesional y organizacional).">
    <meta property="og:image" content="{{ asset('inicio/assets/img/icp-logo.png') }}">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('inicio/assets/img/icono-icp.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('inicio/assets/img/icono-icp.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script async defer crossorigin="anonymous"  src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v18.0" nonce="xyz123"></script>
    
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f8fafc;
            --white: #ffffff;
            --gradient-primary: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            --gradient-secondary: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }
        
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--text-dark) !important;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-color) !important;
        }
        
        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
        }
        
       
        
        .hero-section {
            background: var(--gradient-primary);
            color: white;
            padding: 100px 0 80px;
            position: relative;
            overflow: hidden;
            height: 100vh;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="0,100 1000,0 1000,100"/></svg>');
            background-size: cover;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .services-section {
            padding: 80px 0;
            background: var(--bg-light);
        }
        
        .service-card {
            background: white;
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }
        
        .service-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            color: white;
            font-size: 2rem;
        }
        
        .service-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--text-dark);
        }
        
        .service-description {
            color: var(--text-light);
            margin-bottom: 20px;
            line-height: 1.7;
        }
        
        .features-section {
            padding: 80px 0;
        }
        
        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
        }
        
        .feature-icon {
            width: 50px;
            height: 50px;
            background: var(--accent-color);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 20px;
            flex-shrink: 0;
        }
        
        .feature-content h5 {
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .feature-content p {
            color: var(--text-light);
            margin: 0;
        }
        
        .cta-section {
            background: var(--gradient-secondary);
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        
        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .cta-subtitle {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .footer {
            background: var(--text-dark);
            color: white;
            padding: 40px 0 20px;
        }
        
        .footer h5 {
            color: var(--accent-color);
            margin-bottom: 20px;
        }
        
        .footer p, .footer a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }
        
        .footer a:hover {
            color: var(--accent-color);
        }
        
        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: var(--accent-color);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }

        @media (min-width: 1370px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.8rem;
            }

            .img_slider {
                width: 100%;
                height: 350px !important;
                object-fit: fill;
            }

            #inicio .container {
                max-width: 1400px !important;
            }
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 1.5rem;
                text-align: center;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
                text-align: center;
            }
            
            .cta-title {
                font-size: 2rem;
                text-align: center;
            }
            
            .service-card {
                margin-bottom: 30px;
            }

            #carouselExampleDiv {
                margin-top: 20px;
            }

            .navbar-toggler {
                position: fixed !important;
                left: 65% !important;
                top: 14px !important;
            }

            #btn-solicitar-informacion {
                margin-left: 15vw !important;
                margin-top: 20px !important;
            }

            #btn-whatsapp-facebook {
                margin-left: -44vw !important;
                margin-top: 10px !important;
                margin-bottom: 10px !important;
            }


        }

        .img_slider {
            width: 100%;
            height: 300px;
            object-fit: fill;
        }

        #icono-header-icp {
            background-color: rgba(255, 255, 255, 0.59);
            padding: 10px 20px;
            border-radius: 10px;
            width: fit-content;
        }
                .buy-btn {
          display: inline-block;
          padding: .75rem 1.25rem;
          background-color: #0069d9;
          color: #fff;
          border-radius: .5rem;
          font-weight: 600;
          text-decoration: none;
          transition: background-color .2s;
        }
        .buy-btn:hover {
          background-color: #0053a5;
          text-decoration: none;
        }

    </style>
</head>
<body>
    <div id="fb-root"></div>
 <!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container" style="max-width: 90% !important;">
        <a class="navbar-brand" href="#inicio">
            <img src="{{ asset('inicio/assets/img/icono-icp.png') }}" alt="ICP Logo" height="40" class="me-2">
            ICP360RH
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <a href="#contacto" id="btn-solicitar-informacion" class="btn btn-primary ms-3">Solicitar Información</a>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#servicios">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#caracteristicas">Características</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/testimonios">Testimonios</a>
                </li>
            </ul>
            
            <div class="d-flex align-items-center justify-content-center gap-2" style="margin-left: 10px;" id="btn-whatsapp-facebook">
                <a href="https://wa.me/573012990890" target="_blank" class="btn btn-outline-success">
                    <i class="bi bi-whatsapp"></i>
                </a>
                <a href="https://www.facebook.com/incolpsicometrias" target="_blank" class="btn btn-outline-primary">
                    <i class="bi bi-facebook"></i>
                </a>
                <div class="fb-like" 
                    data-href="https://www.facebook.com/incolpsicometrias" 
                    data-width="" 
                    data-layout="button_count" 
                    data-action="like" 
                    data-size="large" 
                    data-share="false">
                </div>
            </div>
        </div>
    </div>
</nav>


    <!-- Hero Section -->
    <section id="inicio" class="hero-section" style="display: flex; justify-content: center; align-items: center;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 d-flex justify-content-center align-items-center" style="padding-left: 10%; padding-right: 10%; margin-bottom: 40px; text-align: center;">
                    <div class="d-flex align-items-center justify-content-center" id="icono-header-icp">
                        <img src="/inicio/assets/img/icono-icp.png" alt="ICP Logo" height="60" class="me-2">
                        <h2 style="font-family: 'Lucida Calligraphy'; margin: 0px; color: red; font-weight: bold;">Instituto Colombiano de Psicometría</h2>
                    </div>
                </div>
                <div class="col-lg-6 hero-content" data-aos="fade-right"> 
                    <h1 class="hero-title">Soluciones Integrales e Innovadoras que Transforman el Desarrollo del Talento Humano</h1>
                    <p class="hero-subtitle">Impulsamos el Talento Humano mediante formación de vanguardia, tecnología de punta, experticia en docencia y psicometría.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ url('/') }}#servicios" class="btn btn-light btn-lg">Conocer Servicios <i class="bi bi-arrow-right"></i></a>
                        <a href="#contacto" class="btn btn-outline-light btn-lg">Contactar <i class="bi bi-phone"></i></a>
                    </div>
                </div>
                <div class="col-lg-6" id="carouselExampleDiv" data-aos="fade-left">
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <!-- Seccion de fotos  -->
                        <div class="carousel-inner">
                          <!-- este es un item de la seccion de fotos  -->
                          <div class="carousel-item active">
                            <img src="/slide/foto1.png" class="d-block w-100 img_slider" alt="...">
                          </div>
                          <!-- este es un item de la seccion de fotos  -->
                          <div class="carousel-item">
                            <img src="/slide/foto2.png" class="d-block w-100 img_slider" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="/slide/foto3.png" class="d-block w-100 img_slider" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="/slide/foto4.png" class="d-block w-100 img_slider" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- INICIO - ServicesI Section -->
  <section id="ServicesI" class="servicesI section" style="padding-top: 10px !important;">
    <section id="serviciosI" class="servicesI-section">
        <div class="container">
                <div class="row text-center mb-3">
                  <div class="col-lg-8 mx-auto" data-aos="fade-up">
                    <h6 class="fs-4 fw-bold mb-4 text-center">Desde el</h6>
                    <h3 class="display-6 fw-bold mb-4" style="font-family: 'Lucida Calligraphy'; color: red; text-align: center;">
                      Instituto Colombiano de Psicometría
                    </h3>
                  </div>
                </div>

                  <p class="lead text-muted text-center">Le invitamos a transformar su práctica profesional con herramientas de vanguardia:</p>
                  <div class="d-flex align-items-center justify-content-center mb-4">
                    <i class="bi bi-mortarboard fs-2 me-2" style="background-color: #0d6efd; color: #fff; padding: .5rem; border-radius: .5rem;"></i>
                    <h4 class="fw-bold mb-0 text-center">{{ $servicio->nombre }}</h4>
                  </div>
                </div>
            </div>
          </div>  
  </section>
<!-- FIN - ServicesI Section -->


<!-- INICIO - Services Section -->
<!-- Services Section Item 1 -->
<style>
  #services .service-card:hover .service-title {
    color: #0d6efd;
  }
</style>

<section id="services" class="services section" style="padding-top: 10px !important;">
  <section id="servicios" class="services-section">
    <div class="container">
      <div class="row g-4">

<!-- Services Section Item 1 -->                
                <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-bullseye fs-2 me-2" style="background-color: #0d6efd; color: #fff; padding: .5rem; border-radius: .5rem;"></i>
                            <h3 class="service-title mb-0">Objetivo</h3>
                        </div>
                        <p class="description">{!! $servicio->descripcion !!}</p>
                    </div>
                </div>
<!-- END Services Section Item 1 -->
<!-- Services Section Item 2 -->                
                <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-gear fs-2 me-2" style="background-color: #0d6efd; color: #fff; padding: .5rem; border-radius: .5rem;"></i>
                            <h3 class="service-title mb-0">Metodología</h3>
                        </div>
                        <p class="description">{!! $servicio->metodologia !!}</p>
                    </div>
                </div>
<!-- END Services Section Item 2 -->
<!-- Services Section Item 3 -->                
                <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-people fs-2 me-2" style="background-color: #0d6efd; color: #fff; padding: .5rem; border-radius: .5rem;"></i>
                            <h3 class="service-title mb-0">Dirigido a</h3>
                        </div>
                        <p class="description">{{ $servicio->dirigido }}</p>
                    </div>
                </div>
<!-- END Services Section Item 3 -->

<!-- Services Section Item 4 -->                
                <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-card-list fs-2 me-2" style="background-color: #0d6efd; color: #fff; padding: .5rem; border-radius: .5rem;"></i>
                            <h3 class="service-title mb-0">Incluye</h3>
                        </div>
                        <ul class="description">
                            {!! $servicio->incluye !!}
                        </ul>
                    </div>
                </div>
<!-- END Services Section Item 4 -->
<!-- Services Section Item 5 -->              
            <div class="col-12" data-aos="fade-up" data-aos-delay="500">
              <div class="service-card">
                <div class="d-flex align-items-center mb-3">
                  <i class="bi bi-info-circle fs-2 me-2" style="background-color: #0d6efd; color: #fff; padding: .5rem; border-radius: .5rem;"></i>
                  <h3 class="service-title mb-0">Contenido</h3>
                </div>
                <div class="col-12 mb-4">
                  <p class="lead text-center">{{ $servicio->descripcion_contenido }}</p>
                </div>
                <div class="d-flex justify-content-between flex-wrap">
                    <!-- Module 1 -->
                    @foreach($modulos as $modulo)
                        <div class="text-center p-3 border border-primary rounded mb-3 d-flex flex-column" style="flex: 1 1 calc(20% - .5rem);">
                            <i class="bi bi-{{ $loop->iteration }}-circle-fill fs-2 mb-2" style="background-color: #0d6efd; color: #fff; padding: .5rem; border-radius: .5rem;"></i>
                            <h5 class="mb-2">{{ $modulo->nombre }}</h5>
                        </div>
                    @endforeach
                </div>
              </div>
            </div>
<!-- END Services Section Item 5 -->
            <!-- Services Section Item 6 -->                
            <div class="col-12" data-aos="fade-up" data-aos-delay="600">
              <div class="service-card">

                <div class="d-flex align-items-center mb-3">
                  <i class="bi bi-currency-dollar fs-2 me-2"
                     style="background-color: #0d6efd; color: #fff; padding: .5rem; border-radius: .5rem;"></i>
                  <h3 class="service-title mb-0">Costos</h3>
                </div>

                <div class="d-flex justify-content-between flex-wrap">

                  <!-- Modalidad Presencial -->
                  <div class="text-center p-3 border border-primary rounded mb-3 d-flex flex-column"
                       style="flex: 1 1 calc(50% - .5rem);">
                    <h5 class="mb-2" style="font-weight: bold; color: #0d6efd;">Modalidad Presencial</h5>
                    <h4 class="mb-2">${{ number_format($servicio->costo_presencial, 0, ',', '.') }}</h4>
                    <div class="mt-auto text-center">
                      <a href="/formulario-pago-servicios/{{ $servicio->id }}/presencial" class="buy-btn">Pagar <i class="bi bi-arrow-right"></i></a>
                    </div>
                  </div>

                  <!-- Modalidad Virtual -->
                  <div class="text-center p-3 border border-primary rounded mb-3 d-flex flex-column"
                       style="flex: 1 1 calc(50% - .5rem);">
                    <h5 class="mb-2" style="font-weight: bold; color: #0d6efd;">Modalidad Virtual</h5>
                    <h4 class="mb-2">${{ number_format($servicio->costo_virtual, 0, ',', '.') }}</h4>
                    <div class="mt-auto text-center">
                      <a href="/formulario-pago-servicios/{{ $servicio->id }}/virtual" class="buy-btn">Pagar <i class="bi bi-arrow-right"></i></a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- END Services Section Item 6 -->

            <!-- Services Section Item 7 -->
            <div class="col-12" data-aos="fade-up" data-aos-delay="700">
              <div class="service-card">
                <div class="d-flex align-items-center mb-3">
                  <i class="bi bi-calendar-event fs-2 me-2" style="background-color: #0d6efd; color: #fff; padding: .5rem; border-radius: .5rem;"></i>
                  <h3 class="service-title mb-0">Agenda</h3>
                </div>
                <div class="d-flex justify-content-between flex-wrap">

                  <!-- Modalidad Presencial -->
                  <div class="text-center p-3 border border-primary rounded mb-3 d-flex flex-column" style="flex: 1 1 calc(50% - .5rem);">
                    <h5 class="mb-2" style="font-weight: bold; color: #0d6efd;">Modalidad Presencial:</h5>
                    <p class="mb-2">A continuación podrá ver las ciudades en las cuales está programado nuestro diplomado en modalidad presencial:</p>
                    <div class="mt-auto text-left">
                        <ul style="text-align: left; padding-left: 60px;">
                            @foreach($ciudades as $ciudad)
                                <li style="text-transform: capitalize;">{{ $ciudad->ciudad }}</li>
                            @endforeach
                        </ul>
                    </div>
                  </div>

                  <!-- Modalidad Virtual -->
                  <div class="text-center p-3 border border-primary rounded mb-3 d-flex flex-column" style="flex: 1 1 calc(50% - .5rem);">
                    <h5 class="mb-2" style="font-weight: bold; color: #0d6efd;">Modalidad Virtual:</h5>
                    <p class="mb-2">A continuación podrá ver las fechas en las cuales está programado nuestro diplomado en modalidad virtual:</p>
                    <div class="mt-auto text-left">
                        <ul style="text-align: left; padding-left: 60px;">
                            @foreach($agenda as $agenda)
                                <li style="text-transform: capitalize;">{{ $agenda->dia }} - {{ date('h:i A', strtotime($agenda->hora)) }} - {{ date('h:i A', strtotime($agenda->hora2)) }}</li>
                            @endforeach
                        </ul>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- END Services Section Item 7 -->
            <!-- Services Section Item 8 -->                
            <div class="col-12" data-aos="fade-up" data-aos-delay="800">
                <div class="service-card">

                    <!-- Título con ícono -->
                    <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-person-badge fs-2 me-2" 
                        style="background-color: #0d6efd; color: #fff; padding: .5rem; border-radius: .5rem;"></i>
                    <h3 class="service-title mb-0">Facilitador</h3>
                    </div>

                    <!-- Foto y nombre -->
                    <div class="d-flex align-items-center mb-4">
                    <img src="{{ asset('fotos_facilitadores/'.$facilitador->foto) }}"
                        alt="PhD (c) Antonio Martínez Suárez" 
                        class="rounded-circle me-3" 
                        style="width:100px; height:100px; object-fit:cover; border: 3px solid #0d6efd;">
                    <h4 class="fw-bold mb-0">{{ $facilitador->nombre }}</h4>
                    </div>

                    <!-- Datos de contacto -->
                    <div class="row text-center mb-4 gx-4">
                    <div class="col">
                        <i class="bi bi-phone fs-3 mb-1" 
                        style="background-color: #0d6efd; color: #fff; padding: .4rem; border-radius: .5rem;"></i>
                        <div>Celular: {{ $facilitador->celular }}</div>
                    </div>
                    <div class="col">
                        <i class="bi bi-whatsapp fs-3 mb-1" 
                        style="background-color: #0d6efd; color: #fff; padding: .4rem; border-radius: .5rem;"></i>
                        <div>Whatsapp: {{ $facilitador->whatsapp }}</div>
                    </div>
                    <div class="col">
                        <i class="bi bi-envelope fs-3 mb-1" 
                        style="background-color: #0d6efd; color: #fff; padding: .4rem; border-radius: .5rem;"></i>
                        <div>E-mail: {{ $facilitador->email }}</div>
                    </div>
                </div>

    <!-- Perfil y experiencia -->
                <div>
                    {!! $facilitador->descripcion !!}
                </div>

            </div>
        </div>
<!-- END Services Section Item 8 -->





<!-- Services Section Item 3 -->                     
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="caracteristicas" class="features-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto" data-aos="fade-up">
                    <h2 class="display-4 fw-bold mb-3">¿Por qué elegirnos?</h2>
                    <p class="lead text-muted">Más de 20 años de experiencia en docencia universitaria y en psicometría </p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Experiencia Certificada</h5>
                            <p>Equipo de psicólogos especializados con certificaciones internacionales en Psicología Organizacional, Clínica y Educativa.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Metodología Científica</h5>
                            <p>Utilizamos instrumentos validados y metodologías basadas en evidencia científica para garantizar resultados confiables.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Responsabilidad</h5>
                            <p>Cumplimiento de los cronogramas concertados con el cliente.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Acompañamiento Integral</h5>
                            <p>Asesorría y Oreintación permanente aclarando las dudas que se presenten.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Confidencialidad Garantizada</h5>
                            <p>Manejo seguro de la información con protocolos estrictos de confidencialidad y protección de datos.</p>
                        </div>
                    </div>
                    
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <div class="feature-content">
                            <h5>Soporte Continuo</h5>
                            <p>Asesoría permanente durante todo el proceso de evaluación e implementación de mejoras.</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="zoom-in">
                    <h2 class="cta-title">¿Listo para transformar su desarrollo profesional o el de sus colaboradores?</h2>
                    <p class="cta-subtitle">Contáctenos hoy mismo para recibir una asesoría personalizada y poner a su disposición nuestros conocimientos y gran experticia.</p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="#contacto" class="btn btn-light btn-lg">Solicitar Asesoría</a>
                        <a href="tel:+5730012990890" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-telephone me-2"></i>Llamar Ahora
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto" class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto" data-aos="fade-up">
                    <h2 class="display-4 fw-bold mb-3">Contáctenos</h2>
                    <p class="lead text-muted">Para recibir nuestro Boletin de Ofertas Laborales o conocer sus necesidades y planificar su satisfacción.
                    Estamos para transformar su desarrollo profesional y el bienestar de su organización</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">Información de Contacto</h4>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-telephone-fill text-primary me-3 fs-4"></i>
                                <div>
                                    <strong>Teléfono:</strong><br>
                                    +57 312 2627004<br>
                                    +57 300 2990890
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-envelope-fill text-primary me-3 fs-4"></i>
                                <div>
                                    <strong>Email:</strong><br>
                                    contacto@icp360rh.com<br>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-clock-fill text-primary me-3 fs-4"></i>
                                <div>
                                    <strong>Horario de Atención:</strong><br>
                                    Lunes a Viernes: 8:00 AM - 6:00 PM<br>
                                    Sábados: 9:00 AM - 1:00 PM
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">Solicitar Información</h4>
                            <form id="form_contacto" >
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label">Nombre completo *</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="empresa" class="form-label">Empresa *</label>
                                        <input type="text" class="form-control" id="empresa" name="empresa" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="tel" class="form-control" id="telefono" name="telefono">
                                    </div>
                                    <div class="col-12">
                                        <label for="servicio" class="form-label">Servicio de interés *</label>
                                       <select class="form-select" id="servicio" name="servicio" required>
                                            <option value="">Seleccione un servicio</option>
                                            <option value="Evaluación de Clima Laboral">Evaluación de Clima Laboral</option>
                                            <option value="Sistema Integral SIRP">Evaluación del Riesgo Psicosocial</option>
                                            <option value="Capacitación">Capacitación</option>
                                            <option value="Ofertas Laborales">Ofertas Laborales</option>
                                            <option value="Otro servicio">Otro servicio</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="mensaje" class="form-label">Mensaje</label>
                                        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" placeholder="Cuéntenos sobre su proyecto o inquietudes..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="button"  class="btn btn-primary w-100" onclick="enviarCorreoContacto()">Enviar Solicitud</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container" style="margin-top: 10px; margin-bottom: 40px;">
        <h3 style="font-family: 'Lucida Calligraphy'; font-size: 2.2rem; font-weight: bold; text-align: center; color: red;">
            Invierte Bien, Invierte en Tí. <br> Capacítate y Asesórate con Nosotros
        </h3>
    </div>
<!-- Footer -->
<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="row g-4">
      
      <!-- Marca -->
      <div class="col-lg-3">
        <h5>Instituto Colombiano de Psicometría</h5>
        <p>Especialistas en evaluación organizacional y gestión del riesgo psicosocial. Transformamos datos en decisiones estratégicas para el bienestar de su organización.</p>
        <div class="social-links">
          <a href="https://www.facebook.com/incolpsicometrias"><i class="bi bi-facebook"></i></a>
          <a href="https://wa.me/5730012990890"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>

      <!-- Servicios -->
      <div class="col-lg-7">
        <h5 class="text-left">Servicios</h5>
        <div class="row">
          <div class="col-6">
            <ul class="list-unstyled">
              <li><a href="#servicios">Diplomado en Técnicas ABA</a></li>
              <li><a href="#servicios">Diplomado en Psicología Organizacional: Perfiles y Selección</a></li>
              <li><a href="#servicios">Cursos sobre Pruebas Psicotécnicas</a></li>
              <li><a href="#servicios">Riesgo Psicosocial</a></li>
              <li><a href="#servicios">Evaluación del Riesgo Psicosocial: SIRP v3.0</a></li>
            </ul>
          </div>
          <div class="col-6">
            <ul class="list-unstyled">
              <li><a href="#servicios">Evaluación del Clima Laboral</a></li>
              <li><a href="#servicios">Formación y Capacitación</a></li>
              <li><a href="#servicios">Reclutamiento y Selección de Personal</a></li>
              <li><a href="#servicios">Asesoría Metodológica y Estadística</a></li>
              <li><a href="#servicios">Construcción y Validación de Instrumentos de Medición</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Empresa -->
      <div class="col-lg-2">
        <h5>Empresa</h5>
        <ul class="list-unstyled">
          <li><a href="#inicio">Inicio</a></li>
          <li><a href="#caracteristicas">Nosotros</a></li>
          <li><a href="#contacto">Contacto</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>

    </div>

    <hr class="my-4">

    <div class="row align-items-center">
      <div class="col-md-6">
        <p class="mb-0">&copy; {{ date('Y') }} Instituto Colombiano de Psicometría. Todos los derechos reservados.</p>
      </div>
      <div class="col-md-6 text-md-end">
        <a href="#" class="text-decoration-none me-3">Política de Privacidad</a>
        <a href="#" class="text-decoration-none">Términos de Servicio</a>
      </div>
    </div>
  </div>
</footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true
        });
        
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
            }
        });
    </script>
   <script>
    function enviarCorreoContacto() {
        if(!validarFormulario()) {
            Swal.fire({
                title: 'Error',
                text: 'Por favor, complete todos los campos obligatorios.',
                icon: 'error'
            });
            return;
        }else{
            $.ajax({
                url: '/enviar-correo-contacto',
                type: 'POST',
                data: $('#form_contacto').serialize(),
                beforeSend: function() {
                    Swal.fire({
                        title: 'Espere un momento...',
                        text: 'Estamos procesando su solicitud.',
                        icon: 'info',
                        showConfirmButton: false,
                        showCancelButton: false,
                        showCloseButton: false,
                        allowOutsideClick: false,
                        didOpen: function() {
                            Swal.showLoading();
                        }
                    });
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if(data.status == 'success') {
                        Swal.fire({
                            title: '¡Gracias por su interés!',
                            text: data.message,
                            icon: 'success'
                        });
                        limpiarFormulario();
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: data.message,
                            icon: 'error'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error al enviar su solicitud. Por favor, inténtelo de nuevo.',
                        icon: 'error'
                    });
                }
            });
        }
    }

    function validarFormulario() {
        const nombre = $('#nombre').val();
        const empresa = $('#empresa').val();
        const email = $('#email').val();
        const telefono = $('#telefono').val();
        const servicio = $('#servicio').val();
        const mensaje = $('#mensaje').val();
        if(nombre === '' || empresa === '' || email === '' || servicio === '' || mensaje === '') {
           return false;
        }
        return true;
    }

    function limpiarFormulario() {
        $('#form_contacto')[0].reset();
    }
   </script>
</body>
</html>