@extends('dashboard.plantilla')
@section('content')
<style>
    label{ 
        font-weight: bold !important;
        color: #000 !important;
    }
</style>
<div class="container" style="padding-top: 20px;">
    <div class="row">
        <div class="col-8">
            <h3>Crear servicio</h3>
        </div>
        <div class="col-4">
            <a href="{{ route('servicios') }}" class="btn btn-secondary" style="float: right;"> <i class="material-symbols-rounded">arrow_back</i> Volver</a>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <h5>Llene los siguientes campos para crear un nuevo servicio</h5>
            <br>
            <form id="crearServicio" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del servicio">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Tipo de servicio</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="Diplomado">Diplomado</option>
                                <option value="Curso">Curso</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Descripción Corta</label>
                            <textarea class="form-control" id="descripcion_corta" name="descripcion_corta" placeholder="Descripción corta del servicio"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Objetivo</label>
                            <textarea class="form-control" id="objetivo" name="objetivo" placeholder="Objetivo del servicio"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Metodología</label>
                            <textarea class="form-control" id="metodologia" name="metodologia" placeholder="Metodología del servicio"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Dirigido a</label>
                            <input type="text" class="form-control" id="dirigido_a" name="dirigido_a" placeholder="Dirigido a">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Incluye</label>
                            <textarea class="form-control" id="incluye" name="incluye" placeholder="Incluye"></textarea>
                        </div>
                    </div>
                    <div class="col-12 card m-3" style="padding: 10px; width: 97%;">
                        <div class="mb-3" style="border-bottom: 1px solid #d7d7d7;">
                            <label for="nombre" class="form-label">Contenido</label>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion_contenido" name="descripcion_contenido" placeholder="Descripción del contenido"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Módulos</label> <br>
                                    <button type="button" class="btn btn-primary" onclick="agregarModulo()">Agregar Módulo <i class="material-symbols-rounded">add</i></button>
                                </div>
                                <div class="lista-modulos">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 card m-3" style="padding: 10px; width: 97%;">
                        <div class="mb-3" style="border-bottom: 1px solid #d7d7d7;">
                            <label for="nombre" class="form-label">Costos</label>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Costo Presencial</label> <br>
                                    <input type="number" class="form-control" id="costo_presencial" name="costo_presencial" placeholder="Costo Presencial">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Costo Virtual</label> <br>
                                    <input type="number" class="form-control" id="costo_virtual" name="costo_virtual" placeholder="Costo Virtual">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 card m-3" style="padding: 10px; width: 97%;">
                        <div class="mb-3" style="border-bottom: 1px solid #d7d7d7;">
                            <label for="nombre" class="form-label">Agenda</label>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Modalidad Presencial</label> <br>
                                    <button type="button" class="btn btn-info" onclick="agregarCiudadPresencial()">Agregar Ciudad <i class="material-symbols-rounded">add</i></button>
                                    <div id="lista-ciudades" style="margin-top: 10px;">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Modalidad Virtual</label> <br>
                                    <button type="button" class="btn btn-warning" onclick="agregarAgendaVirtual()">Agregar Item Cronograma <i class="material-symbols-rounded">add</i></button>
                                    <br>
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <label for="nombre" class="form-label">Dia</label>
                                        </div>
                                        <div class="col-3 text-center">
                                            <label for="nombre" class="form-label">Hora Inicio</label>
                                        </div>
                                        <div class="col-3 text-center">
                                            <label for="nombre" class="form-label">Hora Final</label>
                                        </div>
                                        <div class="col-2 text-center">
                                            <label for="nombre" class="form-label"></label>
                                        </div>
                                    </div>
                                    <div id="lista-agenda-virtual" style="margin-top: 10px;">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Facilitador</label>
                            <select class="form-control" id="facilitador" name="facilitador">
                                <option value="">Seleccionar Facilitador</option>
                                @foreach ($facilitadores as $facilitador)
                                    <option value="{{ $facilitador->id }}">{{ $facilitador->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 text-center" style="margin-top: 20px; border-top: 1px solid #d7d7d7; padding-top: 20px;">
                        <button type="button" onclick="guardarServicio()" style="width: 49%; font-weight: bold; font-size: 18px;" class="btn btn-success"> <i class="material-symbols-rounded">save</i> Guardar</button>
                        <a href="{{ route('servicios') }}" class="btn btn-danger" style="width: 49%; font-weight: bold; font-size: 18px;"> <i class="material-symbols-rounded">arrow_back</i> Volver</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script>
    let editor_descripcion_corta = null;
    ClassicEditor
        .create( document.querySelector( '#descripcion_corta' ) )
        .then( editor => {
            editor_descripcion_corta = editor;
        } )
        .catch( error => {
            console.error( error );
        } );

    let editor_objetivo = null;
    ClassicEditor
        .create( document.querySelector( '#objetivo' ) )
        .then( editor => {
            editor_objetivo = editor;
        } )
        .catch( error => {
            console.error( error );
        } );

    let editor_metodologia = null;
    ClassicEditor
        .create( document.querySelector( '#metodologia' ) )
        .then( editor => {
            editor_metodologia = editor;
        } )
        .catch( error => {
            console.error( error );
        } );

    let editor_incluye = null;
    ClassicEditor
        .create( document.querySelector( '#incluye' ) )
        .then( editor => {
            editor_incluye = editor;
        } )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
    var item_modulo = 0;
    var item_ciudad = 0;
    var item_agenda = 0;

    function agregarModulo() {
        const modulo = document.createElement('div');
        modulo.setAttribute('id', 'modulo'+item_modulo);
        modulo.setAttribute('data-id', item_modulo);
        modulo.classList.add('modulo-item');
        modulo.innerHTML = `
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-4">
                    <input type="text" id="modulo-nombre-${item_modulo}" class="form-control modulo-nombre" placeholder="Nombre del módulo">
                </div>
                <div class="col-6">
                    <input type="text" id="modulo-url-${item_modulo}" class="form-control modulo-url" placeholder="URL del módulo">
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                    <button type="button" style="margin: 0px;" class="btn btn-danger" onclick="eliminarModulo(${item_modulo})"><i class="material-symbols-rounded">delete</i></button>
                </div>
            </div>
        `;

        document.querySelector('.lista-modulos').appendChild(modulo);
        item_modulo++;
    }

    function eliminarModulo(item) {
        document.getElementById('modulo'+item).remove();
    }

    function agregarCiudadPresencial() {
        const ciudad = document.createElement('div');
        ciudad.classList.add('ciudad-item');
        ciudad.setAttribute('data-id', item_ciudad);
        ciudad.setAttribute('id', 'ciudad'+item_ciudad);
        ciudad.innerHTML = `
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-5">
                    <input type="text" class="form-control ciudad-nombre" id="ciudad-nombre-${item_ciudad}" placeholder="Ciudad">
                </div>
                <div class="col-5">
                    <input type="text" class="form-control ciudad-fecha" id="ciudad-fecha-${item_ciudad}" placeholder="Fecha Inicio">
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                    <button type="button" style="margin: 0px;" class="btn btn-danger" onclick="eliminarCiudad(${item_ciudad})"><i class="material-symbols-rounded">delete</i></button>
                </div>
            </div>
        </div>`;

        document.getElementById('lista-ciudades').appendChild(ciudad);
        item_ciudad++;
    }

    function eliminarCiudad(item) {     
        document.getElementById('ciudad'+item).remove();
    }

    function agregarAgendaVirtual() {
        const agenda = document.createElement('div');
        agenda.setAttribute('id', 'agenda'+item_agenda);
        agenda.setAttribute('data-id', item_agenda);
        agenda.classList.add('agenda-item');
        agenda.innerHTML = `
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-4">
                    <input id="dia_agenda${item_agenda}" type="text" class="form-control agenda-dia" name="dia_agenda${item_agenda}" placeholder="Ejemplo: Lunes">
                </div>
                <div class="col-3">
                    <input id="hora_agenda_inicio_${item_agenda}" type="time" class="form-control agenda-hora" name="hora_agenda_inicio_${item_agenda}" placeholder="Hora de la agenda">
                </div>
                <div class="col-3">
                    <input id="hora_agenda_final_${item_agenda}" type="time" class="form-control agenda-hora" name="hora_agenda_final_${item_agenda}" placeholder="Hora de la agenda">
                </div>
                <div class="col-2 d-flex align-items-center justify-content-center">
                    <button type="button" style="margin: 0px;" class="btn btn-danger" onclick="eliminarAgenda(${item_agenda})"><i class="material-symbols-rounded">delete</i></button>
                </div>
            </div>
        `;

        document.getElementById('lista-agenda-virtual').appendChild(agenda);
        item_agenda++;
    }

    function eliminarAgenda(item) {
        document.getElementById('agenda'+item).remove();
    }
</script>

<script>

    function guardarServicio() {
        validarFormulario();
    }

    function guardarDatosServicio() {
        const nombre = document.getElementById('nombre').value;
        const tipo = document.getElementById('tipo').value;
        const descripcion_corta = editor_descripcion_corta.getData();
        const objetivo = editor_objetivo.getData();
        const metodologia = editor_metodologia.getData();
        const dirigido_a = document.getElementById('dirigido_a').value;
        const incluye = editor_incluye.getData();
        const descripcion_contenido = document.getElementById('descripcion_contenido').value;

        var lista_modulos = [];

        document.querySelectorAll('.modulo-item').forEach(modulo => {
            lista_modulos.push({
                nombre: modulo.querySelector('#modulo-nombre-'+modulo.dataset.id).value,
                url: modulo.querySelector('#modulo-url-'+modulo.dataset.id).value
            });
        });

        var costo_presencial = document.getElementById('costo_presencial').value;
        var costo_virtual = document.getElementById('costo_virtual').value;

        var lista_ciudades = [];
        document.querySelectorAll('.ciudad-item').forEach(ciudad => {
            lista_ciudades.push({
                nombre: document.getElementById('ciudad-nombre-'+ciudad.dataset.id).value,
                fecha: document.getElementById('ciudad-fecha-'+ciudad.dataset.id).value
            });
        });

        var lista_agenda = [];
        document.querySelectorAll('.agenda-item').forEach(agenda => {
            lista_agenda.push({
                dia: document.getElementById('dia_agenda'+agenda.dataset.id).value,
                hora_inicio: document.getElementById('hora_agenda_inicio_'+agenda.dataset.id).value,
                hora_final: document.getElementById('hora_agenda_final_'+agenda.dataset.id).value
            });
        });

        var facilitador = document.getElementById('facilitador').value;

        console.log(nombre, objetivo, metodologia, dirigido_a, incluye, descripcion_contenido, lista_modulos, costo_presencial, costo_virtual, lista_ciudades, lista_agenda, facilitador);

        var data = {
            nombre: nombre,
            tipo: tipo,
            descripcion_corta: descripcion_corta,
            objetivo: objetivo,
            metodologia: metodologia,
            dirigido_a: dirigido_a,
            incluye: incluye,
            descripcion_contenido: descripcion_contenido,
            lista_modulos: lista_modulos,
            costo_presencial: costo_presencial,
            costo_virtual: costo_virtual,
            lista_ciudades: lista_ciudades,
            lista_agenda: lista_agenda,
            facilitador: facilitador,
        }

        $.ajax({
            url: '/registro-servicio',
            type: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dataType: 'json',
            beforeSend: function() {
                Swal.fire({
                    title: 'Espere...',
                    text: 'Guardando datos...',
                    icon: 'info',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: function() {
                        Swal.showLoading();
                    }
                });
            },
            success: function(response) {
                var data = response;
                if(data.status == true) {
                    Swal.fire({
                        icon: 'success',
                        title: data.titulo,
                        text: data.mensaje,
                        allowOutsideClick: false,
                        showConfirmButton: true,
                        willClose: function() {
                            window.location.href = '/dashboard';
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: data.titulo,
                        text: data.mensaje
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al guardar los datos'
                });
            }
        });
    }

    function validarFormulario() {
        const nombre = document.getElementById('nombre').value;
        const tipo = document.getElementById('tipo').value;
        const descripcion_corta = editor_descripcion_corta.getData();
        const objetivo = editor_objetivo.getData();
        const metodologia = editor_metodologia.getData();
        const dirigido_a = document.getElementById('dirigido_a').value;
        const incluye = editor_incluye.getData();
        const descripcion_contenido = document.getElementById('descripcion_contenido').value;
        const costo_presencial = document.getElementById('costo_presencial').value;
        const costo_virtual = document.getElementById('costo_virtual').value;
        const facilitador = document.getElementById('facilitador').value;

        if(nombre == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El nombre del servicio es requerido'
            });
            return;
        }

        if(descripcion_corta == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La descripción corta del servicio es requerida'
            });
            return;
        }

        if(tipo == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El tipo de servicio es requerido'
            });
            return;
        }

        if(objetivo == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El objetivo del servicio es requerido'
            });
            return;
        }

        if(metodologia == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La metodología del servicio es requerida'
            });
            return;
        }   

        if(dirigido_a == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El dirigido a del servicio es requerido'
            });
            return;
        }

        if(incluye == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El incluye del servicio es requerido'
            });
            return;
        }

        if(descripcion_contenido == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La descripción del contenido es requerida'
            });
            return;
        }   

        if(costo_presencial == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El costo presencial es requerido'
            });
            return;
        }

        if(costo_virtual == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El costo virtual es requerido'
            });
            return;
        }

        if(facilitador == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El facilitador es requerido'
            });
            return;
        }

        guardarDatosServicio();
    }
</script>
@endsection