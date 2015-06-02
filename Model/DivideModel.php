<?php

class DivideModel implements CalculatorInterface {
    public function calculate($x, $y) {
        return $x / $y;
    }
}