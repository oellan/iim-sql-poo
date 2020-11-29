<?php

namespace App\Controller;

class LoginController extends AbstractController
{
    public function __construct()
    {
        parent::__construct(null);
    }

    public function renderIndex(){
        require $this->render("connexionView.php");
    }
}