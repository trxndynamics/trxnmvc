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
        if(TrxnSession::get('subscribedToMailingList') === true)    header('Location: '.urlpath);

        if(isset($_POST['email'])){
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                try {
                    //subscribe to mailchimp api
                    if(mailchimpEnabled === true){
                        require_once(__DIR__.'/../../libs/thirdParty/mailchimp/MCAPI.class.php');
                        $api    = new \MCAPI(mailchimpAPIKey);
                        $mailChimpSuccess = $api->listSubscribe(mailchimpDefaultListId, $_POST['email'], '');
                    }

                    require_once(__DIR__.'/../../libs/MongoDB.database.class.php');
                    $mongodb  = new \MongoDBConnection();
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

                if(isset($mailChimpSuccess) && (is_bool($mailChimpSuccess))){
                    $this->view->params['mailChimpSuccess'] = $mailChimpSuccess;
                }

                $this->view->params['success'] = true;
                $this->view->render('default/subscribe');
                TrxnSession::set('subscribedToMailingList',true);
            } else {
                $this->view->params['success'] = false;
                $this->view->render('default/subscribe');
            }

            $this->view->render('default/subscribe');
        } else {
            header('Location: '.urlpath);
        }
    }

    public function serviceUnavailableAction(){
        $this->view->render('default/serviceUnavailable');
    }

    public function showcaseAction(){
        $this->view->render('default/showcase', null);
    }
}