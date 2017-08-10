<?php

define("REQUEST_TIME", microtime(true));

// Set default timezone
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
    /** @var \Psr\Container\ContainerInterface $container */
    $container = require 'config/container.php';
    
    // ServerRequest instance
    $request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
    
    // Middleware pipeline
    $pipeline = require 'config/middleware.php';
    $dispatcher = new Middleland\Dispatcher($pipeline, $container);
    $response = $dispatcher->dispatch($request);
    
    // Emitting response
    $container->get(Bit55\Midcore\Response\ResponseEmitterInterface::class)
              ->emit($response);
});
