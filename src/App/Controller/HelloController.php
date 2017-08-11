<?php

namespace App\Controller;

use Bit55\Midcore\Controller\AbstractController;
use Zend\Diactoros\Response\HtmlResponse;

/**
 * HelloController class
 */
class HelloController extends AbstractController
{

    /**
     * Index Action
     * @return HtmlResponse
     */
    public function indexAction()
    {
        return $this->render('app::home');
    }
}
