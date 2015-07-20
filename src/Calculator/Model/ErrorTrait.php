<?php

namespace Calculator\Model;

trait ErrorTrait {
    private $message;

    public function setError($message) {
        $this->message = $message;
    }

    public function getError() {
        return $this->message;
    }
}