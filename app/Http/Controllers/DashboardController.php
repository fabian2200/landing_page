<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function login()
    {
        return view('dashboard.login');
    }

    public function iniciarSesion(Request $request){
        $data = $request->all();
        $usuario = $request->usuario;
        $password = $request->password;

        $usuario = DB::table('icp.usuarios')->where('usuario', $usuario)->first();
        if($usuario){
            $password_encriptada = md5($password);
            if($password_encriptada == $usuario->contrasena){
                session(['usuario' => $usuario]);
                return response()->json([
                    'status' => true,
                    'mensaje' => 'Inicio de sesión exitoso',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'mensaje' => 'Contraseña incorrecta',
                ]);
            }
        }else{
            return response()->json([
                'status' => false,
                'mensaje' => 'Usuario no encontrado',
            ]);
        }
    }

    public function cerrarSesion()
    {
        session()->forget('usuario');
        return response()->json([
            'status' => true,
            'mensaje' => 'Sesión cerrada correctamente',
        ]);
    }

    public function facilitadores()
    {
        if(session('usuario')){
            $facilitadores = DB::table('icp.facilitador')->get();
            return view('dashboard.facilitadores', compact('facilitadores'));
        }else{
            return redirect()->route('login');
        }
    }

    public function crearFacilitador(Request $request)
    {
        $data = $request->all();
        $nombre = $request->nombre;
        $celular = $request->celular;
        $whatsapp = $request->whatsapp;
        $email = $request->email;
        $estado = $request->estado;
        $descripcion = $request->descripcion;
        $foto = $request->foto;

        if($request->hasFile('foto')){
            $ruta_foto = public_path('fotos_facilitadores');
            if(!File::exists($ruta_foto)){
                File::makeDirectory($ruta_foto, 0777, true, true);
            }
            $foto = $request->file('foto');
            $nombre_foto = $foto->getClientOriginalName();
            $foto->move($ruta_foto, $nombre_foto);
        }else{
            $nombre_foto = 'no_foto.png';
        }

        $facilitador = DB::table('icp.facilitador')->insert([
            'nombre' => $nombre,
            'celular' => $celular,
            'whatsapp' => $whatsapp,
            'email' => $email,
            'estado' => $estado,
            'foto' => $nombre_foto,
            'descripcion' => $descripcion,
        ]);

        if($facilitador){
        return response()->json([
                'status' => true,
                'titulo' => 'Facilitador creado correctamente',
                'mensaje' => 'El facilitador ha sido creado correctamente',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'titulo' => 'Error',
                'mensaje' => 'El facilitador no ha sido creado correctamente',
            ]);
        }
    }

    public function eliminarFacilitador($id)
    {
        $facilitador = DB::table('icp.facilitador')->where('id', $id)->update([
            'estado' => 0,
        ]);
        if($facilitador){
        return response()->json([
            'status' => true,
                'titulo' => 'Facilitador eliminado correctamente',
                'mensaje' => 'El facilitador ha sido eliminado correctamente',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'titulo' => 'Error',
                'mensaje' => 'El facilitador no ha sido eliminado correctamente',
            ]);
        }
    }

    public function activarFacilitador($id)
    {
        $facilitador = DB::table('icp.facilitador')->where('id', $id)->update([
            'estado' => 1,
        ]);
        if($facilitador){
            return response()->json([
                'status' => true,
                'titulo' => 'Facilitador activado correctamente',
                'mensaje' => 'El facilitador ha sido activado correctamente',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'titulo' => 'Error',
                'mensaje' => 'El facilitador no ha sido activado correctamente',
            ]);
        }
    }

    public function editarFacilitador(Request $request)
    {
        $data = $request->all();

        $id = $request->id;
        $nombre = $request->nombre;
        $celular = $request->celular;
        $whatsapp = $request->whatsapp;
        $email = $request->email;
        $descripcion = $request->descripcion;
        $foto = $request->foto;

        if($request->hasFile('foto')){
            $ruta_foto = public_path('fotos_facilitadores');
            $foto = $request->file('foto');
            $nombre_foto = $foto->getClientOriginalName();
            $foto->move($ruta_foto, $nombre_foto);

            $facilitador = DB::table('icp.facilitador')->where('id', $id)->update([
                'nombre' => $nombre,
                'celular' => $celular,
                'whatsapp' => $whatsapp,
                'email' => $email,
                'descripcion' => $descripcion,
                'foto' => $nombre_foto,
            ]);
        }else{
            $facilitador = DB::table('icp.facilitador')->where('id', $id)->update([
                'nombre' => $nombre,
                'celular' => $celular,
                'whatsapp' => $whatsapp,
                'email' => $email,
                'descripcion' => $descripcion,
            ]);
        }

        if($facilitador){
            return response()->json([
                'status' => true,
                'titulo' => 'Exito',
                'mensaje' => 'Se ha editado el facilitador correctamente',
            ]);
        }else{  
            return response()->json([
                'status' => false,
                'titulo' => 'Error',
                'mensaje' => 'Ocurrió un error al editar el facilitador',
            ]);
        }
    }   

    public function servicios()
    {
        if(session('usuario')){
            $cursos = DB::table('icp.servicios')->where('tipo', 'Curso')->count();
            $diplomados = DB::table('icp.servicios')->where('tipo', 'Diplomado')->count();

            $servicios = DB::table('icp.servicios')->get();
            return view('dashboard.servicios', compact('cursos', 'diplomados', 'servicios'));
        }else{
            return redirect()->route('login');
        }
    }

    public function crearServicio()
    {
        if(session('usuario')){
            $facilitadores = DB::table('icp.facilitador')->where('estado', 1)->get();
            return view('dashboard.crearServicio', compact('facilitadores'));
        }else{
            return redirect()->route('login');
        }
    }

    public function registroServicio(Request $request)
    {
        $data = $request->all();

        $nombre = $request->nombre;
        $descripcion = $request->descripcion_corta;
        $objetivo = $request->objetivo;
        $metodologia = $request->metodologia;
        $dirigido_a = $request->dirigido_a;
        $incluye = $request->incluye;
        $descripcion_contenido = $request->descripcion_contenido;
        $costo_presencial = $request->costo_presencial;
        $costo_virtual = $request->costo_virtual;
        $facilitador = $request->facilitador;
        $lista_modulos = $request->lista_modulos;
        $lista_ciudades = $request->lista_ciudades;
        $lista_agenda = $request->lista_agenda;
        $tipo = $request->tipo;

        $servicio = DB::table('icp.servicios')->insertGetId([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'objetivo' => $objetivo,
            'metodologia' => $metodologia,
            'dirigido' => $dirigido_a,
            'incluye' => $incluye,
            'costo_presencial' => $costo_presencial,
            'costo_virtual' => $costo_virtual,
            'id_facilitador' => $facilitador,
            'tipo' => $tipo,
            'descripcion_contenido' => $descripcion_contenido,
        ]);

        if($servicio){
            if (isset($lista_modulos) && is_array($lista_modulos) && count($lista_modulos) > 0) {
                foreach($lista_modulos as $modulo){
                    DB::table('icp.contenido')->insert([
                        'id_servicio' => $servicio,
                        'nombre' => $modulo['nombre'],
                    ]);
                }
            }

            if (isset($lista_ciudades) && is_array($lista_ciudades) && count($lista_ciudades) > 0) {
                foreach($lista_ciudades as $ciudad){
                    DB::table('icp.agenda_presencial')->insert([
                        'id_servicio' => $servicio,
                        'ciudad' => $ciudad['nombre'],
                    ]);
                }
            }

            if (isset($lista_agenda) && is_array($lista_agenda) && count($lista_agenda) > 0) {
                foreach($lista_agenda as $agenda){
                    DB::table('icp.agenda_virtual')->insert([
                        'id_servicio' => $servicio,
                        'dia' => $agenda['dia'],
                        'hora' => $agenda['hora_inicio'],
                        'hora2' => $agenda['hora_final'],
                    ]);
                }
            }

            return response()->json([
                'status' => true,
                'titulo' => 'Exito',
                'mensaje' => 'Se ha creado el servicio correctamente',
            ]);
        }else{
            return response()->json([   
                'status' => false,
                'titulo' => 'Error',
                'mensaje' => 'Ocurrió un error al crear el servicio',
            ]);
        }
    }

    public function eliminarServicio($id)
    {
        $servicio = DB::table('icp.servicios')->where('id', $id)->update([
            'estado' => 0,
        ]);

        if($servicio){
            return response()->json([
                'status' => true,
                'titulo' => 'Exito',
                'mensaje' => 'Se ha eliminado el servicio correctamente',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'titulo' => 'Error',
                'mensaje' => 'Ocurrió un error al eliminar el servicio',
            ]);
        }
    }

    public function activarServicio($id)
    {
        $servicio = DB::table('icp.servicios')->where('id', $id)->update([
            'estado' => 1,
        ]);

        if($servicio){
            return response()->json([
                'status' => true,
                'titulo' => 'Exito',
                'mensaje' => 'Se ha activado el servicio correctamente',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'titulo' => 'Error',
                'mensaje' => 'Ocurrió un error al activar el servicio',
            ]);
        }
    }

    public function editarServicio($id)
    {
        if(session('usuario')){
            $servicio = DB::table('icp.servicios')->where('id', $id)->first();
            $facilitador = DB::table('icp.facilitador')->where('id', $servicio->id_facilitador)->first();
            $modulos = DB::table('icp.contenido')->where('id_servicio', $servicio->id)->get();
            $ciudades = DB::table('icp.agenda_presencial')->where('id_servicio', $servicio->id)->get();
            $agenda = DB::table('icp.agenda_virtual')->where('id_servicio', $servicio->id)->get();

            $facilitadores = DB::table('icp.facilitador')->where('estado', 1)->get();

            return view('dashboard.editarServicio', compact('servicio', 'facilitador', 'modulos', 'ciudades', 'agenda', 'facilitadores'));
        }else{
            return redirect()->route('login');
        }
    }

    public function guardarEditarServicio(Request $request)
    {
        $data = $request->all();

        $id = $request->id;
        $nombre = $request->nombre;
        $descripcion = $request->descripcion_corta;
        $objetivo = $request->objetivo;
        $metodologia = $request->metodologia;
        $dirigido_a = $request->dirigido_a;
        $incluye = $request->incluye;
        $descripcion_contenido = $request->descripcion_contenido;
        $costo_presencial = $request->costo_presencial;
        $costo_virtual = $request->costo_virtual;
        $facilitador = $request->facilitador;
        $lista_modulos = $request->lista_modulos;
        $lista_ciudades = $request->lista_ciudades;
        $lista_agenda = $request->lista_agenda;
        $tipo = $request->tipo;
        
        $servicio = DB::table('icp.servicios')->where('id', $id)->update([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'objetivo' => $objetivo,
            'metodologia' => $metodologia,
            'dirigido' => $dirigido_a,
            'incluye' => $incluye,
            'costo_presencial' => $costo_presencial,
            'costo_virtual' => $costo_virtual,
            'id_facilitador' => $facilitador,
            'tipo' => $tipo,
            'descripcion_contenido' => $descripcion_contenido,
        ]);

        if($servicio){
            DB::table('icp.contenido')->where('id_servicio', $id)->delete();
            DB::table('icp.agenda_presencial')->where('id_servicio', $id)->delete();
            DB::table('icp.agenda_virtual')->where('id_servicio', $id)->delete();

            if (isset($lista_modulos) && is_array($lista_modulos) && count($lista_modulos) > 0) {
                foreach($lista_modulos as $modulo){
                    DB::table('icp.contenido')->insert([
                        'id_servicio' => $id,
                        'nombre' => $modulo['nombre'],
                    ]);
                }
            }

            if (isset($lista_ciudades) && is_array($lista_ciudades) && count($lista_ciudades) > 0) {
                foreach($lista_ciudades as $ciudad){
                    $ciudad = DB::table('icp.agenda_presencial')->insert([
                        'id_servicio' => $id,
                        'ciudad' => $ciudad['nombre'],
                    ]);
                }
            }

            if (isset($lista_agenda) && is_array($lista_agenda) && count($lista_agenda) > 0) {
                foreach($lista_agenda as $agenda){
                    DB::table('icp.agenda_virtual')->insert([
                        'id_servicio' => $id,
                        'dia' => $agenda['dia'],
                        'hora' => $agenda['hora_inicio'],
                        'hora2' => $agenda['hora_final'],
                    ]);
                }
            }

            return response()->json([
                'status' => true,
                'titulo' => 'Exito',
                'mensaje' => 'Se ha editado el servicio correctamente',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'titulo' => 'Error',
                'mensaje' => 'Ocurrió un error al editar el servicio',
            ]);
        }
    }

    public function irAServicio($id)
    {
        $servicio = DB::table('icp.servicios')->where('id', $id)->first();
        $facilitador = DB::table('icp.facilitador')->where('id', $servicio->id_facilitador)->first();
        $modulos = DB::table('icp.contenido')->where('id_servicio', $servicio->id)->get();
        $ciudades = DB::table('icp.agenda_presencial')->where('id_servicio', $servicio->id)->get();
        $agenda = DB::table('icp.agenda_virtual')->where('id_servicio', $servicio->id)->get();

        return view('diporgani', compact('servicio', 'facilitador', 'modulos', 'ciudades', 'agenda'));
    }
}
