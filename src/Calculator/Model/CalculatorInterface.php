<?php

namespace Calculator\Model;

interface CalculatorInterface {

    public function calculate();

    protected function addError($error);

    public function getErrors();

    public function isValidInput();
}