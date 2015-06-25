<?php

namespace Calculator\Model;

interface CalculatorInterface {

    public function calculate();

    public function getErrors();

    public function isValidInput();
}