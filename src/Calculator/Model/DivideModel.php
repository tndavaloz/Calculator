<?php

namespace Calculator\Model;

include_once('CalculatorInterface.php');

class DivideModel implements CalculatorInterface {
    public function calculate($x, $y) {
        return $x / $y;
    }
}