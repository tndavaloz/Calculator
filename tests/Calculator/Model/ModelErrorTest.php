<?php
/**
 * Created by PhpStorm.
 * User: ndavaloz
 * Date: 7/15/15
 * Time: 10:39 AM
 */

namespace Calculator\Model;

class ModelErrorTest extends \PHPUnit_Framework_TestCase {
    public function createMockRequest() {
        $mock = $this->getMockBuilder('Slim\Http\Request')
            ->disableOriginalConstructor()
            ->getMock();

        return $mock;
    }

    public function testModelError() {
        $request = $this->createMockRequest();
        $model = new ModelError($request);

        $this->assertInstanceOf('Calculator\Model\ModelError', $model);
    }

    /**
     * @dataProvider errorProvider
     */
    public function testGetErrorMessage($op, $y, $expected){

        $request = $this->createMockRequest();

        $request->expects($this->at(0))
            ->method('post')
            ->with($this->equalTo('operator'))
            ->will($this->returnValue($op));

        $request->expects($this->at(1))
            ->method('post')
            ->with($this->equalTo('yInput'))
            ->will($this->returnValue($y));

        $model = new ModelError($request);

        $this->assertEquals($expected, $model->getErrorMessage());
    }

    public function errorProvider() {
        return [
            "addError" => ['op' => 'add', 'y' => 0, 'expected' => ModelError::ALPHABET_ERROR_MESSAGE],
            "divideError" => ['op' => 'divide', 'y' => 1, 'expected' => ModelError::ALPHABET_ERROR_MESSAGE],
            "divideBy0Error" => ['op' => 'divide', 'y' => 0, 'expected' => ModelError::UNDEFINED_ERROR_MESSAGE]
        ];
    }
}