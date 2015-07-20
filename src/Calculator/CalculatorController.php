<?php

namespace Calculator;

use Calculator\Model\ModelFactory;
use Calculator\Model\ModelErrorFactory;
use Calculator\View\CalculatorView;


class CalculatorController {

    public $model;
    public $view;
    private  $errorModel;


    public function __construct(ModelFactory $model, CalculatorView $view, ModelErrorFactory $errorModel) {
        $this->model = $model;
        $this->view = $view;
        $this->errorModel = $errorModel;
    }

    public function __invoke() {
        $view = $this->view;

        $lyt = function() use($view) {
            $view();
        };

        $model = $this->model->getModel();

        if (false != $model) {
            $view->setOutput($model->calculate(), $model->getOperation());
        }

        $lyt();
    }

}