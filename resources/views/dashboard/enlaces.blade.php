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
    <div class="col-8">
      <h3>Enlaces</h3>
    </div>
    <div class="col-4">
      <a href="#" data-bs-toggle="modal" data-bs-target="#modalCrearEnlace" class="btn btn-primary" style="float: right;"> <i class="material-symbols-rounded">add</i> Crear enlace</a>
    </div>
  </div>
  <hr>
  <div class="container">
      <h3>Lista de enlaces</h3>
      <br>
      <table class="table table-bordered" id="tablaEnlaces">
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Enlace</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($enlaces as $enlace)
              <tr>
                  <td><p style="max-width: 300px;  overflow-wrap: break-word; word-wrap: break-word; white-space: normal;">{{ $enlace->nombre }}</p></td>
                  <td>{{ $enlace->link }}</td>
                  <td style="text-align: center;vertical-align: middle;">
                    <a href="#" onclick="eliminarEnlace({{ $enlace->id }})" class="btn btn-danger"> <i class="material-symbols-rounded">delete</i></a>
                    <a href="{{ $enlace->link }}" target="_blank" class="btn btn-success"> <i class="material-symbols-rounded">visibility</i></a>
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>

<!-- Modal Crear Enlace --> 
<div class="modal fade" id="modalCrearEnlace" tabindex="-1" aria-labelledby="modalCrearEnlaceLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCrearEnlaceLabel">Crear Enlace</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="formCrearEnlace">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="enlace">Enlace</label>
                        <input type="text" class="form-control" id="enlace" name="enlace" required>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center gap-2">
                        <button type="submit" class="btn btn-primary">Crear enlace <i class="material-symbols-rounded">add</i></button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar <i class="material-symbols-rounded">close</i></button>
                    </div>
                </form> 
            </div>
        </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
<script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tablaEnlaces').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
            },
        });
    });

    function eliminarEnlace(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Deseas eliminar este enlace?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar',
            cancelButtonText: 'Cancelar',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({  
                    url: '/enlaces/eliminar/' + id,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Espere...',
                            text: 'Eliminando enlace...',
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
                            text: 'Ocurrió un error al eliminar el enlace'
                        });
                    }
                });
            }
        });
    }

    $('#formCrearEnlace').submit(function(e) {
        e.preventDefault();
        var nombre = $('#nombre').val();
        var enlace = $('#enlace').val();
        $.ajax({
            url: '/crear-enlace',
            type: 'POST',
            data: {
                nombre: nombre,
                enlace: enlace,
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function() {
                Swal.fire({
                    title: 'Espere...',
                    text: 'Creando enlace...',
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
                    text: 'Ocurrió un error al crear el enlace'
                });
            }
        });
    });
</script>
@endsection