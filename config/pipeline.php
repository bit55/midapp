<?php

/**
 * Setup middleware pipeline:
 */
$pipeline = [];

// ErrorHandler middleware @todo add-if-debug
$pipeline[] = Bit55\Midcore\Middleware\ErrorHandler::class;

// Sessions
//$pipeline[] = App\Middleware\AuraSessionMiddleware::class;

// Check authentication
//$pipeline[] = Auth\Middleware\CheckAuth::class;

// FastRoute middleware
$pipeline[] = Bit55\Midcore\Middleware\FastRouteMiddleware::class;

//  ActionMiddleware handlers
$pipeline[] = Bit55\Midcore\Middleware\ActionHandler::class;

// At this point, if no Response is return by any middleware, the
// NotFoundHandler kicks in; alternately, you can provide other fallback
// middleware to execute.
$pipeline[] = Bit55\Midcore\Middleware\NotFoundHandler::class;

return $pipeline;
