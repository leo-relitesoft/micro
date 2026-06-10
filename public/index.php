<?php

declare(strict_types=1);

use \Psr\Http\Message\ResponseInterface as Response;
use  Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use App\RequirementsCheck;

$root = dirname(__DIR__);

require $root . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/{id}', function (Request $request, Response $response, $args){
    $res = RequirementsCheck::getMissingModules();
    $response->getBody()->write(json_encode($res, JSON_PRETTY_PRINT));
    return $response->withHeader('Content-type', 'application/json');
});

$app->run();

