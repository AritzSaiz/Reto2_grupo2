<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    // Middleware para autenticar tokens.
    protected $routeMiddleware = [
        'jwt.auth' => \Tymon\JWTAuth\Http\Middleware\Authenticate::class,
        'jwt.refresh' => \Tymon\JWTAuth\Http\Middleware\RefreshToken::class,
    ];

    /**
     * Las aplicaciones HTTP globales que se ejecutan durante cada solicitud.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\Cors::class, // Añadir para que ejecute la funcionalidad de "Participar" en incidencias.

        // Middlewares básicos de Laravel
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * Grupos de middleware.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // Si usas Verificación de CSRF
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            \App\Http\Middleware\Cors::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Middleware de ruta individual.
     *
     * Aquí puedes agregar middlewares personalizados o librerías externas como JWTAuth.
     *
     * @var array
     */
//    protected $routeMiddleware = [
//        // Otros middlewares...
//        'auth' => \App\Http\Middleware\Authenticate::class,
//        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
//        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
//        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
//        'can' => \Illuminate\Auth\Middleware\Authorize::class,
//        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
//        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
//        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
//        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
//        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
//
//        // Agregamos los middlewares de JWTAuth
//        'auth.jwt' => \Tymon\JWTAuth\Http\Middleware\Authenticate::class,
//        'jwt.refresh' => \Tymon\JWTAuth\Http\Middleware\RefreshToken::class,
//    ];

}
