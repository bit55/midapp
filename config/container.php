<?php

// Load configuration
$config = require __DIR__ . '/config.php';

// Build container
$container = new League\Container\Container();

// Register config service
$container->share('config', $config);

dump($config); 

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

// TODO: Refactor it!
$containerConfigCallables = isset($config['containerConfigCallables']) ? $config['containerConfigCallables'] : [];
foreach ($containerConfigCallables as $fn) {
    if(is_callable($fn)) {
        $fn($container);
    }
}

dump($config); exit;


// Other dependencies
// -----------------------------

// -----------------------------
return $container;
