<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Las rutas que serán excluidas de verificación CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        'api/crear-chat',
        'api/guardar-mensaje',
    ];
}