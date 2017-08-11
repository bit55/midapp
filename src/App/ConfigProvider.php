<?php

namespace App;

/**
 * The configuration provider for the App module
 *
 */
class ConfigProvider
{
    /**
     * Returns the configuration array.
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => [
                'invokables' => [
                    Action\HelloAction::class => Action\HelloAction::class,
                    Middleware\HelloMiddleware::class =>Middleware\HelloMiddleware::class,
                ]
            ],
            'templates'    => [
                'defaultDirectory' => 'templates',
                'namespaces' => [
                    'app'       => 'templates/app',
                    'error'     => 'templates/error',
                    'layout'    => 'templates/layout',
                ],
            ],
        ];
    }

}
