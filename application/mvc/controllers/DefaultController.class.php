<?php

namespace trxnMVC;

class DefaultController extends BaseController
{
    public function __construct(){
        parent::__construct();
        $this->view->customTitle = 'TrxnMVC Mainpage';
    }

    public function indexAction(){
        $this->view->render('default/index');
    }

    public function pageNotFoundAction(){
        $this->view->render('default/404');
    }

    public function aboutAction(){
        $this->view->params['selectedTab'] = 'about';
        $this->view->render('default/about');
    }

    public function subscribeAction(){
        if(Session::get('subscribedToMailingList') === true)    header('Location: '.urlpath);

        if(isset($_POST['email'])){
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

                try {
                    $mongodb  = new \Mongo();
                    $db       = $mongodb->selectDB(mongoDBDatabaseName);
                    $collection = $db->selectCollection(mongoDBDatabaseName.'_subscribers');

                    if($collection->findOne(array('email'=>utf8_encode($_POST['email']))) !== null){
                        //already present
                    } else {
                        //insert email
                        $collection->insert(array('email'=>utf8_encode($_POST['email'])));
                    }
                } catch(\MongoConnectionException $mce){
                    //service unavailable, redirect to index page
                    header('Location: index');
                }

                $this->view->params['success'] = true;
                $this->view->render('default/subscribe');
                Session::set('subscribedToMailingList',true);
            } else {
                $this->view->params['success'] = false;
                $this->view->render('default/subscribe');
            }

            $this->view->render('default/subscribe');
        } else {
            header('Location: '.urlpath);
        }
    }
}