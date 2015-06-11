<?php

namespace Calculator\View;

class CalculatorView {

    public $outputValue;

    public function __construct() {}

    public function getX() {
        return '<label for="xValue">X Value:</label>
        <input type="text" name="xInput" class="xValue" value="' . $this->setX() . '" required />';
    }

    public function getY() {
        return '<label for="yValue">Y Value:</label>
        <input type="text" name="yInput" class="yValue" value="' . $this->setY() . '"required/>';
    }

    public function getOperator() {
        $operators = array
        (
            'add' => 'Addition',
            'subtract' => 'Subtract',
            'multiply' => 'Multiply',
            'divide' => 'Divide'
        );
        $outputString = "";
        $format = '<input type="radio" name="operator" value="%s"%s>%s</input>';
        foreach ($operators as $op => $fullOp) {
            if (isset($_POST['operator'])) {
                if ($_POST['operator'] == $op) {
                    $outputString .= sprintf($format, $op, ' checked', $fullOp);
                    continue;
                }
            }
            $outputString .= sprintf($format, $op, '', $fullOp);
        }
        return $outputString;
    }

    public function submit() {
        return '<input type="submit" class="submit" value="Submit">';
    }

    public function setOutput($returnVal) {
        $this->outputValue = $returnVal;
    }

    public function output() {
        return $this->outputValue;
    }

    public function setX() {
        if (isset($_POST['xInput'])) {
            return $_POST['xInput'];
        }
    }

    public function setY() {
        if (isset($_POST['yInput'])) {
            return $_POST['yInput'];
        }
    }


}