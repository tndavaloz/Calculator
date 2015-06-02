<?php
/**
 * Created by PhpStorm.
 * User: ndavaloz
 * Date: 6/2/15
 * Time: 11:20 AM
 */

require_once(__DIR__ . '/../Model/CalculatorModel.php');


class CalculatorModelTest extends PHPUnit_Framework_TestCase {

    public function testAssignModelAdd() {
        $operation = 'add';
        $xValue = 1;
        $yValue = 1;

        $calculatorTest = new CalculatorModel;
        $calculatorTest->assignModel($xValue, $yValue, $operation);

        $this->assertInstanceOf('AddModel', $calculatorTest->operationModel);
    }

    public function testAssignModelDivide() {
        $operation = 'divide';
        $xValue = 1;
        $yValue = 1;

        $calculatorTest = new CalculatorModel;
        $calculatorTest->assignModel($xValue, $yValue, $operation);

        $this->assertInstanceOf('DivideModel', $calculatorTest->operationModel);
    }

    public function testAssignModelMultiply() {
        $operation = 'multiply';
        $xValue = 1;
        $yValue = 1;

        $calculatorTest = new CalculatorModel;
        $calculatorTest->assignModel($xValue, $yValue, $operation);

        $this->assertInstanceOf('MultiplyModel', $calculatorTest->operationModel);
    }

    public function testAssignModelSubtract() {
        $operation = 'subtract';
        $xValue = 1;
        $yValue = 1;

        $calculatorTest = new CalculatorModel;
        $calculatorTest->assignModel($xValue, $yValue, $operation);

        $this->assertInstanceOf('SubtractModel', $calculatorTest->operationModel);
    }

    public function testAssignModelDivideByZero() {
        $operation = 'divide';
        $xValue = 1;
        $yValue = 0;

        $calculatorTest = new CalculatorModel;

        $this->assertEquals(null, $calculatorTest->assignModel($xValue, $yValue, $operation));

    }

    public function testAssignModelFailValidation() {
        $operation = 'divide';
        $xValue = 'r';
        $yValue = 0;

        $calculatorTest = new CalculatorModel;

        $this->assertEquals(null, $calculatorTest->assignModel($xValue, $yValue, $operation));

    }

    public function testValidateValues() {
        $calculatorTest = new CalculatorModel;
        $calculatorTest->xVal = 1;
        $calculatorTest->yVal = 1;

        $this->assertEquals(true, $calculatorTest->validateValues());
    }

    public function testValidateValuesFailLetters() {
        $calculatorTest = new CalculatorModel;
        $calculatorTest->xVal = 'a';
        $calculatorTest->yVal = 'r';

        $this->assertEquals(false, $calculatorTest->validateValues());
    }

    public function testValidateValuesMixed() {
        $calculatorTest = new CalculatorModel;
        $calculatorTest->xVal = 0xA;
        $calculatorTest->yVal = 1.3;

        $this->assertEquals(true, $calculatorTest->validateValues());
    }
}
