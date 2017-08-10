<?php

namespace App;

/**
 * The configuration provider for the App module
 *
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencyConfig(),
            'templates'    => $this->getTemplates(),
        ];
    }
    
    /**
     * Return dependency mappings for this component.
     * @return array
     */
    public function getDependencyConfig()
    {
        return [
            'invokables' => [
                Action\HelloAction::class => Action\HelloAction::class,
                Middleware\HelloMiddleware::class =>Middleware\HelloMiddleware::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration.
     * @return array
     */
    public function getTemplates()
    {
        return [
            'defaultDirectory' => 'templates',
            'namespaces' => [
                'app'       => 'templates/app',
                'error'     => 'templates/error',
                'layout'    => 'templates/layout',
            ],
        ];
    }
    
    
}
