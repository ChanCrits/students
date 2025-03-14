DEV\students\app\Http\Kernel.php
protected $routeMiddleware = [
    // ... other middleware
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
];