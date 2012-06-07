<?php

namespace trxnMVC;

class BaseView
{
    public $params;

    public function __construct(){
        $this->params = array();
    }

    public function setParameter($key, $value){
        $this->params[$key] = $value;
    }

    public function unsetParameter($key){
        unset($this->params[$key]);
    }

    public function unsetAllParameters(){
        unset($this->params);
        $this->params = array();
    }

    public function render($name, $styling='default'){
        if($styling === null){
            require_once(__DIR__.'/../mvc/views/'.$name.'.php');
        } else {
            require_once(__DIR__.'/../mvc/views/layout/headers/'.$styling.'.php');
            require_once(__DIR__.'/../mvc/views/'.$name.'.php');
            require_once(__DIR__.'/../mvc/views/layout/footers/'.$styling.'.php');
        }
    }
}