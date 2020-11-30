<?php

use App\Controller\HomeController;
use App\Controller\SecurityController;
use App\Controller\SondageController;
use App\Controller\FriendController;

if(array_key_exists("page", $_GET)){
    switch ($_GET["page"]) {
        case 'login':
            (new SecurityController())->renderLogin();
            break;
        case 'register':
            (new SecurityController())->renderRegister();
            break;
        case 'logout':
            (new SecurityController())->logout();
            break;
        case 'sondage':
            (new SondageController())->renderIndex();
            break;
        case 'friendssearch':
            (new FriendController())->renderIndex();
            break;
        default:
            # code...
            break;
    }
} else{
    $controller = new HomeController();
    $controller->renderIndex();
}