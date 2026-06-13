<?php


namespace Test\Functional;


use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Psr7\Factory\ServerRequestFactory;

class NotFoundTest extends WebTestCase
{
    /**
     * @coversNothing
     */
    public function testHello(): void
    {
        $response = $this->app()->handle(self::jsonRequest('GET', '/not-found'));

        self::assertEquals(404, $response->getStatusCode());
        self::assertStringContainsString('"404 Not Found"', (string) $response->getBody());

    }

}