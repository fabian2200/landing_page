<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Integral SIRP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);
            min-height: 100vh;
        }
        .hero {
            padding: 80px 0 40px 0;
            background: linear-gradient(120deg, #6366f1 0%, #60a5fa 100%);
            color: #fff;
            border-radius: 0 0 40px 40px;
            box-shadow: 0 4px 24px rgba(99,102,241,0.1);
        }
        .feature-icon {
            font-size: 2.5rem;
            color: #6366f1;
        }
        .card {
            border: none;
            box-shadow: 0 2px 12px rgba(99,102,241,0.07);
        }
        .footer {
            background: #6366f1;
            color: #fff;
            padding: 20px 0;
            border-radius: 40px 40px 0 0;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header class="hero text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Sistema Integral SIRP</h1>
            <p class="lead mt-3">Sistema Integral para la Elaboración de los Informes de la Batería del Riesgo Psicosocial</p>
            <p class="mb-4">Cumplimiento normativo y gestión preventiva del riesgo psicosocial en el trabajo.</p>
        </div>
    </header>

    <section class="container py-5">
        <div class="row text-center mb-5">
            <div class="col">
                <h2 class="fw-bold">¿Por qué elegir SIRP?</h2>
                <p class="text-muted">Optimiza la gestión del riesgo psicosocial en tu organización y cumple con la normativa vigente.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-4 h-100">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5 class="fw-bold">Cumplimiento Normativo</h5>
                    <p>Genera informes conforme a la legislación sobre riesgos psicosociales, asegurando la protección legal de tu empresa.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 h-100">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-bar-chart-line"></i>
                    </div>
                    <h5 class="fw-bold">Gestión Preventiva</h5>
                    <p>Identifica, evalúa y previene factores de riesgo psicosocial con herramientas intuitivas y reportes claros.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 h-100">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-people"></i>
                    </div>
                    <h5 class="fw-bold">Facilidad de Uso</h5>
                    <p>Interfaz amigable y accesible desde cualquier dispositivo, sin necesidad de instalaciones complejas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Paquetes -->
    <section class="container py-5" id="paquetes">
        <div class="row text-center mb-5">
            <div class="col">
                <h2 class="fw-bold">Nuestros Paquetes</h2>
                <p class="text-muted">Elige el paquete que mejor se adapte a las necesidades de tu organización.</p>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card h-100 border-primary">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary">Básico</h5>
                        <ul class="list-unstyled my-3">
                            <li>✔ Generación de informes básicos</li>
                            <li>✔ Cumplimiento normativo</li>
                            <li>✔ Soporte por correo</li>
                        </ul>
                        <div class="mb-3">
                            <span class="fs-4 fw-bold">$</span><span class="fs-2 fw-bold">99</span><span class="text-muted">/año</span>
                        </div>
                        <a href="/paquetes-sirp" class="btn btn-outline-primary w-100">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-success">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-success">Profesional</h5>
                        <ul class="list-unstyled my-3">
                            <li>✔ Todo lo del Básico</li>
                            <li>✔ Reportes avanzados</li>
                            <li>✔ Acceso multiusuario</li>
                            <li>✔ Soporte prioritario</li>
                        </ul>
                        <div class="mb-3">
                            <span class="fs-4 fw-bold">$</span><span class="fs-2 fw-bold">199</span><span class="text-muted">/año</span>
                        </div>
                        <a href="/paquetes-sirp" class="btn btn-success w-100">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-warning">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-warning">Empresarial</h5>
                        <ul class="list-unstyled my-3">
                            <li>✔ Todo lo del Profesional</li>
                            <li>✔ Integraciones personalizadas</li>
                            <li>✔ Capacitación y consultoría</li>
                            <li>✔ Soporte 24/7</li>
                        </ul>
                        <div class="mb-3">
                            <span class="fs-4 fw-bold">$</span><span class="fs-2 fw-bold">299</span><span class="text-muted">/año</span>
                        </div>
                        <a href="/paquetes-sirp" class="btn btn-warning w-100">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer text-center">
        <div class="container">
            <small>&copy; {{ date('Y') }} Sistema Integral SIRP. Todos los derechos reservados.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>
