<?php
namespace App\Model;

use Core\Database;

class UserModel extends Database{

    public function getUsers()
    {
        return $this->query("SELECT * FROM users");
    }

    public function getUserBy($type, $value)
    {
        return $this->prepare("SELECT * FROM users where $type = ?", [
            $value
        ]);
    }

    public function addUser($username, $email, $password)
    {
        $hashpass = password_hash($password, PASSWORD_BCRYPT);
        return $this->prepare("INSERT INTO users(username, email, password) VALUES(?,?,?)", [
            $username,
            $email,
            $hashpass,
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