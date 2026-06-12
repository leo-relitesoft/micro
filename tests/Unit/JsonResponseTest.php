<?php


namespace Test\Unit;


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

    /**
     * @dataProvider getCases
     * @param $source
     * @param $expected
     */
    public function testResponse($source, $expected): void
    {
        $response = new JsonResponse($source);

        self::assertEquals($expected, (string) $response->getBody());
        self::assertEquals('application/json', $response->getHeaderLine('Content-type'));
        self::assertEquals(200, $response->getStatusCode());
    }

    public function getCases(): array
    {
        $obj = new \stdClass();
        $obj->int = 1;
        $obj->str = 'str';
        $obj->none = null;

        $array = [
            'int' => 1,
            'str' => 'str',
            'none' => null
        ];

        return [
            'null' => [null, 'null'],
            'empty' => ['', '""'],
            'number' => [12, '12'],
            'string' => ['12', '"12"'],
            'object' => [$obj, '{"int":1,"str":"str","none":null}'],
            'array' => [$array, '{"int":1,"str":"str","none":null}'],
        ];

    }
}