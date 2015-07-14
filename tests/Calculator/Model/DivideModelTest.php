<?php

namespace Calculator\Model;

class DivideModelTest extends \PHPUnit_Framework_TestCase {

    public function createMockRequest() {
        $mock = $this->getMockBuilder('Slim\Http\Request')
            ->disableOriginalConstructor()
            ->getMock();

        return $mock;
    }

    public function testIsDivideModel() {
        $request = $this->createMockRequest();

        $divide = new DivideModel($request);

        $this->assertInstanceOf('Calculator\Model\DivideModel', $divide);
    }

    public function testGetOperation() {
        $request = $this->createMockRequest();

        $divide = new DivideModel($request);

        $this->assertEquals('divide', $divide->getOperation());
    }

    /**
     * @dataProvider isValidProvider
     */
    public function testIsValidInput($x, $y, $expected) {

        $request = $this->createMockRequest();

        $request->expects($this->at(0))
            ->method('post')
            ->with($this->equalTo('xInput'))
            ->will($this->returnValue($x));

        $request->expects($this->at(1))
            ->method('post')
            ->with($this->equalTo('yInput'))
            ->will($this->returnValue($y));

        $divide = new DivideModel($request);

        $this->assertEquals($expected, $divide->isValidInput());
    }

    public function isValidProvider() {
        return [
            "validInput" => ['x' => 12, 'y' => 4, 'expected' => true],
            "divideByZero" => ['x' => 43, 'y' => 0, 'expected' => false],
            "nonnumericalNumerator" => ['x' => 'r', 'y' => 4, 'expected' => false],
            "nonnumericalDenominator" => ['x' => 5, 'y' => 'ewas', 'expected' => false]
        ];
    }

    /**
     * @depends testIsValidInput
     * @dataProvider testCalculateProvider
     */
    public function testCalculate($x, $y, $expected) {
        $request = $this->createMockRequest();

        $request->expects($this->at(0))
            ->method('post')
            ->with($this->equalTo('xInput'))
            ->will($this->returnValue($x));

        $request->expects($this->at(1))
            ->method('post')
            ->with($this->equalTo('yInput'))
            ->will($this->returnValue($y));

        $divide = new DivideModel($request);

        $this->assertEquals($expected, $divide->calculate());
    }

    public function testCalculateProvider() {
        return [
            "validInput" => ['x' => 35, 'y' => 5, 'expected' => 7],
            "validNumerator0" => ['x' => 0, 'y' => 45, 'expected' => 0],
            "invalidDenominator0" => ['x' => 45, 'y' => 0, 'expected' => false],
            "invalidNonnumerical" => ['x' => 'R', 'y' => 'a', 'expected' => false]
        ];
    }
}
