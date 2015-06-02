<?php

class MultiplyModel implements CalculatorInterface {
    public function calculate($x, $y) {
        return $x * $y;
    }
}