<?php

namespace Calculator\View;

use Twig_Environment;

class CalculatorView {
    public $twig;
    public $outputValue;

    public function __construct(Twig_Environment $twig) {
        $this->twig = $twig;
    }

    public function __invoke() {

//        $this->twig->
//        $that = $this;
//        $getX = new \Twig_SimpleFilter('getX',function () use($that) {
//            $that->getX();
//        });
//        $this->twig->addFilter($getX);
//
//        $getY = new \Twig_SimpleFilter('getY', function () use($that) {
//            $that->getY();
//        });
//        $this->twig->addFilter($getY);
//
//        $operator = new \Twig_SimpleFunction('getOperator', function () use($that) {
//            $that->getOperator();
//        });
//        $this->twig->addFunction($operator);
//
//        $output = new \Twig_SimpleFunction('output', function() use($that) {
//            $that->output();
//        });
//        $this->twig->addFunction($output);
        $blah = $this->twig->loadTemplate('layout.twig');
        $blah->display(['getX' => $this->getX()]);
//        var_dump($blah->getEnvironment());

//        echo $this->twig->render('layout.twig');
    }

    public function getOperator() {
        $operators = array
        (
            'add' => 'Addition',
            'subtract' => 'Subtract',
            'multiply' => 'Multiply',
            'divide' => 'Divide'
        );
        $outputString = "";
        $format = '<input type="radio" name="operator" value="%s"%s>%s</input>';
        foreach ($operators as $op => $fullOp) {
            if (isset($_POST['operator'])) {
                if ($_POST['operator'] == $op) {
                    $outputString .= sprintf($format, $op, ' checked', $fullOp);
                    continue;
                }
            }
            $outputString .= sprintf($format, $op, '', $fullOp);
        }
        return $outputString;
    }

    public function setOutput($returnVal) {
        $this->outputValue = $returnVal;
    }

    public function output() {
        return $this->outputValue;
    }

    public function getX() {
        return $_POST;
    }

    public function getY() {
        if (isset($_POST['yInput'])) {
            return $_POST['yInput'];
        }
        return '';
    }
}