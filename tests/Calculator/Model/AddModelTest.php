<?php

namespace Calculator\Model;

class AddModelTest extends \PHPUnit_Framework_TestCase {

    public function createMockRequest() {
        $mock = $this->getMockBuilder('Slim\Http\Request')
                ->disableOriginalConstructor()
                ->getMock();

        return $mock;
    }

    public function testIsAddModel() {
        $request = $this->createMockRequest();

        $add = new AddModel($request);

        $this->assertInstanceOf('Calculator\Model\AddModel', $add);
    }

    public function testGetOperation() {
        $request = $this->createMockRequest();

        $add = new AddModel($request);

        $this->assertEquals('add', $add->getOperation());
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

        $add = new AddModel($request);

        $this->assertEquals($expected, $add->isValidInput());
    }

    public function isValidProvider() {
        return [
            "validInput" => ['x' => 7, 'y' => 3, 'expected' => true],
            "invalidXYInput"=> ['x' => 'd', 'y' => 'r', 'expected' => false],
            "invalidXInput" => ['x' => 'h', 'y' => 5, 'expected' => false],
            "invalidYInput" => ['x' => 4, 'y' => 'n', 'expected' => false]
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

        $add = new AddModel($request);

        $this->assertEquals($expected, $add->calculate());
    }

    public function testCalculateProvider() {
        return [
            "validInput" => ['x' => 5, 'y' => 4, 'expected' => 9],
            "validInput2" => ['x' => 31, 'y' => 12, 'expected' => 43],
            "invalidXInput" => ['x' => 'x', 'y' => 5, 'expected' => false],
            "invalidYInput" => ['x' => 10, 'y' => 're', 'expected' => false],
            "invalidXYInput" => ['x' => 'vs', 'y' => 're', 'expected' => false]
        ];
    }
}