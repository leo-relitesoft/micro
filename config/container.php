<?php

declare(strict_types=1);

$builder = new \DI\ContainerBuilder();
$builder->addDefinitions([
    'config' => [
        'debug' => (bool) getenv('APP_DEBUG'),
        'env' => getenv('APP_ENV') ?: 'prod',

    ],
    \Psr\Http\Message\ResponseFactoryInterface::class => DI\get(\Slim\Psr7\Factory\ResponseFactory::class)

]);

return $builder->build();
