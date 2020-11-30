<?php
namespace App\Controller;

use App\Model\UserModel;

class FriendController extends AbstractController {

    public function __construct()
    {
        parent::__construct(new UserModel());
    }

    public function renderIndex(){

        if(!$this->auth->islogged()) $this->redirectToRoute('login');

        $msg = null;
        $users = [];
        $friends = $this->model->getFriends($_SESSION['id']);

        if(!empty($_POST))
        {
            // SEARH
            if(isset($_POST['search_submit'])) {
                if (!empty($_POST['user_key'])) {
                    $key = $_POST['user_key'];
                    $users = $this->model->getUsersWhere($key);
                } else $msg = 'Merci de remplir tous les champs.';
            }

            // ADD
            if(isset($_POST['add_submit'])){
                $id_friend = $_POST['user_id'];
                $friends_user = $this->model->getInfoUser($_SESSION['id'], 'friends');

                if(in_array($id_friend, $friends)){
                    $msg = "Déjà dans votre liste.";
                } else {

                    $new_friends = $friends_user . "/" . $id_friend;
                    if (empty($friends_user)) $new_friends = $id_friend;

                    $this->model->updateUser($_SESSION['id'], 'friends', $new_friends);

                    $msg =  $this->model->getInfoUser($id_friend, 'username') . " ajouté à vos amis!";
                }
            }

            //DELETE
            if(isset($_POST['delete_submit'])){
                $id_friend = $_POST['user_id'];
                $friends_user = $this->model->getInfoUser($_SESSION['id'], 'friends');

                if(in_array($id_friend, $friends)){

                    $new_friends = "";
                    for($i = 0; $i<sizeof($friends); $i++) {
                        if($friends[$i] === $id_friend) continue;
                        if(empty($new_friends)) $new_friends .= $friends[$i];
                        else $new_friends .= "/".$friends[$i];
                    }

                    $this->model->updateUser($_SESSION['id'], 'friends', $new_friends);

                    $msg =  $this->model->getInfoUser($id_friend, 'username') . " supprimé de vos amis!";
                } else {
                    $msg = "Pas dans votre liste.";
                }
            }
        }

        $friends = $this->model->getFriends($_SESSION['id']);

        require $this->render("friendView.php");
    }

}