<?php

namespace trxnMVC;

class DefaultController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }

    public function indexAction(){
        $this->view->render('default/index');
    }

    public function pageNotFoundAction(){
        $this->view->render('default/404');
    }
}