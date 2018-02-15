<?php


namespace App\Action;

use Psr\Container\ContainerInterface;
use Bit55\Templater\TemplateRendererInterface;
class AbstractActionFactory
{
    public function __invoke(ContainerInterface $container, string $alias)
    {
        $template = $container->get(TemplateRendererInterface::class); //@todo TemplateManager, TemplateRendererInterface
        return new $alias($template, $container); //@note Prevent using container in Actions as possible
    }
}
