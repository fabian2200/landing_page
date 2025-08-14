@extends('dashboard.plantilla')

@section('content')
<style>
    th{
        font-size: 1.1rem;
        background-color:rgb(17, 23, 29) !important;
        color: white !important;
    }
    td{
        font-size: 1rem;
        border: 1px solidrgb(90, 90, 90) !important;
    }
</style>
<div class="container" style="padding-top: 20px;">
  <div class="row">
    <div class="col-6">
      <h3>Servicios</h3>
    </div>
  </div>
  <div class="row">
      <div class="col-lg-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Cursos</p>
                  <h4 class="mb-0">{{ $cursos }}</h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">school</i>
                </div>
              </div>
            </div>
            <div class="card-footer p-2 ps-3">
          </div>
          </div>
      </div>
      <div class="col-lg-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Diplomados</p>
                  <h4 class="mb-0">{{ $diplomados }}</h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">school</i>
                </div>
              </div>
            </div>
            <div class="card-footer p-2 ps-3">
            </div>
          </div>
      </div>
      <div class="col-lg-4">
          <div class="card">
            <div class="card-header p-2 ps-3">
              <div class="d-flex justify-content-between">
                <div>
                  <p class="text-sm mb-0 text-capitalize">Pruebas</p>
                  <h4 class="mb-0">{{ $pruebas }}</h4>
                </div>
                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                  <i class="material-symbols-rounded opacity-10">school</i>
                </div>
              </div>
            </div>
            <div class="card-footer p-2 ps-3">
            </div>
          </div>
      </div>
  </div>
  <hr>
  <div class="nav-tabs-navigation">
    <div class="nav-tabs-wrapper">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><p class="mb-0 d-flex align-items-center"><i style="margin-right: 10px;" class="material-symbols-rounded">school</i> Cursos y Diplomados</p></button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><p class="mb-0 d-flex align-items-center"><i style="margin-right: 10px;" class="material-symbols-rounded">edit</i> Pruebas</p></button>
        </li>
      </ul>
    </div>
  </div>

  <div class="tab-content" id="myTabContent" style="background-color:rgb(255, 255, 255);">
    <div class="tab-pane fade show active p-4" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="container"> 
        <div class="row">
          <div class="col-lg-6">
            <h3>Lista de servicios</h3>
          </div>
          <div class="col-lg-6">
            <a href="{{ route('crearServicio') }}" target="_blank" class="btn btn-primary" style="float: right;"> <i class="material-symbols-rounded">add</i> Crear servicio</a>
          </div>
        </div>
          <table class="table table-bordered" id="tablaServicios">
              <thead>
                  <tr>
                      <th>Estado</th>
                      <th>Nombre</th>
                      <th>Precio Presencial</th>
                      <th>Precio Virtual</th>
                      <th>Tipo</th>
                      <th>Acciones</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($servicios as $servicio)
                  <tr>
                      <td style="text-align: center;vertical-align: middle;">
                        @if($servicio->estado == 1)
                            <span style="width: 20px; height: 20px; border-radius: 50%;" class="badge bg-success"> </span>
                        @else
                            <span style="width: 20px; height: 20px; border-radius: 50%;" class="badge bg-danger"> </span>
                        @endif
                      </td>
                      <td><p style="max-width: 300px;  overflow-wrap: break-word; word-wrap: break-word; white-space: normal;">{{ $servicio->nombre }}</p></td>
                      <td>{{ number_format($servicio->costo_presencial, 2, ',', '.') }}</td>
                      <td>{{ number_format($servicio->costo_virtual, 2, ',', '.') }}</td>
                      <td>{{ $servicio->tipo }}</td>
                      <td style="text-align: center;vertical-align: middle;">
                        <a href="/editar-servicio/{{ $servicio->id }}" class="btn btn-primary"> <i class="material-symbols-rounded">edit</i></a>
                        @if($servicio->estado == 1)
                          <a href="#" onclick="eliminarServicio({{ $servicio->id }})" class="btn btn-danger"> <i class="material-symbols-rounded">delete</i></a>
                        @else
                          <a href="#" onclick="activarServicio({{ $servicio->id }})" class="btn btn-success"> <i class="material-symbols-rounded">check_circle</i></a>
                        @endif
                        <a target="_blank" href="/servicio/{{ $servicio->id }}" class="btn btn-info"> <i class="material-symbols-rounded">visibility</i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>
    <div class="tab-pane fade p-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <div class="container"> 
        <div class="row">
          <div class="col-lg-6">
            <h3>Lista de pruebas</h3>
          </div>
          <div class="col-lg-6">
            <a href="{{ route('crearPrueba') }}" target="_blank" class="btn btn-warning" style="float: right; margin-right: 10px;"> <i class="material-symbols-rounded">add</i> Crear prueba</a>
          </div>
        </div>
          <table class="table table-bordered" id="tablaPruebas">
              <thead>
                  <tr>
                      <th>Estado</th>
                      <th>Nombre</th>
                      <th>Precio Presencial</th>
                      <th>Precio Virtual</th>
                      <th>Tipo</th>
                      <th>Acciones</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($servicios_prueba as $servicio)
                  <tr>
                      <td style="text-align: center;vertical-align: middle;">
                        @if($servicio->estado == 1)
                            <span style="width: 20px; height: 20px; border-radius: 50%;" class="badge bg-success"> </span>
                        @else
                            <span style="width: 20px; height: 20px; border-radius: 50%;" class="badge bg-danger"> </span>
                        @endif
                      </td>
                      <td><p style="max-width: 300px;  overflow-wrap: break-word; word-wrap: break-word; white-space: normal;">{{ $servicio->nombre }}</p></td>
                      <td>{{ number_format($servicio->costo_presencial, 2, ',', '.') }}</td>
                      <td>{{ number_format($servicio->costo_virtual, 2, ',', '.') }}</td>
                      <td>{{ $servicio->tipo }}</td>
                      <td style="text-align: center;vertical-align: middle;">
                        <a href="/editar-prueba/{{ $servicio->id }}" class="btn btn-primary"> <i class="material-symbols-rounded">edit</i></a>
                        @if($servicio->estado == 1)
                          <a href="#" onclick="eliminarServicio({{ $servicio->id }})" class="btn btn-danger"> <i class="material-symbols-rounded">delete</i></a>
                        @else
                          <a href="#" onclick="activarServicio({{ $servicio->id }})" class="btn btn-success"> <i class="material-symbols-rounded">check_circle</i></a>
                        @endif
                        <a target="_blank" href="/prueba/{{ $servicio->id }}" class="btn btn-info"> <i class="material-symbols-rounded">visibility</i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
