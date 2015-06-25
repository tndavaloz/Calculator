<?php

namespace Calculator\Model;

use Slim\Http\Request;

class ModelFactory {

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function createAddModel()
    {
        return new AddModel($this->request);
    }

    public function createSubtractModel()
    {
        return new SubtractModel($this->request);
    }

    public function createDivideModel()
    {
        return new DivideModel($this->request);
    }

    public function createMultiplyModel()
    {
        return new MultiplyModel($this->request);
    }

    public function getModel()
    {
        switch($this->request->post('operator')) {
            case 'add':
                return $this->createAddModel();
            case 'subtract':
                return $this->createSubtractModel();
            case 'multiply':
                return $this->createMultiplyModel();
            case 'divide':
                return $this->createDivideModel();
            default:
                return false;
        }
    }
}