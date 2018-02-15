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
                'factories' => [
                    Action\HelloAction::class => Action\AbstractActionFactory::class,
                    Action\HelloTwigAction::class => Action\AbstractActionFactory::class,
                    Middleware\NotFoundHandler::class => Middleware\NotFoundHandlerFactory::class,
                ],
                'invokables' => [
                    Action\HelloJsonAction::class => Action\HelloJsonAction::class,
                    Middleware\HelloMiddleware::class =>Middleware\HelloMiddleware::class,
                ]
            ],
            'templates'    => [
                'defaultDirectory'  => 'templates',
            ],
        ];
    }
}
