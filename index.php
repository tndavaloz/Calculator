<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
        'debug' => true
    )
);

$app->get('/', function () use($app) {
    $app->render('index.html');
});

$app->post('/', function () use($app) {
    $xValue = $app->request->post("xValue");
    $yValue = $app->request->post("yValue");

    if (!is_numeric($yValue) || !is_numeric($xValue)) {
        echo "Please enter numerical value";
    }

    $operator = $app->request->post("operator");
    $myCalc = new Calculator($xValue, $yValue);

    switch($operator) {
        case 'addition':
            echo $myCalc->add();
            break;
        case 'subtract':
            echo $myCalc->subtract();
            break;
        case 'divide':
            echo $myCalc->divide();
            break;
        case 'multiply':
            echo $myCalc->multiply();
            break;
        default:
            break;
    }
});

$app->run();