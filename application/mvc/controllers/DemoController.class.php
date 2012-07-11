<?php

namespace trxnMVC;

class DemoController extends BaseController
{
    public function __construct(){
        parent::__construct();
        $this->view->customTitle = 'TrxnMVC Mainpage';
    }

    public function indexAction(){
        $this->view->render('demo/featured-content-slider', null);
    }

    public function showcaseAction(){
        $this->view->render('demo/showcase', null);
    }

    public function featuredContentSliderAction(){
        $this->view->render('demo/featured-content-slider');
    }
}