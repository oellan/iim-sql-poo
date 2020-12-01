<?php

namespace App\Controller;

class sondageResultController extends AbstractController
{

    /**
     * sondageResultController constructor.
     */
    public function __construct()
    {
        parent::__construct(null);
    }

    public function renderIndex(){
        require $this->render("sondageResultView.php");
    }
}