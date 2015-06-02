<?php
include_once('CalculatorInterface.php');

class AddModel implements CalculatorInterface {
    public function calculate($x, $y) {
        return $x + $y;
    }
}