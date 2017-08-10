<?php

// Load configuration
$config = require __DIR__ . '/config.php';

// Build container
$container = new League\Container\Container();

// Register config service
$container->share('config', $config);



$factories = isset($config['dependencies']['factories']) ? $config['dependencies']['factories'] : [];
foreach ($factories as $alias => $factory) {
    $container->share($alias, function() use ($container, $factory) {
        return (new $factory())($container);
    });
}

$invokables = isset($config['dependencies']['invokables']) ? $config['dependencies']['invokables'] : [];
foreach ($invokables as $alias => $name) {
    $container->share($alias, $name);
}
//dump($container);

// Other dependencies
// -----------------------------
// TODO: Move to Bit55\Midcore\ConfigProvider
$container->share(Bit55\Midcore\Middleware\ControllerHandlerMiddleware::class)->withArgument($container);
$container->share(Bit55\Midcore\Middleware\ActionHandlerMiddleware::class)->withArgument($container);
$container->share(Bit55\Midcore\Middleware\NotFoundHandler::class)->withArgument($container);
// -----------------------------
return $container;
