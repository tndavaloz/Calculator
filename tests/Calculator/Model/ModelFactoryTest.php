<?php
/**
 * Created by PhpStorm.
 * User: ndavaloz
 * Date: 7/14/15
 * Time: 2:53 PM
 */

namespace Calculator\Model;


class ModelFactoryTest extends \PHPUnit_Framework_TestCase {

    public function createMockRequest() {
        $mock = $this->getMockBuilder('Slim\Http\Request')
            ->disableOriginalConstructor()
            ->getMock();

        return $mock;
    }

    public function testModelFactory() {
        $request = $this->createMockRequest();

        $factory = new ModelFactory($request);

        $this->assertInstanceOf('Calculator\Model\ModelFactory', $factory);
    }

    public function testCreateAddModel() {
        $request = $this->createMockRequest();
        $factory = new ModelFactory($request);

        $this->assertInstanceOf('Calculator\Model\AddModel', $factory->createAddModel());
    }

    public function testCreateSubtractModel() {
        $request = $this->createMockRequest();
        $factory = new ModelFactory($request);

        $this->assertInstanceOf('Calculator\Model\SubtractModel', $factory->createSubtractModel());
    }

    public function testCreateDivideModel() {
        $request = $this->createMockRequest();
        $factory = new ModelFactory($request);

        $this->assertInstanceOf('Calculator\Model\DivideModel', $factory->createDivideModel());
    }

    public function testCreateMultiplyModel() {
        $request = $this->createMockRequest();
        $factory = new ModelFactory($request);

        $this->assertInstanceOf('Calculator\Model\MultiplyModel', $factory->createMultiplyModel());
    }

    /**
     * @depends testCreateAddModel
     * @depends testCreateSubtractModel
     * @depends testCreateMultiplyModel
     * @depends testCreateDivideModel
     * @dataProvider getProvider
     */
    public function testGetModel($op, $expected) {
        $request = $this->createMockRequest();

        $request->expects($this->at(0))
            ->method('post')
            ->with($this->equalTo('operator'))
            ->will($this->returnValue($op));

        $model = new ModelFactory($request);

        $this->assertInstanceOf($expected, $model->getModel());
    }

    /**
     * @dataProvider getFalseProvider
     */
    public function testGetModelFalse($op, $expected) {
        $request = $this->createMockRequest();
        $request->expects($this->at(0))
            ->method('post')
            ->with($this->equalTo('operator'))
            ->will($this->returnValue($op));
        $model = new ModelFactory($request);

        $this->assertEquals($expected, $model->getModel());
    }

    public function getProvider() {
        return [
            "addModel" => ['op' => 'add', 'expected' => 'Calculator\Model\AddModel'],
            "subtractModel" => ['op' => 'subtract', 'expected' => 'Calculator\Model\SubtractModel'],
            "divideModel" => ['op' => 'divide', 'expected' => 'Calculator\Model\DivideModel'],
            "multiplyModel" => ['op' => 'multiply', 'expected' => 'Calculator\Model\MultiplyModel'],
        ];
    }

    public function getFalseProvider() {
        return [
            "emptyOperator" => ['op' => '', 'expected' => false],
            "wrongOperator" => ['op' => 'raise', 'expected' => false]
        ];
    }
}
