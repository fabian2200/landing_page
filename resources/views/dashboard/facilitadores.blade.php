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
            <h3>Lista de facilitadores</h3>
            <br>
        </div>
        <div class="col-4">
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearFacilitador" style="float: right;"> <i class="material-symbols-rounded">add</i> Crear facilitador</a>
        </div>
    </div>
    <table class="table table-bordered" id="tablaServicios">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Celular <br> Whatsapp</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facilitadores as $facilitador)
            <tr>
                <td style="vertical-align: middle;"><img class="img-fluid rounded-circle" src="{{ asset('fotos_facilitadores/' . $facilitador->foto) }}" alt="Foto" style="width: 50px; height: 50px;"></td>
                <td style="vertical-align: middle;">{{ $facilitador->nombre }}</td>
                <td style="vertical-align: middle;">
                    <i class="material-symbols-rounded">phone</i> {{ $facilitador->celular }} 
                    <br>
                    <i class="material-symbols-rounded">phone_android</i> {{ $facilitador->whatsapp }}
                </td>
                <td style="vertical-align: middle;">{{ $facilitador->email }}</td>
                <td style="vertical-align: middle; text-align: center;">
                    @if($facilitador->estado == 1)
                        <span style="height: 1.5rem; width: 1.5rem; border-radius: 50%;" class="badge bg-success"> </span>
                    @else
                        <span style="height: 1.5rem; width: 1.5rem; border-radius: 50%;" class="badge bg-danger"> </span>
                    @endif
                </td>
                <td style="vertical-align: middle; text-align: center;">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditarFacilitador" onclick="editarFacilitador({{ $facilitador->id }}, '{{ $facilitador->nombre }}', '{{ $facilitador->celular }}', '{{ $facilitador->whatsapp }}', '{{ $facilitador->email }}', '{{ $facilitador->descripcion }}')" class="btn btn-primary"> <i class="material-symbols-rounded">edit</i></a>
                    @if($facilitador->estado == 1)
                        <a href="#" onclick="eliminarFacilitador({{ $facilitador->id }})" class="btn btn-danger"> <i class="material-symbols-rounded">delete</i></a>
                    @else
                        <a href="#" onclick="activarFacilitador({{ $facilitador->id }})" class="btn btn-success"><i class="material-symbols-rounded">check_circle</i></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCrearFacilitador" tabindex="-1" aria-labelledby="modalCrearFacilitadorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCrearFacilitadorLabel">Crear facilitador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="formCrearFacilitador">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del facilitador">
                            </div>  
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="celular" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular del facilitador">
                            </div>          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="whatsapp" class="form-label">Whatsapp</label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Whatsapp del facilitador">
                            </div>  
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email del facilitador">
                            </div>          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto del facilitador">
                            </div>              
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del facilitador"></textarea>
                            </div>              
                        </div>
                    </div>
                </form>     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar <i class="material-symbols-rounded">cancel</i></button>
                <button type="submit" id="btnGuardarFacilitador" class="btn btn-primary">Guardar <i class="material-symbols-rounded">save</i></button>
            </div>
        </div>
    </div>
</div>

<!-- Modal editar facilitador -->
<div class="modal fade" id="modalEditarFacilitador" tabindex="-1" aria-labelledby="modalEditarFacilitadorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarFacilitadorLabel">Editar facilitador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="formEditarFacilitador">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="hidden" id="id_editar" name="id_editar">
                                <input type="text" class="form-control" id="nombre_editar" name="nombre_editar" placeholder="Nombre del facilitador">
                            </div>  
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="celular" class="form-label">Celular</label>
                                <input type="text" class="form-control" id="celular_editar" name="celular_editar" placeholder="Celular del facilitador">
                            </div>          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="whatsapp" class="form-label">Whatsapp</label>
                                <input type="text" class="form-control" id="whatsapp_editar" name="whatsapp_editar" placeholder="Whatsapp del facilitador">
                            </div>  
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email_editar" name="email_editar" placeholder="Email del facilitador">
                            </div>          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion_editar" name="descripcion_editar" placeholder="Descripción del facilitador"></textarea>
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto_editar" name="foto_editar" placeholder="Foto del facilitador">
                            </div>              
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar <i class="material-symbols-rounded">cancel</i></button>
                <button type="submit" id="btnEditarFacilitador" class="btn btn-primary">Guardar <i class="material-symbols-rounded">save</i></button>
            </div>
    </div>
