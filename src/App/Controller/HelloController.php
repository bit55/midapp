<?php

namespace App\Controller;

use Bit55\Midcore\Controller\AbstractController;
use Psr\Http\Message\ResponseInterface;

/**
 * HelloController class
 */
class HelloController extends AbstractController
{

    /**
     * Index Action
     * @return ResponseInterface
     */
    public function indexAction()
    {
        return $this->render('app::home');
    }
}
