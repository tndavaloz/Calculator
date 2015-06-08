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
    public $operation;
    public $inputValues;

    public function getX($x) {
        $this->xVal = $x;
    }

    public function getY($y) {
        $this->yVal = $y;
    }

    public function getOp($op) {
        $this->operation = $op;
    }

    public function isOperationSet() {
        if ($this->operationModel != null) {
            return true;
        }
        return false;
    }

    public function validateValues() {
        if (!is_numeric($this->xVal) || !is_numeric($this->yVal)) {
            return false;
        }
        return true;
    }

    public function set(array $viewInput) {
        $this->inputValues = $viewInput;
    }

    public function inputCheck() {
        if ($this->inputValues['X'] == NULL) {
            return false;
        }
        return true;
    }

    public function assignModel($x, $y, $operator) {
        if (!isset($x) || !isset($y) || !isset($operator)) {
            return null;
        }
        $this->xVal = $x;
        $this->yVal = $y;
        $this->operationModel = null;
        if (!$this->validateValues()) {
            // return something to let user know of an invalid entry
            return 'Invalid entry. Please try again.';
        }
        if ($operator == 'divide') {
            if ($this->yVal == 0) {
                // return something to let user know of an invalid entry
                return 'Cannot divide by 0. Enter a valid denominator or choose a different operation.';
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
                return 'Please select an operator.';
        }
        return 1;
    }


    public function performCalculation($yesOrNo) {
        if ($yesOrNo != 1) {
            return $yesOrNo;
        }
        if ($this->isOperationSet()) {
            return $this->operationModel->calculate($this->xVal, $this->yVal);
        } else {
            return $yesOrNo;
        }
    }

}