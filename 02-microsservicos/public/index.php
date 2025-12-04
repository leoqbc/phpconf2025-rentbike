<?php

use Peroxide\DependencyInjection\Container;
use RentBike\Modules\Controller\PaymentController;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container(require __DIR__ . '/../config/container.php');

AppFactory::setContainer($container);

$app = AppFactory::create();

$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);

// implementar
$app->post('/process', [PaymentController::class, 'processPayment']);

$app->run();