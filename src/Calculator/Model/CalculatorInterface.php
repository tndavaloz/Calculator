<?php

namespace Calculator\Model;

interface CalculatorInterface {

    public function calculate();

    public function getOperation();

    public function isValidInput();
}