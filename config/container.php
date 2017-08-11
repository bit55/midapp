<?php

// Load configuration
$config = require __DIR__ . '/config.php';

// Build container
$container = new League\Container\Container();

// Register config service
$container->share('config', $config);

//dump($config); 

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

$callables = isset($config['dependencies']['callables']) ? $config['dependencies']['callables'] : [];
foreach ($callables as $callable) {
    if(is_callable($callable)) {
        $callable($container);
    }
}

//dump($config); exit;

// Other dependencies
// -----------------------------

// -----------------------------
return $container;
