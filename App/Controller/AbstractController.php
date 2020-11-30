<?php
namespace App\Controller;

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
        $this->addRoutes([
            "home" => "",
            "register" => "?page=register",
            "login" => "?page=login",
        ]);
    }

}