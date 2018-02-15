<?php

namespace App\Action;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;


class HelloJsonAction implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface  $handler): ResponseInterface
    {
        //throw new \Exception('Ooups!');
        return new JsonResponse([
            'status' => 'ok',
            'params' => $request->getAttribute('routeParams'),
            'uri'    => $request->getUri()->getPath(),
            'ServerRequestInterface::getQueryParams'  => $request->getQueryParams(),
            'ServerRequestInterface::getAttributes'   => $request->getAttributes(),
            'timing'   => sprintf("%01.1f", (microtime(true) - REQUEST_TIME)*1000),
            'memory'   => round(memory_get_peak_usage()/1024),
        ]);
    }
}
