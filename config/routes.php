<?php

$route->get('/', [App\Middleware\HelloMiddleware::class, App\Action\HelloAction::class]);

$route->get('/hello/{id}', [App\Middleware\HelloMiddleware::class, App\Action\HelloAction::class]);

