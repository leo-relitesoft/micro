<?php


namespace Test;


use App\Http\JsonResponse;

class JsonResponseTest extends \PHPUnit\Framework\TestCase
{

    public function testDefaultCode(): void
    {
        $response = new JsonResponse(12);

        self::assertEquals(12, (string) $response->getBody());
        self::assertEquals('application/json', $response->getHeaderLine('Content-type'));
        self::assertEquals(200, $response->getStatusCode());
    }

    public function testCode(): void
    {
        $response = new JsonResponse(12, 201);

        self::assertEquals(12, (string) $response->getBody());
        self::assertEquals('application/json', $response->getHeaderLine('Content-type'));
        self::assertEquals(201, $response->getStatusCode());
    }

    public function testString(): void
    {
        $response = new JsonResponse('12');

        self::assertEquals('"12"', (string) $response->getBody());
        self::assertEquals('application/json', $response->getHeaderLine('Content-type'));
        self::assertEquals(200, $response->getStatusCode());
    }

    public function testArray(): void
    {
        $value = ['one', 'two'];
        $response = new JsonResponse($value);

        self::assertEquals(json_encode($value), (string) $response->getBody());
        self::assertEquals('application/json', $response->getHeaderLine('Content-type'));
        self::assertEquals(200, $response->getStatusCode());
    }
}