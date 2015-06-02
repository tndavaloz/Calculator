<?php
/**
 * Created by PhpStorm.
 * User: ndavaloz
 * Date: 5/28/15
 * Time: 1:34 PM
 */

class Calculator {

    private $xValue;

    private $yValue;

    public function __construct($xValue, $yValue)
    {
        $this->xValue = $xValue;
        $this->yValue = $yValue;
    }

    public function add()
    {
        return $this->xValue + $this->yValue;
    }

    public function subtract()
    {
        return $this->xValue - $this->yValue;
    }

    public function multiply()
    {
        return $this->xValue * $this->yValue;
    }

    public function divide()
    {
        if ($this->yValue == 0) {
            echo "Undefined behavior";
            return null;
        }
        return $this->xValue / $this->yValue;
    }

    public function setX($xValue)
    {
        $this->xValue = $xValue;
    }

    public function setY($yValue)
    {
        $this->yValue = $yValue;
    }

    public function getX()
    {
        return $this->xValue;
    }

    public function getY()
    {
        return $this->yValue;
    }
}