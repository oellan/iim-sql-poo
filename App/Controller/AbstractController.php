<?php
namespace App\Controller;

use Core\security\auth;

class AbstractController {

    private $routes = [];

    function addRoutes($routes) {
        foreach($routes as $key => $value)
        {
            $this->routes[$key] = $value;
        }
    }

    function getRoutes()
    {
        return $this->routes;
    }

    function redirectToRoute($name) {
        $route = current($this->routes);
        if(!empty($this->routes[$name])) $route = $this->routes[$name];
        Header('Location:'.URI.$route);
    }

    function render($view) {
        return ROOT . "/App/View/" . $view;
    }

    public function __construct($model)
    {
        $this->model = $model;
        $this->auth = new Auth($model);
        $this->addRoutes([
            "home" => "",
            "register" => "?page=register",
            "login" => "?page=login",
            "friendssearch" => "?page=friendssearch"
        ]);
    }

}