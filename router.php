<?php

// PAGES
use App\Controller\AbstractController;
use App\Controller\creaSondageController;
use App\Controller\FriendController;
use App\Controller\HomeController;
use App\Controller\SecurityController;
use App\Controller\SondageController;
use App\Controller\sondageResultController;

if(array_key_exists("page", $_GET)){
    switch ($_GET["page"]) {

        case 'home':
            (new HomeController())->renderIndex();
            break;
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
        case 'sondageResult':
            (new sondageResultController())->renderIndex();
            break;
        case 'profil':
            (new HomeController())->renderProfile();
            break;
        case 'creaSondage':
            (new creaSondageController())->renderIndex();
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
