protected $middleware = [
    \Illuminate\Http\Middleware\HandleCors::class,
    // ... other middleware
];


protected $middleware = [
    \Illuminate\Http\Middleware\HandleCors::class, // Add this line
    \App\Http\Middleware\TrustProxies::class,
    \Illuminate\Http\Middleware\HandleCors::class,
    \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
    // ... other middleware entries
];
