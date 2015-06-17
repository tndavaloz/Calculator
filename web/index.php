<?php

require '../vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$app = new \Slim\Slim(array(
        'debug' => true
    )
);

$container = new ContainerBuilder();

$DI = new YamlFileLoader($container, new FileLocator(__DIR__));
$DI->load('../config/config.yml');

$container->set('templates', __DIR__ . '/../src/Calculator/View/Templates');
$container->set('slim.request', $app->request);
$container->compile();

$app->get('/', function () use($container) {
    /** @var Callable $calculatorController */
    $calculatorController = $container->get('src.calculator.controller');
    $calculatorController();
});

$app->post('/', function () use($container) {
    /** @var Callable $calculatorController */
    $calculatorController = $container->get('src.calculator.controller');
    $calculatorController();
});


$app->run();