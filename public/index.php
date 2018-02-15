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

use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response\SapiEmitter;
use Middleland\Dispatcher;

call_user_func(function () {
    $app = new Bit55\Midcore\Application(
        'config/container.php',
        'config/pipeline.php'
    );
    $app->run();
    
    /* // DI container
    $container = include 'config/container.php';
    // Middleware pipeline
    $pipeline = include 'config/pipeline.php';
    
    $dispatcher = new Dispatcher($pipeline, $container);

    // Process request
    $request = ServerRequestFactory::fromGlobals();
    
    (new SapiEmitter())->emit($dispatcher->dispatch($request)); */
});
