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



}
