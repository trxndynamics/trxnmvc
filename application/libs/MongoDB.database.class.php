<?php

class MongoDBConnection extends Mongo
{

    public function __construct(){
        if(isset($_SERVER['HTTP_HOST']) && ($_SERVER['HTTP_HOST']=='trxnmvc.localhost')){
            parent::__construct('mongodb://localhost:27017', array('connect'=>true));
        } else {
            //parent::__construct('mongodb://mongousername:mongopassword@127.0.0.1:27017', array('connect'=>true));

        }
    }
}