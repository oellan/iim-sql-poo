<?php

use App\Controller\AbstractController;
use App\Controller\HomeController;
use App\Controller\SecurityController;
use App\Controller\SondageController;
use App\Controller\FriendController;
use App\Model\UserModel;

// PAGES
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
            (new AbstractController(null))->redirectToRoute('home');
            break;
    }

// FUNCTIONS
} else if(array_key_exists("function", $_GET)){
    switch ($_GET["function"]) {
        default:
            break;
    }

} else {
    $controller = new HomeController();
    $controller->renderIndex();
}
