<?php
namespace App\Controller;

use App\Model\UserModel;

class HomeController extends AbstractController {

    public function __construct()
    {
        parent::__construct(new UserModel());
    }

    public function renderIndex(){
        require $this->render("homeView.php");
    }

}