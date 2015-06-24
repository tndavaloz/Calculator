<?php

namespace Calculator\Model;

use Slim\Http\Request;

include_once('CalculatorInterface.php');

class AddModel implements CalculatorInterface {
    private $x;
    private $y;

    public function __construct(Request $request) {
        $this->x = $request->post('xInput');
        $this->y = $request->post('yInput');
    }

    public function calculate() {
        return $this->x + $this->y;
    }
}