<script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tablaServicios').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
            },
        });

        $('#tablaPruebas').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
            },
        });
    });

    function eliminarServicio(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Deseas desactivar este servicio?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, desactivar',
            cancelButtonText: 'Cancelar',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({  
                    url: '/servicios/eliminar/' + id,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Espere...',
                            text: 'Desactivando servicio...',
                            icon: 'info',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            didOpen: function() {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response) {
                        if(response.status == true) {
                            Swal.fire({
                                icon: 'success',
                                title: response.titulo,
                                text: response.mensaje,
                                allowOutsideClick: false,
                                showConfirmButton: true,
                                willClose: function() {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({ 
                                icon: 'error',
                                title: response.titulo,
                                text: response.mensaje
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ocurrió un error al desactivar el servicio'
                        });
                    }
                });
            }
        });
    }

    function activarServicio(id) {
        $.ajax({
            url: '/servicios/activar/' + id,
            type: 'GET',
            dataType: 'json',
            beforeSend: function() {
                Swal.fire({
                    title: 'Espere...',
                    text: 'Activando servicio...',
                    icon: 'info',
                    allowOutsideClick: false, 
                    showConfirmButton: false,
                    didOpen: function() {
                        Swal.showLoading();
                    }
                });
            },
            success: function(response) {
                if(response.status == true) {
                    Swal.fire({
                        icon: 'success',
                        title: response.titulo,
                        text: response.mensaje,
                        allowOutsideClick: false,
                        showConfirmButton: true,
                        willClose: function() {
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: response.titulo,
                        text: response.mensaje
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error al activar el servicio'
                });
            }
        });
    }
    
</script>
@endsection