</div>
<link rel="stylesheet" href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
<script src="//cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script>
    let editor_descripcion = null;
    ClassicEditor
        .create( document.querySelector( '#descripcion' ) )
        .then( editor => {
            editor_descripcion = editor;
        } )
        .catch( error => {
            console.error( error );
        } );

    let editor_descripcion_editar = null;
    ClassicEditor
        .create( document.querySelector( '#descripcion_editar' ) )
        .then( editor => {
            editor_descripcion_editar = editor;
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    $(document).ready(function() {
        $('#tablaServicios').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
            }
        });
    });

    $('#btnGuardarFacilitador').on('click', function(e){
        e.preventDefault();
        var formData = new FormData();
        formData.append('nombre', $('#nombre').val());
        formData.append('celular', $('#celular').val());
        formData.append('whatsapp', $('#whatsapp').val());
        formData.append('email', $('#email').val());
        formData.append('estado', 1);
        if($('#foto').val() != ''){
            formData.append('foto', $('#foto')[0].files[0]);
        }
        formData.append('descripcion', editor_descripcion.getData());
        formData.append('_token', '{{ csrf_token() }}');    
       
        $.ajax({
            url: '/facilitadores/crear',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){
                Swal.fire({
                    title: 'Cargando...',
                    text: 'Espere un momento por favor',
                    icon: 'info',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    didOpen: function(){
                        Swal.showLoading();
                    }
                });
            },
            success: function(response){
                if(response.status == false){
                    Swal.fire({
                        title: response.titulo,
                        text: response.mensaje,
                        icon: 'error',
                        showConfirmButton: true,
                        allowOutsideClick: false,
                    });
                }else{
                    Swal.fire({
                        title: response.titulo,
                        text: response.mensaje,
                        icon: 'success',
                        showConfirmButton: true,
                        allowOutsideClick: false,
                        willClose: function(){
                            window.location.reload();
                        }
                    });
                }
            },
            error: function(xhr, status, error){
                Swal.fire({
                    title: 'Error',
                    text: xhr.responseText,
                    icon: 'error',
                    showConfirmButton: true,
                    allowOutsideClick: false,
                });
            }
        });
    });

    function eliminarFacilitador(id){
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Estás seguro de querer eliminar este facilitador?',
            icon: 'warning',
            showConfirmButton: true,
            allowOutsideClick: false,
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Eliminar',
            allowOutsideClick: false,
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    url: '/facilitadores/eliminar/' + id,
                    type: 'GET',
                    beforeSend: function(){
                        Swal.fire({
                            title: 'Eliminando facilitador...',
                            text: 'Espere un momento por favor',
                            icon: 'info',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            didOpen: function(){
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response){
                        if(response.status == false){
                        Swal.fire({
                                title: response.titulo,
                                text: response.mensaje,
                                icon: 'error',
                                showConfirmButton: true,
                                allowOutsideClick: false,
                            });
                        }else{
                            Swal.fire({
                                title: response.titulo,
                                text: response.mensaje,
                                icon: 'success',
                                showConfirmButton: true,
                                allowOutsideClick: false,
                                willClose: function(){
                                    window.location.reload();
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error){
                        Swal.fire({
                            title: 'Error',
                            text: xhr.responseText,
                            icon: 'error',
                        });
                    }
                });
            }
        });
    }

    function activarFacilitador(id){
       $.ajax({
            url: '/facilitadores/activar/' + id,
            type: 'GET',
            success: function(response){
                if(response.status == false){
                    Swal.fire({
                        title: response.titulo,
                        text: response.mensaje,
                        icon: 'error',
                        showConfirmButton: true,
                        allowOutsideClick: false,
                    });
                }else{
                    Swal.fire({
                        title: response.titulo,
                        text: response.mensaje,
                        icon: 'success',
                        showConfirmButton: true,
                        allowOutsideClick: false,
                        willClose: function(){
                            window.location.reload();
                        }
                    });
                }
            },
            error: function(xhr, status, error){
                Swal.fire({
                    title: 'Error',
                    text: xhr.responseText,
                    icon: 'error',
                    showConfirmButton: true,
                    allowOutsideClick: false,
                });
            }
       });
    }

    function editarFacilitador(id, nombre, celular, whatsapp, email, descripcion){
        $('#nombre_editar').val(nombre);
        $('#celular_editar').val(celular);
        $('#whatsapp_editar').val(whatsapp);
        $('#email_editar').val(email);
        editor_descripcion_editar.setData(descripcion);
        $('#id_editar').val(id);
    }

    $('#btnEditarFacilitador').on('click', function(e){
        e.preventDefault();
        var formData = new FormData();
        formData.append('id', $('#id_editar').val());
        formData.append('nombre', $('#nombre_editar').val());
        formData.append('celular', $('#celular_editar').val());
        formData.append('whatsapp', $('#whatsapp_editar').val());
        formData.append('email', $('#email_editar').val());
        formData.append('descripcion', editor_descripcion_editar.getData());
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            url: '/facilitadores/editar',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){
                Swal.fire({
                    title: 'Cargando...',
                    text: 'Espere un momento por favor',
                    icon: 'info',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function(response){
                if(response.status == false){
                    Swal.fire({
                        title: response.titulo,
                        text: response.mensaje,
                        icon: 'error',
                        showConfirmButton: true,
                        allowOutsideClick: false,
                    });
                }else{
                    Swal.fire({
                        title: response.titulo,
                        text: response.mensaje,
                        icon: 'success',    
                        showConfirmButton: true,
                        allowOutsideClick: false,
                        willClose: function(){
                            window.location.reload();
                        }
                    });
                }
            },
            error: function(xhr, status, error){
                Swal.fire({
                    title: 'Error',
                    text: xhr.responseText,
                    icon: 'error',
                    showConfirmButton: true,
                    allowOutsideClick: false,
                });
            }
        });
    });
</script>
@endsection