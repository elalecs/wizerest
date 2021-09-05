<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

define("WORKDIR", __DIR__ . '/../');

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $salute = new Controllers\Salute;

    $json_response = json_encode($salute->getSalute());

    $response->getBody()->write($json_response);
    return $response
          ->withHeader('Content-Type', 'application/json')
          ->withStatus(201);
});

$app->run();