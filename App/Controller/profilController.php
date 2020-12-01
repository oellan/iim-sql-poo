<?php


namespace App\Controller;


class profilController extends AbstractController
{

    /**
     * profilController constructor.
     */
    public function __construct()
    {
        parent::__construct(null);
    }

    public function renderIndex(){
        require $this->render("profilView.php");
    }
}