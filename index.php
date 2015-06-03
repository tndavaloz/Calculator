<?php
require 'vendor/autoload.php';
require_once(__DIR__ . '/Model/CalculatorModel.php');
require_once(__DIR__ . '/View/CalculatorView.php');
require_once(__DIR__ . '/Controller/CalculatorController.php');

$app = new \Slim\Slim(array(
        'debug' => true
    )
);

$app->get('/', function () use($app) {
    $calcModel = new CalculatorModel();
    $calcView = new CalculatorView();
    $calculatorController = new CalculatorController($calcModel, $calcView);
    $calculatorController();
});


$app->run();