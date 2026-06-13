<?php


namespace Test\Functional;


use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Psr7\Factory\ServerRequestFactory;

class WebTestCase extends \PHPUnit\Framework\TestCase
{
    public static function jsonRequest(string $method, string $path): ServerRequestInterface
    {
        return self::request($method, $path)
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-type', 'application/json');
    }


    protected function app(): App
    {
        $container = require __DIR__ . '/../../config/container.php';
        return (require __DIR__ . '/../../config/app.php')($container);
    }

    protected static function request(string $method, string $path): ServerRequestInterface
    {
        return (new ServerRequestFactory())->createServerRequest($method, $path);
    }

}