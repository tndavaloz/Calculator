<?php

class CalculatorModel {
    public $operationModel;
    public $xVal;
    public $yVal;

    public function validateValues() {
        if (!is_numeric($this->xVal) || !is_numeric($this->yVal)) {
            return false;
        }
        return true;
    }

    public function assignModel($x, $y, $operator){
        $this->xVal = $x;
        $this->yVal = $y;

        if (!$this->validateValues()) {
            // return something to let user know of an invalid entry
            return;
        }
        if ($operator == 'divide') {
            if ($this->yVal == 0) {
                // return something to let user know of an invalid entry
                return;
            }
        }
        switch($operator) {
            case 'divide':
                $this->operationModel = new DivideModel;
                break;
            case 'muliply':
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
    }


}