<?php

use Peroxide\DependencyInjection\Container;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use RentBike\Modules\Payment\Controller\PaymentController;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container(require __DIR__ . '/../config/container.php');

AppFactory::setContainer($container);

$app = AppFactory::create();

$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('/', function ($request, $response) {
    return $response->withStatus(200);
});

// implementar
$app->post('/process', [PaymentController::class, 'process']);

$app->run();