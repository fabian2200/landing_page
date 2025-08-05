<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\TerminarPagoController;
use App\Http\Controllers\TerminarPagoSirpController;
use App\Http\Controllers\ServiciosController;

Route::post('/procesar-estado-pago', [TerminarPagoController::class, 'procesarEstadoPago'])->name('procesarEstadoPago');
Route::post('/procesar-estado-pago-sirp', [TerminarPagoSirpController::class, 'procesarEstadoPagoSirp'])->name('procesarEstadoPagoSirp');
Route::post('/procesar-estado-pago-servicios', [ServiciosController::class, 'procesarEstadoPagoServicios'])->name('procesarEstadoPagoServicios');