<?php

namespace Calculator\Model;

include_once('CalculatorInterface.php');

class MultiplyModel implements CalculatorInterface {
    public function calculate($x, $y) {
        return $x * $y;
    }
}