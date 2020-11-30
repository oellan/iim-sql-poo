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


        if(!empty($_POST))
        {
            if(isset($_POST['search_submit'])) {
                if (!empty($_POST['user_key'])) {
                    $key = $_POST['user_key'];
                    $users = $this->model->getUsersWhere($key);
                    $friends = $this->model->getInfoUser($_SESSION['id'], 'friends');
                    $friends = explode("/", $friends);
                } else $msg = 'Merci de remplir tous les champs.';
            }

            if(isset($_POST['add_submit'])){
                $id = $_POST['user_id'];
                $friends_user = $this->model->getInfoUser($_SESSION['id'], 'friends');
                $username_friend = $this->model->getInfoUser($id, 'username');

                $new_friends = $friends_user."/".$username_friend;
                if(empty($friends_user)) $new_friends = $username_friend;

                $this->model->updateUser($_SESSION['id'], 'friends', $new_friends);

                $msg = $username_friend." ajouté à vos amis!";
            }

        }

        require $this->render("friendSearchView.php");
    }

}