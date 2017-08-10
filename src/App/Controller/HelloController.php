<?php

namespace App\Controller;

use Bit55\Midcore\Controller\Controller;
use Zend\Diactoros\Response\HtmlResponse;

/**
 * HelloController class
 */
class HelloController extends Controller
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
