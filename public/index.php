<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Factory\AppFactory;
use Slim\Psr7\Factory\ResponseFactory;

$root = dirname(__DIR__);

http_response_code(500);

require $root . '/vendor/autoload.php';

$builder = new ContainerBuilder;
$builder->addDefinitions([
   'config' => [
       'debug' => (bool) getenv('APP_DEBUG'),
   ],
    ResponseFactoryInterface::class => DI\get(ResponseFactory::class)

]);

$container = $builder->build();

$app = AppFactory::createFromContainer($container);

$app->addMiddleware($container->get(\App\Http\ParseRouteMiddleware::class));
$app->addRoutingMiddleware();
$app->addErrorMiddleware($container->get('config')['debug'], true, true);

$app->get('/home/{id}', \App\Http\HomeAction::class);

$app->run();

