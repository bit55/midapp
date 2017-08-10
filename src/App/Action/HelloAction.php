<?php

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class HelloAction implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        return new JsonResponse([
            'status' => 'ok',
            'params' => $request->getAttribute('routeParams'),
            'uri'    => $request->getUri()->getPath(),
            'query'  => $request->getQueryParams(),
            'attr'   => $request->getAttributes()
        ]);
    }
}
