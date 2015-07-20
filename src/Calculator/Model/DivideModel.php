<?php

namespace Calculator\Model;

use Slim\Http\Request;

class DivideModel implements CalculatorInterface {

    use ErrorTrait;

    const UNDEFINED_ERROR_MESSAGE = 'DIVIDING BY ZERO (0) IS UNDEFINED';

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
        return $this->getError();
    }

    public function getOperation() {
        return self::OPERATOR;
    }

    public function isValidInput()
    {
        if (!is_numeric($this->x) || !is_numeric($this->y)) {
            $this->setError(DivideModel::ALPHABET_ERROR_MESSAGE);
            return false;
        } else if (0 == $this->y) {
            $this->setError(self::UNDEFINED_ERROR_MESSAGE);
            return false;
        }
        return true;

    }
}