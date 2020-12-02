<?php
namespace App\Model;

use Core\Database;

class UserModel extends Database{

    public function getUsersWhere($value)
    {
        return $this->prepare("SELECT * FROM users WHERE username LIKE ? COLLATE utf8mb4_unicode_ci", [
            "%".$value."%"
        ]);
    }

    public function getUsers()
    {
        return $this->query("SELECT * FROM users");
    }

    public function getUserBy($type, $value)
    {
        return $this->prepare("SELECT * FROM users where $type = ?", [
            $value
        ], true);
    }

    public function getInfoUser($id, $type)
    {
        $value = $this->prepare("SELECT $type FROM users WHERE id = ?", [
            $id,
        ], true);

        return $value[$type];
    }

    public function addUser($username, $email, $password)
    {
        $hashpass = password_hash($password, PASSWORD_BCRYPT);
        return $this->prepare("INSERT INTO users(username, email, password, friends) VALUES(?,?,?,?)", [
            $username,
            $email,
            $hashpass,
            ''
        ]);
    }

    public function updateUser($id, $type, $value)
    {
        if($type === "password") $value = password_hash($value, PASSWORD_BCRYPT);
        return $this->prepare("UPDATE users SET $type = ? WHERE id = ?", [
            $value,
            $id,
        ]);
    }

    public function deleteUserBy($type, $value)
    {
        if(!empty($this->getUserBy($type, $value)))
        {
            return $this->prepare("DELETE FROM `users` WHERE $type = ?", [
                $value,
            ]);
        }else return false;
    }


    // FRIENDS
    public function friendMethods($type, $params, $reverse = true)
    {
        $msg = null;
        $friends = $this->getFriends($params['id']);
        switch ($type) {
            case 'add':

                $friends_user = $this->getInfoUser($params['id'], 'friends');

                if (in_array($params['id_friend'], $friends)) {
                    $msg = "Déjà dans votre liste.";
                } else {

                    $new_friends = $friends_user . "/" . $params['id_friend'];
                    if (empty($friends_user)) $new_friends = $params['id_friend'];

                    $this->updateUser($params['id'], 'friends', $new_friends);

                    $msg = $this->getInfoUser($params['id_friend'], 'username') . " ajouté à vos amis!";
                }

                break;
            case 'delete':

                $friends_user = $this->getInfoUser($params['id'], 'friends');

                if (in_array($params['id_friend'], $friends)) {


                    $new_friends = "";
                    for ($i = 0; $i < sizeof($friends); $i++) {
                        if ((int)$friends[$i] === (int)$params['id_friend']) continue;
                        if (empty($new_friends)) $new_friends .= $friends[$i];
                        else $new_friends .= "/" . $friends[$i];
                    }


                    $this->updateUser($params['id'], 'friends', $new_friends);

                    $msg = $this->getInfoUser($params['id_friend'], 'username') . " supprimé de vos amis!";
                } else {
                    $msg = "Pas dans votre liste.";
                }

                break;
        }

        // MAKE FUNCTION TO FRIEND
        if ($reverse){
            $this->friendMethods($type, [
                'id' => $params['id_friend'],
                'id_friend' => $params['id']
            ], false);
        }

        return $msg;
    }


    public function getFriends($id){
        $friends = $this->getInfoUser($id, 'friends');
        if(empty($friends)) $friends = [];
        else $friends = explode("/", $friends);

        return $friends;
    }

    public function getLastSeen(int $id): DateTime
    {
        $data = $this->prepare(
            'SELECT `heartbeat` FROM `users` WHERE `id`=?',
            [$id],
            true
        );
        return DateTime::createFromFormat('Y-m-d H:i:s', $data['heartbeat']);
    }

    public function setLastSeen(int $id, DateTime $timestamp)
    {
        $this->prepare(
            'UPDATE `users` SET `heartbeat` = ? WHERE `id` = ?', [
                $id,
                $timestamp->format('Y-m-d H:i:s'),
            ]
        );
    }
}