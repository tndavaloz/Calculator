<?php

namespace Calculator\Model;

use Slim\Http\Request;

class DivideModel implements CalculatorInterface {

    /**
     * @var string
     */
    const OPERATOR = 'divide';

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
            return $this->x / $this->y;
        }
        return false;
    }

    public function getOperation() {
        return self::OPERATOR;
    }

    public function isValidInput()
    {
        if (!is_numeric($this->x) || !is_numeric($this->y)) {
            return false;
        } else if (0 == $this->y) {
            return false;
        }
        return true;

    }
}