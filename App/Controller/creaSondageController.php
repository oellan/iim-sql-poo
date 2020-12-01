<?php

namespace App\Controller;


class creaSondageController extends AbstractController
{

    /**
     * creaSondageController constructor.
     */
    public function __construct()
    {
        parent::__construct(null);
    }

    public function renderIndex(){
        require $this->render("creaSondageView.php");
    }
}