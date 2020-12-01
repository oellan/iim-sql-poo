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
            // SEARH
            if(isset($_POST['search_submit'])) {
                if (!empty($_POST['user_key'])) {
                    $key = $_POST['user_key'];
                    $users = $this->model->getUsersWhere($key);
                } else $msg = 'Merci de remplir tous les champs.';
            }

            // ADD
            if(isset($_POST['add_submit'])){
                $msg = $this->model->friendMethods('add', [
                    'id' => $_SESSION['id'],
                    'id_friend' => $_POST['user_id'],
                ]);
            }

            //DELETE
            if(isset($_POST['delete_submit'])){
                $msg = $this->model->friendMethods('delete', [
                    'id' => $_SESSION['id'],
                    'id_friend' => $_POST['user_id'],
                ]);
            }
        }

        $friends = $this->model->getFriends($_SESSION['id']);

        require $this->render("friendView.php");
    }

}