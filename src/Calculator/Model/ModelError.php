<?php

namespace Calculator\Model;

use Slim\Http\Request;

class ModelError {

    const ALPHABET_ERROR_MESSAGE = 'INVALID ENTRY; ONLY NUMERICAL AND HEX VALUES ALLOWED';
    const UNDEFINED_ERROR_MESSAGE = 'DIVIDING BY ZERO (0) IS UNDEFINED';

    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function getErrorMessage() {
        if ('divide' == $this->request->post('operator')) {
            if (0 == $this->request->post('yInput')) {
                return self::UNDEFINED_ERROR_MESSAGE;
            }
        }
        return self::ALPHABET_ERROR_MESSAGE;
    }

}