<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\TerminarPagoController;

Route::post('/procesar-estado-pago', [TerminarPagoController::class, 'procesarEstadoPago'])->name('procesarEstadoPago');