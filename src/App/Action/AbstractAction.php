<?php


namespace App\Action;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Bit55\Templater\TemplateRendererInterface;

abstract class AbstractAction implements MiddlewareInterface
{
    protected $template;
    
    public function __construct(TemplateRendererInterface $template = null)
    {
        $this->template = $template;
    }
    
    public function process(ServerRequestInterface $request, RequestHandlerInterface  $handler): ResponseInterface
    {
    }
    
    /**
     * Render template and return response object
     *
     * @param string $template
     * @param array $data
     * @return ResponseInterface
     */
    protected function render($template, array $data = [])
    {
        return new HtmlResponse(
            $this->template->render($template, $data)
        );
    }
    
    /**
     * Render JSON response
     *
     * @param array $data
     * @param int $status
     * @param array $headers
     * @return JsonResponse
     */
    protected function renderJson($data, $status = 200, array $headers = [])
    {
        return new JsonResponse($data, $status, $headers);
    }
    
    
    /**
     * Redirect response
     *
     * @param string $uri
     * @param int $status
     * @param array $headers
     * @return JsonResponse
     */
    protected function redirect($uri, $status = 302, array $headers = [])
    {
        return new RedirectResponse($uri, $status, $headers);
    }
}
