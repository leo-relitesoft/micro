<?php

declare(strict_types=1);


$root = dirname(__DIR__);

http_response_code(500);

require $root . '/vendor/autoload.php';

$container = require $root . '/config/container.php';

$app = (require $root . '/config/app.php')($container);

$app->run();

