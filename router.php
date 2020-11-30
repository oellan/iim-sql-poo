<?php

use App\Controller\HomeController;
use App\Controller\SecurityController;

if(array_key_exists("page", $_GET)){
    switch ($_GET["page"]) {
        case 'login':
            (new SecurityController())->renderLogin();
            break;
        case 'register':
            (new SecurityController())->renderRegister();
            break;
        default:
            # code...
            break;
    }
} else{
    $controller = new HomeController();
    $controller->renderIndex();
}