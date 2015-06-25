<?php

namespace Calculator;

use Calculator\Model\ModelFactory;
use Calculator\View\CalculatorView;
use Slim\Http\Request;



class CalculatorController {

    public $model;
    public $view;


    public function __construct(ModelFactory $model, CalculatorView $view) {
        $this->model = $model;
        $this->view = $view;

    }

    public function __invoke() {
        $view = $this->view;

        $lyt = function() use($view) {
            $view();
        };

        $model = $this->model->getModel();

        if ($model != false) {
            $view->setOutput($model->calculate(), $model->getOperation());
        }

        $lyt();
    }

}