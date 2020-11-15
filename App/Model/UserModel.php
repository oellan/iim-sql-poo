<?php
namespace App\Model;

use Core\Database;

class UserModel extends Database{

    public function getUsers()
    {
        return $this->query("SELECT * FROM users");
    }

    public function getUser($username)
    {
        return $this->prepare("SELECT * FROM users where username = ?", [
            $username
        ]);
    }

    public function addUser($username, $password, $email)
    {

        return $this->prepare("INSERT INTO users(username, password, email) VALUES(?,?,?)", [
            $username,
            $password,
            $email
        ]);
    }

    public function deleteUser($username)
    {
        if(!empty($this->getUser($username)))
        {
            return $this->prepare("DELETE FROM `users` WHERE username = ?", [
                $username,
            ]);
        }else return false;
    }
}