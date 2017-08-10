<?php

// Общие страницы
$route->get('/', 'App\Controller\HelloController@indexAction');

// Action middleware handler
$route->get('/hello', App\Action\HelloAction::class);

// With middleware
$route->get('/hello/{id}', [App\Middleware\HelloMiddleware::class, App\Action\HelloAction::class]);
// -- END TESTS

$route->addGroup('/another', function(FastRoute\RouteCollector $route) {    
    $controller = App\Controller\AnotherController::class;    
    $route->get('', $controller.'@indexAction');   
});

