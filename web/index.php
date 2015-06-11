<?php

require '../vendor/autoload.php';

use Calculator\Model\CalculatorModel;
use Calculator\View\CalculatorView;
use Calculator\CalculatorController;

$app = new \Slim\Slim(array(
        'debug' => true
    )
);



$app->get('/', function () use($app) {
    $calcModel = new CalculatorModel();
    $calcView = new CalculatorView();
    $calculatorController = new CalculatorController($calcModel, $calcView, $app->request);
    $calculatorController();
});

$app->post('/', function () use($app) {
    $calcModel = new CalculatorModel();
    $calcView = new CalculatorView();
    $calculatorController = new CalculatorController($calcModel, $calcView, $app->request);
    $calculatorController();
});


$app->run();