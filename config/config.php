<?php

use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

// To enable or disable caching, set the boolean in `config/autoload/local.php`.
$cacheConfig = [
    'config_cache_path' => 'data/cache/config.cached.php',
    'config_cache_enabled' => false,
    'routesConfig' => 'config/routes.php',
];

$aggregator = new ConfigAggregator([
    // Include cache configuration
    new ArrayProvider($cacheConfig),
    // Default Midcore config
    Bit55\Midcore\ConfigProvider::class,
    Bit55\Templater\ConfigProvider::class,
    // Default App module config
    App\ConfigProvider::class,
    
    // Load application config in a pre-defined order in such a way that local settings
    // overwrite global settings. (Loaded as first to last):
    //   - `global.php`
    //   - `*.global.php`
    //   - `local.php`
    //   - `*.local.php`
    new PhpFileProvider('config/autoload/{{,*.}global,{,*.}local}.php'),
    // Load development config if it exists
    new PhpFileProvider('config/development.config.php'),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
