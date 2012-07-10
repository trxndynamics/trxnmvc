<?php

namespace trxnMVC;

class BaseController
{
    public $view;
    public $model;

    public function __construct(){
        $this->view = new BaseView();
        TrxnSession::init();
    }

    public function loadModel($modelName){
        $modelPath = __DIR__.'/../mvc/models/' . ucfirst($modelName) . 'Model.class.php';

        if(file_exists($modelPath)){
            require_once($modelPath);

            $modelName = __NAMESPACE__ . '\\' . ucfirst($modelName) . 'Model';
            $this->model = new $modelName();
        }
    }
}