<?php

declare(strict_types=1);

return static function (\Psr\Container\ContainerInterface $container): \Slim\App {
    $app = \Slim\Factory\AppFactory::createFromContainer($container);
    (require __DIR__ . '/middleware.php')($app, $container);
    (require __DIR__ . '/routes.php')($app);
    return $app;
};



return $app;
