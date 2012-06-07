<?php

namespace trxnMVC;

class AdminController extends BaseController
{
    private $user       = 'admin';
    private $password   = 'password';

    public function __construct(){
        parent::__construct();
        $this->view->customTitle = 'Administration';

        if(Session::get('isWebsiteAdministrator') !== true){
            $this->authenticateAction();
            exit();
        }
    }

    public function authenticateAction(){
        if(isset($_POST['username']) &&
            (isset($_POST['password'])) &&
            ($_POST['username']===$this->user) &&
            ($_POST['password']===$this->password)){
            Session::set('isWebsiteAdministrator', true);
            header('Location: '.urlpath.'/admin/index');
        } else {
            $this->view->render('admin/authenticate', null);
        }
    }

    public function indexAction(){
        $this->view->render('admin/index', null);
    }

    public function signOutAction(){
        Session::destroy();
        header('Location: '.urlpath.'/admin/index');
    }
}