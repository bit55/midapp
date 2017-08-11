<?php

/**
 * Setup middleware pipeline:
 */
return [
    // ErrorHandler middleware
    Bit55\Midcore\Middleware\ErrorHandler::class,

    // FastRoute middleware
    Bit55\Midcore\Middleware\FastRouteMiddleware::class,

    // MVC-style request handlers (Controllers)
    Bit55\Midcore\Middleware\ControllerHandler::class,
    // ActionMiddleware handlers
    Bit55\Midcore\Middleware\ActionHandler::class,
    


    // At this point, if no Response is return by any middleware, the
    // NotFoundHandler kicks in. You can provide other fallback
    // middleware to execute.
    Bit55\Midcore\Middleware\NotFoundHandler::class
];
