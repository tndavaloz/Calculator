<?php
/**
 * Created by PhpStorm.
 * User: ndavaloz
 * Date: 7/15/15
 * Time: 10:23 AM
 */

namespace Calculator\Model;


class ModelErrorFactoryTest extends \PHPUnit_Framework_TestCase {

    public function createMockRequest() {
        $mock = $this->getMockBuilder('Slim\Http\Request')
            ->disableOriginalConstructor()
            ->getMock();

        return $mock;
    }

    public function testModelErrorFactory() {
        $request = $this->createMockRequest();

        $modelError = new ModelErrorFactory($request);

        $this->assertInstanceOf('Calculator\Model\ModelErrorFactory', $modelError);
    }

    public function testGetError() {
        $request = $this->createMockRequest();

        $modelError = new ModelErrorFactory($request);

        $this->assertInstanceOf('Calculator\Model\ModelError', $modelError->getError());
    }
}
