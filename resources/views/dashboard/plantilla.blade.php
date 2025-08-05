<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets-dashboard/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets-dashboard/img/favicon.png">
  <title>
    Dashboard ICP360RH
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="/assets-dashboard/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets-dashboard/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets-dashboard/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  
  <style>
    .form-control {
        display: block;
        width: 100%;
        padding: 0.5rem 0.5rem 0.5rem 0.5rem !important;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1.5rem;
        color: #404040;
        appearance: none;
        background-color: transparent;
        background-clip: padding-box;
        border: 1px solid #d2d6da;
        border-radius: 0.375rem;
        transition: 0.2s ease;
    }

    .form-control:focus, .form-control:active, .form-control:hover {
      border: 1px solid #d2d6da !important;
    }

    .ck-editor__editable_inline {
        min-height: 200px;
    }
  </style>
  
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="/assets-dashboard/img/logo-ct-dark.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
        <span class="ms-1 text-sm text-dark">Dashboard ICP360RH</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active bg-gradient-dark text-white' : '' }} text-dark " href="/dashboard">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Servicios</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/clima') ? 'active bg-gradient-dark text-white' : '' }} text-dark" href="/enlaces">
            <i class="material-symbols-rounded opacity-5">table_view</i>
            <span class="nav-link-text ms-1">Enlaces</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('facilitadores') ? 'active bg-gradient-dark text-white' : '' }} text-dark" href="/facilitadores">
            <i class="material-symbols-rounded opacity-5">person</i>
            <span class="nav-link-text ms-1">Facilitadores</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  fixed-plugin-button text-dark" href="#">
            <i class="material-symbols-rounded">settings</i>
            <span class="nav-link-text ms-1">Configuración</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a onclick="cerrarSesion()" class="btn bg-gradient-dark w-100" href="#" type="button"><i class="material-symbols-rounded">logout</i> Cerrar sesión</a>
      </div>
    </div>
  </aside>
  <main class="main-content">
   
    <!-- End Navbar -->
    <div class="container-fluid py-2 p-2">
        @yield('content')
    </div>
  </main>

  <div class="fixed-plugin">
    
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Configuración</h5>
          <p>Configura el dashboard.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-symbols-rounded">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Colores</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark active" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Tipo de sidebar</h6>
          <p class="text-sm">Elige entre diferentes tipos de sidebar.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2" data-class="bg-gradient-dark" onclick="sidebarType(this)">Oscuro</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparente</button>
          <button class="btn bg-gradient-dark px-3 mb-2  active ms-2" data-class="bg-white" onclick="sidebarType(this)">Claro</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar fijo</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Claro / Oscuro</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="/assets-dashboard/js/core/popper.min.js"></script>
  <script src="/assets-dashboard/js/core/bootstrap.min.js"></script>
  <script src="/assets-dashboard/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets-dashboard/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets-dashboard/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets-dashboard/js/material-dashboard.min.js?v=3.2.0"></script>
  
  <script>
    function cerrarSesion(){
      Swal.fire({
        title: '¿Estás seguro?',
        text: '¿Deseas cerrar sesión?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',    
        confirmButtonText: 'Si, cerrar sesión',
        cancelButtonText: 'Cancelar',
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '/cerrar-sesion',    
            type: 'GET',
            beforeSend: function(){
              Swal.fire({
                title: 'Cerrando sesión...',
                text: 'Espera un momento',
                icon: 'info',
                showConfirmButton: false,
                didOpen: function(){
                  Swal.showLoading();
                }
              });
            },
            success: function(response){
              window.location.href = '/login';
            }
          });
        }
      });
    }
  </script>
</body>

</html>