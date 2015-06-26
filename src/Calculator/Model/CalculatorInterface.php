<?php

namespace Calculator\Model;

interface CalculatorInterface {

    public function calculate();

    public function setError($error);

    public function getError();

    public function getOperation();

    public function isValidInput();
}