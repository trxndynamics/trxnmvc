<?php

namespace trxnMVC;

class LoginModel extends BaseModel
{
    public function __construct(){
        try {
            $this->mongodb  = new \Mongo();
            $this->db       = $this->mongodb->selectDB(mongoDBDatabaseName);
        } catch(\MongoConnectionException $mce){
            //service unavailable, redirect to index page
            header('Location: index');
        }
    }

    private function setLoginSession($username){
        Session::init();
        Session::set('loggedIn', true);
        Session::set('username', $username);
        Session::set('lastIteraction', time());
    }

    public function register($username, $password){
        require_once(__DIR__.'/../../libs/PasswordChecker.class.php');

        $minLengthSuccess   = \PasswordChecker::checkPasswordAgainstMinLength($password);
        $strengthSuccess    = \PasswordChecker::checkPasswordStrength($password);

        if(($minLengthSuccess == true) && ($strengthSuccess == true)){
            $customSalt         = "BBcUG1hlngKLAC%!%avmvk";
            $passwordHash = \PasswordChecker::createPasswordHash($customSalt.$password);

            $users = $this->db->selectCollection(mongoDBDatabaseName . '_users');
            $insertionArray = array('username'=>$username,
                                    'password'=>$passwordHash);

            if($users->findOne(array('username'=>$username)) === null){
                $users->insert($insertionArray);

                //if correctly added to database
                if(isset($insertionArray['_id'])){
                    $this->setLoginSession($username);
                    return true;
                }
            }
        }

        return false;
    }

    public function login($username, $password){
        require_once(__DIR__.'/../../libs/PasswordChecker.class.php');

        $usersCollection    = $this->db->selectCollection(mongoDBDatabaseName.'_users');

        $customSalt         = "BBcUG1hlngKLAC%!%avmvk";
        $result = $usersCollection->findOne(array('username'=>$username, 'password'=>\PasswordChecker::createPasswordHash($customSalt.$password)));
        if($result != null){
            $this->setLoginSession($username);
            return true;
        }

        return false;
    }

    public function logout(){
        Session::destroy();
    }
}