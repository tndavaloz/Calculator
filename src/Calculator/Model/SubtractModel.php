<?php

namespace Calculator\Model;

include_once('CalculatorInterface.php');

class SubtractModel implements CalculatorInterface {
    public function calculate($x, $y) {
        return $x - $y;
    }
}