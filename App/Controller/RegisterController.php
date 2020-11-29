<?php


namespace App\Controller;

class RegisterController extends AbstractController
{

    public function __construct()
    {
        parent::__construct(null);
    }

    public function renderIndex(){
        require $this->render("inscriptionView.php");
    }
}