<?php

namespace Calculator\Model;

use Slim\Http\Request;

class DivideModel implements CalculatorInterface {

    const UNDEFINED_ERROR_MESSAGE = 'DIVIDING BY ZERO (0) IS UNDEFINED';
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
        $this->isValidInput();

        if (NULL == $this->getErrors()) {
            return $this->x / $this->y;
        }
        return $this->getErrors();
    }

    private function addError($error)
    {
        $this->error = $error;
    }

    public function getErrors()
    {
        return $this->error;
    }

    public function isValidInput()
    {
        if (!is_numeric($this->x) || !is_numeric($this->y)) {
            $this->addError(self::ALPHABET_ERROR_MESSAGE);
        } else if (0 === $this->y) {
            $this->addError(self::UNDEFINED_ERROR_MESSAGE);
        } else {
            $this->addError(NULL);
        }
    }
}