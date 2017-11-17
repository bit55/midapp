<?php

define("REQUEST_TIME", microtime(true));
date_default_timezone_set('Asia/Novosibirsk');

// Delegate static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server'
    && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))
) {
    return false;
}

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

call_user_func(function () {
    // ServerRequest instance
    $request = Zend\Diactoros\ServerRequestFactory::fromGlobals();
    
    /** @var \Psr\Container\ContainerInterface $container */
    $container = require 'config/container.php';
    // Middleware pipeline
    $pipeline = require 'config/pipeline.php';
    $dispatcher = new Middleland\Dispatcher($pipeline, $container);
    $response = $dispatcher->dispatch($request);
    
    // Emitting response
    $container
        ->get(Bit55\Midcore\Response\ResponseEmitterInterface::class)
        ->emit($response);
});
