<?php

use App\RequirementsCheck;

$root = dirname(__DIR__);

require $root . '/vendor/autoload.php';

header('Content-Type: application/json; charset=utf-8');
    RequirementsCheck::run();
