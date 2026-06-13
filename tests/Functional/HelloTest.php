<?php


namespace Test\Functional;


use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Psr7\Factory\ServerRequestFactory;

class HelloTest extends WebTestCase
{
    /**
     * @coversNothing
     */
    public function testHello(): void
    {
        $response = $this->app()->handle(self::jsonRequest('GET', '/hello/guys'));

        self::assertEquals(200, $response->getStatusCode());
        self::assertStringContainsString('"id: guys"', (string) $response->getBody());

    }

}