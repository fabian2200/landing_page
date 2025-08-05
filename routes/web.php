<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminarPagoController;
use App\Http\Controllers\TerminarPagoSirpController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiciosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/metodos-pago', [TerminarPagoController::class, 'listarMetodosPago'])->name('listarMetodosPago');

Route::get('/', function () { 
    $servicios = DB::table('icp.servicios')->where('estado', 1)->get();
    return view('inicio', compact('servicios'));
})->name('inicio');


// rutas para el clima

Route::get('/clima', function () {
    $precioDolar = 4000;
    $apiUrl = "https://climalaboral.icp360rh.com/api/listar-paquetes";

    $response = Http::get($apiUrl);

    if ($response->successful()) {
        $paquetes = collect($response->json())->map(function ($paquete) {
            return (object) $paquete; 
        });
    } else {
        $paquetes = collect([]);
    }
        
    return view('clima', compact('paquetes', 'precioDolar'));

})->name('clima');

Route::get('/paquetes', function () {
         
    $apiUrl = "https://climalaboral.icp360rh.com/api/listar-paquetes";

    $response = Http::get($apiUrl);

    if ($response->successful()) {
        $paquetes = collect($response->json())->map(function ($paquete) {
            return (object) $paquete; 
        });
    } else {
        $paquetes = collect([]);
    }
        
    return view('paquetes', compact('paquetes'));
})->name('paquetesPage');

Route::get('/formulario-pago', function (Request $request) {
    $id_paquete = $request->input('id_paquete'); 

    $apiUrl = "https://climalaboral.icp360rh.com/api/buscar-paquete?id_paquete=" . $id_paquete;
    $response = Http::get($apiUrl);

    if ($response->successful()) {
        $paquete = $response->object();
    }else{
        $paquete = null;
    }

    if($paquete){
        $cantidad_pines = $paquete->numero_pines; 
        $valor_pin = $paquete->precio_pin;  
        $descuento = $paquete->descuento; 
        $total = $paquete->total; 
        $desc_servicio = $request->input('desc_servicio', 'Venta de pines'); 
        $nombre = $paquete->nombre;
    }else{
        $cantidad_pines = 0; 
        $valor_pin = 0; 
        $descuento =0; 
        $total = 0;
        $desc_servicio = "Venta de pines"; 
        $nombre = "paquete no encontrado";
    }
    return view('formularioPagoTarjeta', compact('cantidad_pines', 'valor_pin', 'total', 'desc_servicio', 'descuento', 'nombre', 'id_paquete'));
})->name('formularioPagoTarjeta');

Route::get('/estado-pago', [TerminarPagoController::class, 'estadoPago'])->name('estadoPago');

Route::post('/procesar-pago', [TerminarPagoController::class, 'TerminarPago'])->name('TerminarPago');
Route::post('/procesar-pago-tarjeta', [TerminarPagoController::class, 'TerminarPagoTarjeta'])->name('TerminarPagoTarjeta');


Route::get('/pagina-error', function () {
    return view('errorPage');
})->name('error.page');

// rutas para el sirp

Route::get('/sirp', function () {
    $precioDolar = 4000;
    $apiUrl = "https://sirp.icp360rh.com/acciones/listarPaquetes.php";

    $response = Http::get($apiUrl);

    if ($response->successful()) {
        $paquetes = collect($response->json())->map(function ($paquete) {
            return (object) $paquete; 
        });
    } else {
        $paquetes = collect([]);
    }
    return view('sirp', compact('paquetes', 'precioDolar'));
})->name('sirp');

Route::get('/paquetes-sirp', function () {
    $apiUrl = "https://sirp.icp360rh.com/acciones/listarPaquetes.php";

    $response = Http::get($apiUrl);

    if ($response->successful()) {
        $paquetes = collect($response->json())->map(function ($paquete) {
            return (object) $paquete; 
        });
    } else {
        $paquetes = collect([]);
    }
        
    return view('paquetesSirp', compact('paquetes'));
})->name('paquetes-sirp');


