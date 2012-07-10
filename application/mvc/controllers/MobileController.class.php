<?php

namespace trxnMVC;

class MobileController extends BaseController
{
    public function __construct(){
        parent::__construct();

        $this->view->customTitle = 'TrxnMVC Dashboard';
    }

    public function indexAction(){
        $this->view->render('mobile/index', null);
    }

    public function registerAction(){

        if(isset($_POST) && (!empty($_POST))){
            $requiredFields = array('firstName', 'lastName', 'email', 'mobile');
            foreach($requiredFields as $missingFieldName){
                if(!isset($_POST[$missingFieldName]) || ($_POST[$missingFieldName] == '')){
                    $missingFields[] = $missingFieldName;

                    echo "false";
                    return;
                }
            }
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                echo 'false'; //failed validate email
                return;
            }

            echo "true";
            return;
        } else {
            $this->view->render('mobile/register', null);
        }
    }
}