<?php

namespace Core\security;
use App\Model\UserModel;

class auth {

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function login($username, $hashpass){
        $current_user = $this->model->getUserBy('username', $username)[0];

        if(!empty($current_user) && password_verify($hashpass, $current_user['password'])){
            $_SESSION['id'] = (int)$current_user['id'];
            $_SESSION['username'] = $current_user['username'];
            return true;
        }

        return false;
    }

}