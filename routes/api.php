<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\TerminarPagoController;
use App\Http\Controllers\TerminarPagoSirpController;

Route::post('/procesar-estado-pago', [TerminarPagoController::class, 'procesarEstadoPago'])->name('procesarEstadoPago');
Route::post('/procesar-estado-pago-sirp', [TerminarPagoSirpController::class, 'procesarEstadoPagoSirp'])->name('procesarEstadoPagoSirp');