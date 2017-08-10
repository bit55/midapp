<?php

/**
 * Setup middleware pipeline:
 */
return [
    Bit55\Midcore\Middleware\ErrorHandler::class,
    
    // FastRoute middleware
    Bit55\Midcore\Middleware\FastRouteMiddleware::class,
    
    // MVC-style request handlers (Controllers)
    Bit55\Midcore\Middleware\ControllerHandlerMiddleware::class,
    //  ActionMiddleware handlers
    Bit55\Midcore\Middleware\ActionHandlerMiddleware::class,   
    
    // At this point, if no Response is return by any middleware, the
    // NotFoundHandler kicks in. You can provide other fallback
    // middleware to execute.
    Bit55\Midcore\Middleware\NotFoundHandler::class
];
