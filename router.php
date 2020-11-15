<?php

use App\Controller\HomeController;

if(array_key_exists("page", $_GET)){
    switch ($_GET["page"]) {
        case '':
            break;
        default:
            # code...
            break;
    }
} else{
    $controller = new HomeController();
    $controller->renderIndex();
}