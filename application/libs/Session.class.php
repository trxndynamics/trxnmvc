<?php

namespace trxnMVC;

class Session
{
    public static function init(){
        if(!isset($_SESSION))
            session_start();
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        if(isset($_SESSION[$key]))
            return $_SESSION[$key];
        else
            return null;
    }

    public static function destroy(){
        session_destroy();
    }
}