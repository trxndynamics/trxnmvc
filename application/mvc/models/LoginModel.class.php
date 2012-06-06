<?php

namespace trxnMVC;

class LoginModel extends BaseModel
{
    public function __construct(){
        $this->mongodb  = new \Mongo();
        $this->db       = $this->mongodb->selectDB(mongoDBDatabaseName);
    }

    private function setLoginSession($username){
        Session::init();
        Session::set('loggedIn', true);
        Session::set('username', $username);
        Session::set('lastIteraction', time());
    }

    public function register($username, $password){
        $users = $this->db->selectCollection('users');

        $insertionArray = array('username'=>$username,
                                'password'=>$password);

        if($users->findOne(array('username'=>$username)) === null){
            $users->insert($insertionArray);

            //if correctly added to database
            if(isset($insertionArray['_id'])){
                $this->setLoginSession($username);
                return true;
            }
        }

        return false;
    }

    public function login($username, $password){
        $usersCollection    = $this->db->selectCollection('users');

        $result = $usersCollection->findOne(array('username'=>$username, 'password'=>$password));
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