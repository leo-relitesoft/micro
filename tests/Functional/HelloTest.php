<?php


namespace Test\Functional;


use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Psr7\Factory\ServerRequestFactory;

class HelloTest extends \PHPUnit\Framework\TestCase
{

    public function testHello(): void
    {

        $container = require __DIR__ . '/../../config/container.php';


        /** @var App $app */
        $app = (require __DIR__ . '/../../config/app.php')($container);

        $request = (new ServerRequestFactory())->createServerRequest('GET', '/hello/guys',['q' => 'any']);
        $response = $app->handle($request);

        self::assertEquals(200, $response->getStatusCode());
        self::assertStringContainsString('"id: guys"', (string) $response->getBody());

    }
}