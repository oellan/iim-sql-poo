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

    public function addUser($username, $password, $email, $first_name, $last_name)
    {
        $hashpass = password_hash($password, PASSWORD_BCRYPT);
        return $this->prepare("INSERT INTO users(username, password, email, first_name, last_name) VALUES(?,?,?,?,?)", [
            $username,
            $hashpass,
            $email,
            $first_name,
            $last_name
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