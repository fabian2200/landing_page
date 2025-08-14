<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias - ICP360RH | Instituto Colombiano de Psicometría</title>
    
    <!-- Meta Description -->
    <meta name="description" content="Gracias por solicitar la evaluación de clima organizacional por pines. Nuestro equipo se pondrá en contacto con usted pronto.">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://icp360rh.com/gracias">
    <meta property="og:title" content="Gracias - ICP360RH | Instituto Colombiano de Psicometría">
    <meta property="og:description" content="Gracias por solicitar la evaluación de clima organizacional por pines. Nuestro equipo se pondrá en contacto con usted pronto.">
    <meta property="og:image" content="{{ asset('inicio/assets/img/heroicp.jpg') }}">
    
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #0ea2bd;
            --secondary-color: #1e3a8a;
            --accent-color: #f59e0b;
            --text-color: #374151;
            --light-bg: #f8fafc;
            --white: #ffffff;
            --success-color: #10b981;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background: linear-gradient(135deg, #2563eb 0%, #2563eb 100%);
            min-height: 100vh;
        }

        .gracias-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .gracias-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            padding: 3rem;
            text-align: center;
            max-width: 600px;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .gracias-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .logo {
            width: 50px;
            height: auto;
            margin-bottom: 1rem;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: var(--success-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            animation: pulse 2s infinite;
        }

        .success-icon i {
            font-size: 2.5rem;
            color: white;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            }
            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        .gracias-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .gracias-message {
            font-size: 1.1rem;
            color: var(--text-color);
            margin-bottom: 2.5rem;
            line-height: 1.8;
        }

        .buttons-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-custom {
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 180px;
            justify-content: center;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(14, 162, 189, 0.3);
            color: white;
        }

        .btn-secondary-custom {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-secondary-custom:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(14, 162, 189, 0.3);
        }

        .contact-info {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e5e7eb;
        }

        .contact-info h5 {
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .contact-details {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-color);
            font-size: 0.9rem;
        }

        .contact-item i {
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .gracias-container {
                padding: 1rem;
            }
            
            .gracias-card {
                padding: 2rem;
            }
            
            .gracias-title {
                font-size: 2rem;
            }
            
            .buttons-container {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-custom {
                width: 100%;
                max-width: 280px;
            }
            
            .contact-details {
                flex-direction: column;
                gap: 1rem;
            }
        }

        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .shape {
            position: absolute;
            background: rgba(14, 162, 189, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 20%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 40px;
            height: 40px;
            bottom: 20%;
            left: 15%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .logo-text {
            text-align: left;
            color: red;
            font-size: 14px;
            font-family: 'Lucida Calligraphy'
        }
    </style>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136347250-1"></script>
    <script defer>
    window.dataLayer = window.dataLayer || [];
    function gtag(){ dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'UA-136347250-1');
    </script>
    <script defer>
    !function(f,b,e,v,n,t,s){
        if(f.fbq) return;
        n=f.fbq=function(){ n.callMethod ?
        n.callMethod.apply(n,arguments) : n.queue.push(arguments) };
        if(!f._fbq) f._fbq=n;
        n.push=n; n.loaded=!0; n.version='2.0';
        n.queue=[]; t=b.createElement(e); t.async=!0;
        t.src=v; s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s);
    }(
        window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js'
    );
    fbq('init','369697576791984');
    fbq('track','Lead');
    </script>
</head>
<body>
    <div class="gracias-container">
        <div class="gracias-card" data-aos="fade-up" data-aos-duration="1000">
            <!-- Floating shapes for decoration -->
            <div class="floating-shapes">
                <div class="shape"></div>
                <div class="shape"></div>
                <div class="shape"></div>
            </div>

            <!-- Logo -->
            <div class="logo-container">
                <img src="{{ asset('inicio/assets/img/icono-icp.png') }}" alt="ICP360RH Logo" class="logo">
                <h6 class="logo-text">Instituto Colombiano <br> de Psicometría</h6>
            </div>

            <!-- Title -->
            <h1 class="gracias-title">¡Gracias!</h1>

            <!-- Message -->
            <p class="gracias-message">
                Gracias por solicitar información sobre el servicio <strong style="color: #2563eb;">{{ $servicio }}</strong>. 
                Nuestro equipo se pondrá en contacto con usted pronto.
            </p>

            <!-- Buttons -->
            <div class="buttons-container">
                <a href="{{ url('/') }}" class="btn-custom btn-primary-custom">
                    <i class="bi bi-house-fill"></i>
                    Volver al inicio
                </a>
                <a href="{{ url('/#servicios') }}" class="btn-custom btn-secondary-custom">
                    <i class="bi bi-gear-fill"></i>
                    Ver otros servicios
                </a>
            </div>

            <!-- Contact Information -->
            <div class="contact-info">
                <h5>¿Tiene alguna pregunta?</h5>
                <div class="contact-details">
                    <div class="contact-item">
                        <i class="bi bi-telephone-fill"></i>
                        <span>+57 301 299 0890</span>
                    </div>
                    <div class="contact-item">
                        <i class="bi bi-telephone-fill"></i>
                        <span>+57 300 299 0890</span>
                    </div>
                    <div class="contact-item">
                        <i class="bi bi-envelope-fill"></i>
                        <span>contacto@icp360rh.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true
        });

        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add click effect to buttons
            const buttons = document.querySelectorAll('.btn-custom');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    // Create ripple effect
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
    </script>
</body>
</html>
