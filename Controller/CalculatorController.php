<?php
require_once(__DIR__ . '/../View/CalculatorView.php');
require_once(__DIR__ . '/../Model/CalculatorModel.php');



class CalculatorController {

    public $model;
    public $view;
    public $route;
    public $inputValues;
    public $output;


    public function __construct(CalculatorModel $model, CalculatorView $view, Slim\Http\Request $router) {
        $this->model = $model;
        $this->view = $view;
        $this->route = $router;
    }

    public function __invoke() {
        $view = $this->view;
        $lyt = function() use($view) {
            require_once(__DIR__ . '/../View/Templates/layout.php');
        };

        $modelOutput = $this->model->assignModel(
            $this->route->post("xInput"),
            $this->route->post("yInput"),
            $this->route->post("operator")
        );

        $view->setOutput($this->model->performCalculation($modelOutput));

        $lyt();
    }

}