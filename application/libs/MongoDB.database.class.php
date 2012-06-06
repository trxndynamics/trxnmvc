<?php

class MongoDBConnection extends Mongo
{
    public function __construct(){
        if((mongoDBUsername != '') || (mongoDBPassword != '')){
            parent::__construct('mongodb://' . mongoDBUsername . ':' . mongoDBPassword . '@' . mongoDBHostname . ':' . mongoDBPort, array('connect'=>true));
        } else {
            parent::__construct('mongodb://' . mongoDBHostname . ':' . mongoDBPort, array('connect'=>true));
        }
    }
}