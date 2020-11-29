<?php

use App\Controller\HomeController;
use App\Controller\LoginController;
use App\Controller\RegisterController;

if(array_key_exists("page", $_GET)){
    switch ($_GET["page"]) {
        case 'login':
            (new LoginController())->renderIndex();
            break;
        case 'register':
            (new RegisterController())->renderIndex();
            break;
        default:
            # code...
            break;
    }
} else{
    $controller = new HomeController();
    $controller->renderIndex();
}