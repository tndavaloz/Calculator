<?php

namespace Calculator\Model;

use Slim\Http\Request;

class MultiplyModel implements CalculatorInterface {

    /**
     * @var string
     */
    const OPERATOR = 'multiply';

    private $x;
    private $y;

    public function __construct(Request $request)
    {
        $this->x = $request->post('xInput');
        $this->y = $request->post('yInput');

        $this->isValidInput();
    }

    public function calculate()
    {
        if ($this->isValidInput()) {
            return $this->x * $this->y;
        }
        return false;
    }

    public function getOperation() {
        return self::OPERATOR;
    }

    public function isValidInput()
    {
        if (!is_numeric($this->x) || !is_numeric($this->y)) {
            // throw an error instead of return false
            return false;
        } else {
            return true;
        }
    }
}