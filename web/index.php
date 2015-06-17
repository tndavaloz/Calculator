<?php

require '../vendor/autoload.php';


use Calculator\Model\CalculatorModel;
use Calculator\View\CalculatorView;
use Calculator\CalculatorController;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__));
$loader->load('../config/config.yml');



Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../src/Calculator/View/Templates');

$twig = new Twig_Environment($loader);

$app = new \Slim\Slim(array(
        'debug' => true
    )
);

$app->get('/', function () use($app, $twig) {
    $calcModel = new CalculatorModel();
    $calcView = new CalculatorView($twig);
    $calculatorController = new CalculatorController($calcModel, $calcView, $app->request);
    $calculatorController();
});

$app->post('/', function () use($app, $twig) {
    $calcModel = new CalculatorModel();
    $calcView = new CalculatorView($twig);
    $calculatorController = new CalculatorController($calcModel, $calcView, $app->request);
    $calculatorController();
});


$app->run();