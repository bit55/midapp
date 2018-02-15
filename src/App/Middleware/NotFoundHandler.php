<?php

namespace App\Middleware;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Bit55\Templater\TemplateRendererInterface;

class NotFoundHandler implements MiddlewareInterface
{
    private $container;

    private $template;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->template = $container->get(TemplateRendererInterface::class);
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return (new HtmlResponse(
            $this->template->render('error/404.php')
        ))->withStatus(404);
    }
}
