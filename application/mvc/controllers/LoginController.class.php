<?php

namespace trxnMVC;

class LoginController extends BaseController
{
    public function __construct(){
        parent::__construct();
        parent::loadModel('Login');
        $this->view->customTitle = 'TrxnMVC Login';
    }

    public function indexAction(){
        $this->loginAction();
    }

    public function registerAction(){
        if((isset($_POST['username'])) &&
            (isset($_POST['password'])) &&
            (isset($_POST['passwordConfirm'])) &&
            ($_POST['password']==$_POST['passwordConfirm']))
        {
            if((captchaEnabled == true) &&
                (isset($_POST['recaptcha_challenge_field'])) &&
                (isset($_POST['recaptcha_response_field'])))
            {
                require_once(__DIR__.'/../../libs/CaptchaHandler.class.php');
                $captchaSuccess = CaptchaHandler::verifyCaptcha($_POST['recaptcha_challenge_field'],$_POST['recaptcha_response_field']);

                if($captchaSuccess !== true){
                    $this->view->params['captchaEnabled']   = captchaEnabled;
                    $this->view->params['captchaPublicKey'] = captchaPublicKey;
                    $this->view->params['selectedTab']  = 'register';
                    $this->view->params['success']      = false;
                    $this->view->render('default/register');
                }
            }

            $registerSuccess = $this->model->register($_POST['username'], $_POST['password']);

            if($registerSuccess === true){
                header('Location: ../dashboard/index');
            } else {
                if(captchaEnabled == true){
                    $this->view->params['captchaEnabled']   = captchaEnabled;
                    $this->view->params['captchaPublicKey'] = captchaPublicKey;
                }
                $this->view->params['selectedTab']  = 'register';
                $this->view->params['success']      = false;
                $this->view->render('default/register');
            }
        } else {
            //not attempted, displaying form
            if(captchaEnabled == true){
                $this->view->params['captchaEnabled']   = captchaEnabled;
                $this->view->params['captchaPublicKey'] = captchaPublicKey;
            }

            $this->view->params['selectedTab'] = 'register';
            $this->view->render('default/register');
        }
    }

    public function loginAction(){
        if((isset($_POST['username'])) && (isset($_POST['password']))){
            $loginSuccess = $this->model->login($_POST['username'], $_POST['password']);
            if($loginSuccess === true){
                header('Location: dashboard/index');
                exit();
            }
        }

        //display dashboard
        $this->view->params['selectedTab'] = 'login';
        $this->view->render('default/login');
    }

    public function logoutAction(){
        //logout
        $this->model->logout();

        //display mainpage
        header('Location: '.urlpath.'');
        exit();
    }
}