<?php

namespace Calculator\View;

class CalculatorViewTest extends \PHPUnit_Framework_TestCase {

    public function createMockTwig()
    {
        $twig = $this->getMockBuilder('Twig_Environment')
            ->disableOriginalConstructor()
            ->getMock();
        return $twig;
    }

    public function testGetXY()
    {
        $twig = $this->createMockTwig();

        $calculatorView = new CalculatorView($twig);

        $this->assertEquals($_POST, $calculatorView->getXY());
    }

    public function testGetOutput()
    {
        $twig = $this->createMockTwig();

        $calculatorView = new CalculatorView($twig);

        $output = null;

        $this->assertEquals($output, $calculatorView->getOutput());
    }

    public function testSetOutputOutputValue()
    {
        $twig = $this->createMockTwig();

        $calculatorView = new CalculatorView($twig);

        $calculatorView->setOutput('foo', 'bar');

        $this->assertEquals('foo', $calculatorView->outputValue);
    }
    public function testSetOutputOperator()
    {
        $twig = $this->createMockTwig();

        $calculatorView = new CalculatorView($twig);

        $calculatorView->setOutput('foo', 'bar');

        $this->assertEquals('bar', $calculatorView->operator);
    }
}