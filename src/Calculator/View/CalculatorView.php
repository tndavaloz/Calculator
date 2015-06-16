<?php

namespace Calculator\View;

use Twig_Environment;

class CalculatorView {
    public $twig;
    public $outputValue;
    public $operator;
    public $operators = array
    (
    'add' => 'Addition',
    'subtract' => 'Subtract',
    'multiply' => 'Multiply',
    'divide' => 'Divide'
    );

    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke()
    {

        $output = $this->twig->loadTemplate('layout.twig');
        $output->display(['XY' => $this->getXY(),
            'operation' => $this->operators,
            'answer' => $this->getOutput()
        ]);

    }

    public function setOutput($returnVal, $operator)
    {
        $this->outputValue = $returnVal;
        $this->operator = $operator;
    }

    public function getOutput()
    {
        return $this->outputValue;
    }

    public function getXY()
    {
        return $_POST;
    }
}