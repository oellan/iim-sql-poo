<?php

namespace Core\security;

class Auth {

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function islogged(){
        if(isset($_SESSION['id'])) return true;
        return false;
    }

    public function login($username, $hashpass){
        $current_user = $this->model->getUserBy('username', $username);

        if(!empty($current_user) && password_verify($hashpass, $current_user['password'])){
            $_SESSION['id'] = (int)$current_user['id'];
            $_SESSION['username'] = $current_user['username'];
            return true;
        }

        return false;
    }

}