<?php

namespace App\Http;

use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\StreamInterface;
use Slim\Psr7\Interfaces\HeadersInterface;
use Slim\Psr7\Response;

class JsonResponse extends Response
{
    public function __construct($data, int $status = StatusCodeInterface::STATUS_OK, ?HeadersInterface $headers = null, ?StreamInterface $body = null)
    {
        parent::__construct($status, $headers, $body);
        $this->headers->addHeader('Content-type', 'application/json');
        $this->getBody()->write(json_encode($data, JSON_THROW_ON_ERROR));
    }
}