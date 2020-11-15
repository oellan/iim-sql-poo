<?php
namespace App\Controller;

class AbstractController {

    function render($view) {
        return ROOT . "/App/View/" . $view;
    }

    public function __construct($model)
    {
        $this->model = $model;
    }

}