Route::get('/formulario-pago-sirp', function (Request $request) {
    $id_paquete = $request->input('id_paquete'); 

    $apiUrl = "https://sirp.icp360rh.com/acciones/consultarInfopaquete.php?id=" . $id_paquete;
    $response = Http::get($apiUrl);

    if ($response->successful()) {
        $paquete = $response->json();
        if($paquete['status'] == 'success'){
            $paquete = $paquete['paquete'];
        }else{
            $paquete = null;
        }
    }else{
        $paquete = null;
    }

    if($paquete){
        $cantidad_pines = $paquete['numero_pines']; 
        $valor_pin = $paquete['precio_pin'];  
        $descuento = $paquete['descuento']; 
        $total = $paquete['total']; 
        $desc_servicio = $request->input('desc_servicio', 'Venta de pines para SIRP'); 
        $nombre = $paquete['nombre'];
    }else{
        $cantidad_pines = 0; 
        $valor_pin = 0; 
        $descuento =0; 
        $total = 0;
        $desc_servicio = "Venta de pines para SIRP"; 
        $nombre = "paquete no encontrado";
    }
    return view('formularioPagoTarjetaSirp', compact('cantidad_pines', 'valor_pin', 'total', 'desc_servicio', 'descuento', 'nombre', 'id_paquete'));
})->name('formularioPagoTarjetaSirp');

Route::post('/procesar-pago-sirp', [TerminarPagoSirpController::class, 'TerminarPagoSirp'])->name('TerminarPagoSirp');
Route::post('/procesar-pago-tarjeta-sirp', [TerminarPagoSirpController::class, 'TerminarPagoTarjetaSirp'])->name('TerminarPagoTarjetaSirp');

Route::post('/enviar-correo-contacto', [EmailController::class, 'enviarCorreoContacto'])->name('enviarCorreoContacto');

Route::get('/testimonios', function () {
    return view('testimonios');
})->name('testimonios');

// rutas para el dashboard
Route::get('/login', [DashboardController::class, 'login'])->name('login');
Route::post('/iniciar-sesion', [DashboardController::class, 'iniciarSesion'])->name('iniciarSesion');
Route::get('/cerrar-sesion', [DashboardController::class, 'cerrarSesion'])->name('cerrarSesion');

Route::get('/dashboard', [DashboardController::class, 'servicios'])->name('servicios');
Route::get('/crear-servicio', [DashboardController::class, 'crearServicio'])->name('crearServicio');
Route::get('/editar-servicio/{id}', [DashboardController::class, 'editarServicio'])->name('editarServicio');

Route::get('/facilitadores', [DashboardController::class, 'facilitadores'])->name('facilitadores');
Route::post('/facilitadores/crear', [DashboardController::class, 'crearFacilitador'])->name('crearFacilitador');
Route::get('/facilitadores/eliminar/{id}', [DashboardController::class, 'eliminarFacilitador'])->name('eliminarFacilitador');
Route::get('/facilitadores/activar/{id}', [DashboardController::class, 'activarFacilitador'])->name('activarFacilitador');
Route::post('/facilitadores/editar', [DashboardController::class, 'editarFacilitador'])->name('editarFacilitador');

Route::post('/registro-servicio', [DashboardController::class, 'registroServicio'])->name('registroServicio');
Route::get('/servicios/eliminar/{id}', [DashboardController::class, 'eliminarServicio'])->name('eliminarServicio');
Route::get('/servicios/activar/{id}', [DashboardController::class, 'activarServicio'])->name('activarServicio');
Route::post('/editar-servicio', [DashboardController::class, 'guardarEditarServicio'])->name('guardarEditarServicio');

Route::get('/servicio/{id}', [DashboardController::class, 'irAServicio'])->name('irAServicio');

Route::get('/enlaces', [DashboardController::class, 'enlaces'])->name('enlaces');
Route::post('/crear-enlace', [DashboardController::class, 'crearEnlace'])->name('crearEnlace');
Route::get('/enlaces/eliminar/{id}', [DashboardController::class, 'eliminarEnlace'])->name('eliminarEnlace');

Route::get('/formulario-pago-servicios/{id_servicio}/{modalidad}', [ServiciosController::class, 'formularioPagoServicios'])->name('formularioPagoServicios');
Route::post('/procesar-pago-servicios', [ServiciosController::class, 'TerminarPagoServicios'])->name('TerminarPagoServicios');
Route::post('/procesar-pago-tarjeta-servicios', [ServiciosController::class, 'TerminarPagoTarjetaServicios'])->name('TerminarPagoTarjetaServicios');