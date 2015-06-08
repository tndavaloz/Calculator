
<?php

class CalculatorView {
    public $xVal;
    public $yVal;
    public $operator;
    public $outputValue;

    public function __construct() {}

    public function getX() {
        echo '<label for="X Value">X Value:</label>
        <input type="text" name=' . $this->xVal . '"xValue" id="X Value" required/>';
    }

    public function getY() {
        echo '<label for="Y Value">Y Value:</label>
        <input type="text" name=' . $this->yVal . '"yValue" id="Y Value" required/>';
    }

    public function getOperator() {
        echo '<input type="radio" name=' . $this->operator . 'value="add">Addition';
        echo '<input type="radio" name=' . $this->operator . 'value="subtract">Subtract';
        echo '<input type="radio" name=' . $this->operator . 'value="multiply">Multiply';
        echo '<input type="radio" name=' . $this->operator . 'value="divide">Divide';
    }

    public function submit() {
        echo '<input type="submit" name="submit" value="Submit">';
    }

    public function output() {

        echo $this->outputValue;
    }

//    public function setView() {
//        require_once(__DIR__ . '/Templates/layout.php');
//    }

}