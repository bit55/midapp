<?php

namespace App\Action;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;


class HelloTwigAction extends AbstractAction
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface  $handler): ResponseInterface
    {
        $context = [
            'year' => date('Y'),
            'timing' => sprintf("%01.1f", (microtime(true) - REQUEST_TIME)*1000),
            'memory' => round(memory_get_peak_usage()/1024)
        ];
        
        return $this->render('app/hello.html', $context);
    }
}
