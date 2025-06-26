# Landing Page - Instituto Colombiano de Psicometría (ICP)

## 📋 Descripción del Proyecto

Esta es una aplicación web desarrollada en Laravel que sirve como landing page para el Instituto Colombiano de Psicometría (ICP). La aplicación permite a los usuarios comprar paquetes de pines para evaluaciones psicológicas a través de diferentes métodos de pago, incluyendo PSE (Pagos Seguros en Línea) y tarjetas de crédito/débito.

## 🚀 Características Principales

- **Catálogo de Paquetes**: Visualización de paquetes de pines disponibles
- **Procesamiento de Pagos**: Integración con MercadoPago para PSE y tarjetas
- **Gestión de Pedidos**: Sistema de seguimiento y administración de pedidos
- **Notificaciones por Email**: Envío automático de confirmaciones y credenciales
- **Interfaz Responsiva**: Diseño adaptativo con Tailwind CSS
- **API Externa**: Integración con sistema de evaluación climática

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 11.9** - Framework PHP
- **PHP 8.2+** - Lenguaje de programación
- **MySQL** - Base de datos
- **MercadoPago SDK** - Procesamiento de pagos
- **PHPMailer** - Envío de correos electrónicos

### Frontend
- **Tailwind CSS** - Framework CSS
- **Vite** - Build tool
- **Alpine.js** - JavaScript framework
- **Bootstrap** - Componentes UI

### Integraciones
- **MercadoPago API** - Procesamiento de pagos
- **API Externa** - Sistema de evaluación climática

## 📁 Estructura del Proyecto

```
landing/
├── app/
│   ├── Http/Controllers/
│   │   ├── TerminarPagoController.php    # Controlador principal de pagos
│   │   ├── EmailController.php           # Gestión de correos electrónicos
│   │   └── UsuarioController.php         # Gestión de usuarios
│   ├── Models/
│   │   └── User.php                      # Modelo de usuario
│   └── Providers/
├── resources/
│   └── views/
│       ├── welcome.blade.php             # Página principal
│       ├── inicio.blade.php              # Página de inicio
│       ├── paquetes.blade.php            # Catálogo de paquetes
│       ├── formularioPagoTarjeta.blade.php # Formulario de pago
│       ├── pedidos.blade.php             # Gestión de pedidos
│       └── errorPage.blade.php           # Página de error
├── routes/
│   ├── web.php                           # Rutas web principales
│   └── api.php                           # Rutas API
└── public/
    ├── assets/                           # Archivos estáticos
    ├── img/                              # Imágenes
    └── css/                              # Estilos CSS
```

## 🔧 Instalación y Configuración

### Prerrequisitos
- PHP 8.2 o superior
- Composer
- Node.js y npm
- MySQL/MariaDB
- Servidor web (Apache/Nginx)

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone <repository-url>
   cd landing
   ```

2. **Instalar dependencias PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias Node.js**
   ```bash
   npm install
   ```

4. **Configurar variables de entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configurar la base de datos**
   ```bash
   php artisan migrate
   ```

6. **Compilar assets**
   ```bash
   npm run build
   ```

### Variables de Entorno Requeridas

```env
# Base de datos
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=landing_db
DB_USERNAME=your_username
DB_PASSWORD=your_password

# MercadoPago
MP_ACCESS_TOKEN=your_mercadopago_access_token

# Email
MAIL_HOST=mail.climalaborald10.com
MAIL_USERNAME=_mainaccount@climalaborald10.com
MAIL_PASSWORD=your_email_password
MAIL_PORT=587
MAIL_ENCRYPTION=tls
```

## 🚀 Uso

### Desarrollo
```bash
# Iniciar servidor de desarrollo
php artisan serve

# Compilar assets en modo desarrollo
npm run dev

# Ejecutar todos los servicios (servidor, cola, logs, vite)
composer run dev
```

### Producción
```bash
# Compilar assets para producción
npm run build

# Optimizar la aplicación
php artisan optimize
```

## 📊 Funcionalidades Principales

### 1. Gestión de Paquetes
- Listado de paquetes disponibles desde API externa
- Visualización de precios, descuentos y características
- Selección de paquetes para compra

### 2. Procesamiento de Pagos
- **PSE (Pagos Seguros en Línea)**
  - Integración con bancos colombianos
  - Validación de datos del pagador
  - Redirección a portal bancario

- **Tarjetas de Crédito/Débito**
  - Procesamiento seguro con MercadoPago
  - Validación de tarjetas en tiempo real
  - Manejo de cuotas

### 3. Gestión de Pedidos
- Almacenamiento de transacciones
- Seguimiento de estado de pagos
- Historial de pedidos
- Envío de credenciales por email

### 4. Notificaciones
- Confirmación de pedido recibido
- Envío de credenciales de acceso
- Notificaciones de estado de pago
- Alertas de errores en transacciones

## 🔌 API Endpoints

### Rutas Principales
- `GET /` - Página principal
- `GET /paquetes` - Catálogo de paquetes
- `GET /formulario-pago` - Formulario de pago
- `POST /procesar-pago` - Procesar pago PSE
- `POST /procesar-pago-tarjeta` - Procesar pago con tarjeta
- `GET /estado-pago` - Verificar estado de pago
- `GET /pedidos` - Gestión de pedidos

### API Externa
- `https://evaluacion.climalaborald10.com/api/listar-paquetes`
- `https://evaluacion.climalaborald10.com/api/buscar-paquete`

## 🧪 Testing

```bash
# Ejecutar tests
php artisan test

# Ejecutar tests con coverage
php artisan test --coverage
```

## 📝 Documentación Adicional

### Archivos de Documentación
- `terminos-y-condiciones.docx` - Términos y condiciones del servicio
- `politica_de_privacidad.docx` - Política de privacidad
- `eliminacion-datos-usuario.docx` - Política de eliminación de datos

### Configuración de MercadoPago
La aplicación utiliza MercadoPago para el procesamiento de pagos. Se requiere:
- Token de acceso de MercadoPago
- Configuración de webhooks para notificaciones
- Configuración de URLs de retorno

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 📞 Soporte

Para soporte técnico o consultas sobre el proyecto, contactar a:
- **Email**: incolpsicometria@gmail.com
- **Sitio Web**: Instituto Colombiano de Psicometría

## 🔄 Changelog

### Versión 1.0.0
- Implementación inicial del sistema de pagos
- Integración con MercadoPago
- Sistema de notificaciones por email
- Gestión de paquetes y pedidos

---

**Desarrollado por el equipo del Instituto Colombiano de Psicometría (ICP)**
