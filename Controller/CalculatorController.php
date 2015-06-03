<?php
require_once(__DIR__ . '/../View/CalculatorView.php');
require_once(__DIR__ . '/../Model/CalculatorModel.php');



class CalculatorController {
    public $model;
    public $view;


    public function __construct(CalculatorModel $model, CalculatorView $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function __invoke() {
        $inputValues = $this->view->retrieveUserInput();
        if (!$this->model->addModelInput($inputValues[0], $inputValues[1], $inputValues[2])) {
            // this is where I need to send an error message to the view
        }
        // no error found with input
        $this->view->receiveOutputData($this->model->performCalculation());
    }

}