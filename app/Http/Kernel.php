<?php

namespace Backend\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Backend\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Backend\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \Backend\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'has.access' => \Backend\Http\Middleware\HasAccess::class,
        'is.customer' => \Backend\Http\Middleware\IsCustomer::class,
        'is.not.customer' => \Backend\Http\Middleware\IsNotCustomer::class,
        'edit.customer' => \Backend\Http\Middleware\EditCustomer::class,
        'edit.own.customer' => \Backend\Http\Middleware\EditOwnProfile::class,
        'read.permission' => \Backend\Http\Middleware\ReadPermission::class,
        'can.edit' => \Backend\Http\Middleware\CanEdit::class,
        'can.delete' => \Backend\Http\Middleware\CanDelete::class,
        'is.active' => \Backend\Http\Middleware\IsActive::class,
    ];
}
