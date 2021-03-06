<?php

namespace trxnMVC;

class TrackingController extends BaseController
{
    public function __construct(){
        parent::__construct();

        if(TrxnSession::get('isWebsiteAdministrator') !== true)
            header('Location: '.urlpath.'');

        $this->view->customTitle = 'TrxnMVC Tracking';
    }

    public function indexAction(){
        $this->view->render('admin/tracking/index', null);
    }

    public function pageViewsAction(){
        try {
            require_once(__DIR__.'/../../libs/MongoDB.database.class.php');
            $mongodb  = new \MongoDBConnection();
            $db         = $mongodb->selectDB(mongoDBDatabaseName);
            $collection = $db->selectCollection(mongoDBDatabaseName.'_pageviews');

            $pageViewData = array();

            $result = $collection->find();
            if($result->hasNext()){
                while($currentItem = $result->getNext()){
                    $pageViewData[$currentItem['controllerName']][$currentItem['viewName']] = $currentItem['views'];
                }
            }

            ksort($pageViewData);
            $this->view->params['pageViewData'] = $pageViewData;
            $this->view->render('admin/tracking/pageviews', null);

        } catch(\MongoConnectionException $mce){
            header('Location: '.urlpath.'');
        }
    }
}