<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Colombiano de Psicometría | Evaluación de Clima Laboral y SIRP</title>
    
    <!-- Meta Description -->
    <meta name="description" content="Especialistas en evaluación de clima laboral y Sistema Integral para la Elaboración de Informes de Riesgo Psicosocial (SIRP). Soluciones integrales para el bienestar organizacional.">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Instituto Colombiano de Psicometría | Evaluación de Clima Laboral y SIRP">
    <meta property="og:description" content="Especialistas en evaluación de clima laboral y Sistema Integral para la Elaboración de Informes de Riesgo Psicosocial (SIRP).">
    <meta property="og:image" content="{{ asset('inicio/assets/img/icp-logo.png') }}">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('inicio/assets/img/icono-icp.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('inicio/assets/img/icono-icp.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
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
        
        .btn-outline-primary {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }
        
        .hero-section {
            background: var(--gradient-primary);
            color: white;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
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
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
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
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .cta-title {
                font-size: 2rem;
            }
            
            .service-card {
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('inicio/assets/img/icono-icp.png') }}" alt="ICP Logo" height="40" class="me-2">
                Instituto Colombiano de Psicometría
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#caracteristicas">Características</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                </ul>
                <a href="#contacto" class="btn btn-primary ms-3">Solicitar Información</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content" data-aos="fade-right">
                    <h1 class="hero-title">Soluciones Integrales en Psicometría Organizacional</h1>
                    <p class="hero-subtitle">Especialistas en evaluación de clima laboral y gestión del riesgo psicosocial. Transformamos datos en decisiones estratégicas para el bienestar de su organización.</p>
                    <div class="d-flex gap-3">
                        <a href="#servicios" class="btn btn-light btn-lg">Conocer Servicios</a>
                        <a href="#contacto" class="btn btn-outline-light btn-lg">Contactar</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="{{ asset('inicio/assets/img/hero-bg.jpg') }}" alt="Psicometría Organizacional" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicios" class="services-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto" data-aos="fade-up">
                    <h2 class="display-4 fw-bold mb-3">Nuestros Servicios Especializados</h2>
                    <p class="lead text-muted">Ofrecemos soluciones integrales para evaluar y mejorar el ambiente laboral de su organización</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h3 class="service-title">Evaluación de Clima Laboral</h3>
                        <p class="service-description">Diagnóstico integral del ambiente organizacional mediante instrumentos psicométricos validados. Identificamos factores que impactan la satisfacción, motivación y productividad de sus colaboradores.</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Instrumentos validados científicamente</li>
                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Análisis estadístico avanzado</li>
                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Reportes ejecutivos detallados</li>
                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Recomendaciones estratégicas</li>
                        </ul>
                        <a href="/clima" class="btn btn-primary mt-3">Mas información</a>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h3 class="service-title">Sistema Integral SIRP</h3>
                        <p class="service-description">Sistema Integral para la Elaboración de los Informes de la Batería del Riesgo Psicosocial. Cumplimiento normativo y gestión preventiva del riesgo psicosocial en el trabajo.</p>
                        <ul class="list-unstyled">
                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Cumplimiento Resolución 2646</li>
                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Batería completa de evaluación</li>
                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Generación automática de informes</li>
                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Seguimiento y monitoreo continuo</li>
                        </ul>
                        <a href="/sirp" class="btn btn-primary mt-3">Mas información</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="caracteristicas" class="features-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto" data-aos="fade-up">
                    <h2 class="display-4 fw-bold mb-3">¿Por qué elegirnos?</h2>
                    <p class="lead text-muted">Más de 15 años de experiencia en psicometría organizacional</p>
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
                            <p>Equipo de psicólogos especializados con certificaciones internacionales en psicometría y evaluación organizacional.</p>
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
                            <h5>Entrega Oportuna</h5>
                            <p>Compromiso con plazos de entrega que se adaptan a las necesidades de su organización.</p>
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
                            <p>No solo entregamos resultados, sino que acompañamos la implementación de las recomendaciones.</p>
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
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="zoom-in">
                    <h2 class="cta-title">¿Listo para transformar su ambiente laboral?</h2>
                    <p class="cta-subtitle">Contáctenos hoy mismo para recibir una asesoría personalizada y descubrir cómo podemos ayudar a su organización.</p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="#contacto" class="btn btn-light btn-lg">Solicitar Asesoría</a>
                        <a href="tel:+573001234567" class="btn btn-outline-light btn-lg">
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
                    <p class="lead text-muted">Estamos aquí para ayudarle a mejorar el bienestar de su organización</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">Información de Contacto</h4>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-geo-alt-fill text-primary me-3 fs-4"></i>
                                <div>
                                    <strong>Dirección:</strong><br>
                                    Calle 123 # 45-67, Bogotá D.C.<br>
                                    Colombia
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-telephone-fill text-primary me-3 fs-4"></i>
                                <div>
                                    <strong>Teléfono:</strong><br>
                                    +57 (1) 123 4567<br>
                                    +57 300 123 4567
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-envelope-fill text-primary me-3 fs-4"></i>
                                <div>
                                    <strong>Email:</strong><br>
                                    info@icp-colombia.com<br>
                                    contacto@icp-colombia.com
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
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label">Nombre completo *</label>
                                        <input type="text" class="form-control" id="nombre" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="empresa" class="form-label">Empresa *</label>
                                        <input type="text" class="form-control" id="empresa" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="tel" class="form-control" id="telefono">
                                    </div>
                                    <div class="col-12">
                                        <label for="servicio" class="form-label">Servicio de interés *</label>
                                        <select class="form-select" id="servicio" required>
                                            <option value="">Seleccione un servicio</option>
                                            <option value="clima">Evaluación de Clima Laboral</option>
                                            <option value="sirp">Sistema Integral SIRP</option>
                                            <option value="ambos">Ambos servicios</option>
                                            <option value="otro">Otro servicio</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="mensaje" class="form-label">Mensaje</label>
                                        <textarea class="form-control" id="mensaje" rows="4" placeholder="Cuéntenos sobre su proyecto o inquietudes..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100">Enviar Solicitud</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h5>Instituto Colombiano de Psicometría</h5>
                    <p>Especialistas en evaluación organizacional y gestión del riesgo psicosocial. Transformamos datos en decisiones estratégicas para el bienestar de su organización.</p>
                    <div class="social-links">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2">
                    <h5>Servicios</h5>
                    <ul class="list-unstyled">
                        <li><a href="#servicios">Clima Laboral</a></li>
                        <li><a href="#servicios">Sistema SIRP</a></li>
                        <li><a href="#servicios">Consultoría</a></li>
                        <li><a href="#servicios">Capacitación</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2">
                    <h5>Empresa</h5>
                    <ul class="list-unstyled">
                        <li><a href="#inicio">Inicio</a></li>
                        <li><a href="#caracteristicas">Nosotros</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-4">
                    <h5>Newsletter</h5>
                    <p>Suscríbase para recibir las últimas noticias y actualizaciones sobre psicometría organizacional.</p>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Su email">
                        <button class="btn btn-primary" type="button">Suscribir</button>
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2024 Instituto Colombiano de Psicometría. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-decoration-none me-3">Política de Privacidad</a>
                    <a href="#" class="text-decoration-none">Términos de Servicio</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
        
        // Form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('¡Gracias por su interés! Nos pondremos en contacto con usted pronto.');
        });
    </script>
</body>
</html>
