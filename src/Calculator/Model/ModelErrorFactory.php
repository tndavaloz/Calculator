<?php

namespace Calculator\Model;

use Slim\Http\Request;

class ModelErrorFactory {

    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function getError() {
        return new ModelError($this->request);
    }
}