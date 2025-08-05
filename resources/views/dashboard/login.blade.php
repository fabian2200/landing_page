<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar Sesión - Dashboard ICP360RH</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 0px 20px rgba(0, 0, 0, 0.4);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .login-header {
            background: linear-gradient(135deg, #000000 0%, #585858 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .login-header h2 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .login-header p {
            opacity: 0.9;
            font-size: 0.9rem;
        }
        
        .login-body {
            padding: 2rem;
        }
        
        .form-floating {
            margin-bottom: 1.5rem;
        }
        
        .form-floating .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 1rem 0.75rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-floating .form-control:focus {
            border-color:rgb(8, 8, 8);
            box-shadow: 0 0 0 0.2rem rgba(32, 32, 32, 0.25);
        }
        
        .form-floating label {
            color: #6c757d;
            font-weight: 500;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #000000 0%, #585858 100%);
            border: none;
            border-radius: 12px;
            padding: 0.75rem;
            font-weight: 600;
            font-size: 1rem;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            color: white;
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .btn-login .spinner-border {
            width: 1rem;
            height: 1rem;
            margin-right: 0.5rem;
        }
        
        .input-group-text {
            background: transparent;
            border: 2px solid #e9ecef;
            border-right: none;
            border-radius: 12px 0 0 12px;
            color: #6c757d;
        }
        
        .input-group .form-control {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }
        
        .input-group .form-control:focus {
            border-color:rgb(8, 8, 8);
            box-shadow: none;
        }
        
        
        
        .password-toggle {
            cursor: pointer;
            transition: color 0.3s ease;
            border-radius: 12px;
            border: 2px solid #e9ecef;
        }
        
        .password-toggle:hover {
            color:rgb(22, 22, 22);
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            font-weight: 500;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            color: white;
        }
        
        .alert-success {
            background: linear-gradient(135deg, #51cf66 0%, #40c057 100%);
            color: white;
        }
        
        .form-check-input:checked {
            background-color:rgb(22, 22, 22);
            border-color:rgb(22, 22, 22);
        }
        
        .form-check-label {
            color: #6c757d;
            font-weight: 500;
        }
        
        .forgot-password {
            color:rgb(22, 22, 22);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .forgot-password:hover {
            color:rgb(22, 22, 22);
        }
        
        .logo-container {
            margin-bottom: 1rem;
        }
        
        .logo-container img {
            width: 60px;
            height: 60px;
            border-radius: 12px;
        }
        
        @media (max-width: 576px) {
            .login-container {
                margin: 1rem;
                border-radius: 15px;
            }
            
            .login-header,
            .login-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo-container">
                <img src="/logo-icp.png" alt="ICP360RH Logo" class="img-fluid">
            </div>
            <h2>Bienvenido</h2>
            <p>Inicia sesión en tu cuenta</p>
        </div>
        
        <div class="login-body">
            <div id="alert-container"></div>
            
            <form id="loginForm">
                <div class="form-floating">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Usuario" required>
                    <label for="email">
                        <i class="fas fa-user me-2"></i>Usuario
                    </label>
                </div>
                
                <div class="form-floating">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                        <span class="input-group-text password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="passwordToggle"></i>
                        </span>
                    </div>
                </div>
                <br>
                
                
                <button type="submit" class="btn btn-login" id="loginBtn">
                    <span class="btn-text">
                        <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                    </span>
                    <span class="btn-loading d-none">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Iniciando sesión...
                    </span>
                </button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <script>
        // Configurar CSRF token para Ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       
        // Función para alternar visibilidad de contraseña
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.getElementById('passwordToggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordToggle.classList.remove('fa-eye');
                passwordToggle.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordToggle.classList.remove('fa-eye-slash');
                passwordToggle.classList.add('fa-eye');
            }
        }
        
        // Manejo del formulario de login
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();
            
            const formData = {
                usuario: $('#email').val(),
                password: $('#password').val(),
            };
            
            // Validaciones básicas
            if (!formData.usuario || !formData.password) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Por favor, completa todos los campos requeridos.',
                });
                return;
            }
       
            
            // Enviar petición Ajax
            $.ajax({
                url: '/iniciar-sesion',
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Inicio de sesión exitoso. Redirigiendo...',
                            showConfirmButton: false,
                        });
                        setTimeout(() => {
                            window.location.href = '/dashboard';
                        }, 1500);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.mensaje,
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error en el servidor. Intenta nuevamente.',
                    });
                },
            });
        });
        
        // Animación de entrada para los campos
        $(document).ready(function() {
            $('.form-floating').each(function(index) {
                $(this).css({
                    'opacity': '0',
                    'transform': 'translateY(20px)'
                }).delay(index * 100).animate({
                    'opacity': '1',
                    'transform': 'translateY(0)'
                }, 600);
            });
            
            // Auto-dismiss alerts after 5 seconds
            setTimeout(function() {
                $('.alert').fadeOut();
            }, 5000);
        });
        
        // Efecto de hover en el botón
        $('#loginBtn').hover(
            function() {
                $(this).css('transform', 'translateY(-2px)');
            },
            function() {
                $(this).css('transform', 'translateY(0)');
            }
        );
    </script>
</body>
</html>