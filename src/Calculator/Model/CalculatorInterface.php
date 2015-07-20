<?php

namespace Calculator\Model;

interface CalculatorInterface {

    const ALPHABET_ERROR_MESSAGE = 'INVALID ENTRY; ONLY NUMERICAL AND HEX VALUES ALLOWED';

    public function calculate();

    public function getOperation();

    public function isValidInput();
}