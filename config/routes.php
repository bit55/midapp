<?php

$route->get('/', App\Action\HelloAction::class);
$route->get('/json', [App\Middleware\HelloMiddleware::class, App\Action\HelloJsonAction::class]);
$route->get('/twig', App\Action\HelloTwigAction::class);

$route->get('/hello/{id}', [App\Middleware\HelloMiddleware::class, App\Action\HelloAction::class]);

