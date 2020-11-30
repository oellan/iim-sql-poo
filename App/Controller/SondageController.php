<?php


namespace App\Controller;

class SondageController extends AbstractController
{

    /**
     * SondageController constructor.
     */
    public function __construct()
    {
        parent::__construct(null);
    }

    public function renderIndex(){
        require $this->render("sondageView.php");
    }
}