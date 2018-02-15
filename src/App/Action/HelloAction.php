<?php

namespace App\Action;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;


class HelloAction extends AbstractAction
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface  $handler): ResponseInterface
    {
        return $this->render('app/hello.php');
    }
}
