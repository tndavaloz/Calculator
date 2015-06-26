<?php

namespace Calculator\Model;

use Slim\Http\Request;

class SubtractModel implements CalculatorInterface {

    const ALPHABET_ERROR_MESSAGE = 'INVALID ENTRY; ONLY NUMERICAL AND HEX VALUES ALLOWED';
    private $x;
    private $y;
    private $error;

    public function __construct(Request $request)
    {
        $this->x = $request->post('xInput');
        $this->y = $request->post('yInput');

        $this->isValidInput();
    }

    public function calculate()
    {
        if ($this->isValidInput()) {
            return $this->x - $this->y;
        }
        return $this->getError();
    }

    public function setError($error)
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getOperation() {
        return 'subtract';
    }

    public function isValidInput()
    {
        if (!is_numeric($this->x) || !is_numeric($this->y)) {
            $this->setError(self::ALPHABET_ERROR_MESSAGE);
            return false;
        } else {
            return true;
        }
    }
}