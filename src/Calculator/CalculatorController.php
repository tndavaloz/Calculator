<?php

namespace Calculator;

use Calculator\Model\CalculatorModel;
use Calculator\View\CalculatorView;
use Slim\Http\Request;



class CalculatorController {

    public $model;
    public $view;
    public $route;


    public function __construct(CalculatorModel $model, CalculatorView $view, Request $router) {
        $this->model = $model;
        $this->view = $view;
        $this->route = $router;

    }

    public function __invoke() {
        $view = $this->view;

        $lyt = function() use($view) {
            $view();
        };

        $modelOutput = $this->model->assignModel(
            $this->route->post("xInput"),
            $this->route->post("yInput"),
            $this->route->post("operator")
        );

        $view->setOutput($this->model->performCalculation($modelOutput), $this->route->post("operator"));

        $lyt();
    }

}