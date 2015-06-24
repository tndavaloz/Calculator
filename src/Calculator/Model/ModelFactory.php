<?php

namespace Calculator\Model;

use Slim\Http\Request;

class ModelFactory {

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function createAddModel() {
        return new AddModel($this->request);
    }

    public function getModel() {
        switch($this->request->post('oeprator')) {
            case 'addition':
                return $this->createAddModel();
            default:
                return false;
        }

    }



}