<?php

include_once('AddModel.php');
include_once('DivideModel.php');
include_once('SubtractModel.php');
include_once('MultiplyModel.php');

class CalculatorModel {
    /** @var  CalculatorInterface */
    public $operationModel;
    public $xVal;
    public $yVal;

    public function validateValues() {
        if (!is_numeric($this->xVal) || !is_numeric($this->yVal)) {
            return false;
        }
        return true;
    }

    public function addModelInput($x, $y, $operator) {
        $this->xVal = $x;
        $this->yVal = $y;
        $this->operationModel = null;

        if (!$this->validateValues()) {
            // return something to let user know of an invalid entry
            return 0;
        }
        if ($operator == 'divide') {
            if ($this->yVal == 0) {
                // return something to let user know of an invalid entry
                return 0;
            }
        }
        switch($operator) {
            case 'divide':
                $this->operationModel = new DivideModel;
                break;
            case 'multiply':
                $this->operationModel = new MultiplyModel;
                break;
            case 'subtract':
                $this->operationModel = new SubtractModel;
                break;
            case 'add':
                $this->operationModel = new AddModel;
                break;
            default:
                break;
        }
        return 1;
    }

    public function performCalculation() {
        return $this->operationModel->calculate($this->xVal, $this->yVal);
    }

}