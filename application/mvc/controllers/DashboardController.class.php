<?php

namespace trxnMVC;

class DashboardController extends BaseController
{
    public function __construct(){
        parent::__construct();

        $this->view->customTitle = 'TrxnMVC Dashboard';
    }

    public function indexAction(){
        $this->view->render('dashboard/index', 'dashboard');
    }
}