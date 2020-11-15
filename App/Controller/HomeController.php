<?php
namespace App\Controller;

use App\Model\SondageModel;

class HomeController extends AbstractController {

    public function __construct()
    {
        parent::__construct(new SondageModel());
    }

    public function renderIndex(){
        require $this->render("homeView.php");
    }

}