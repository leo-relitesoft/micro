<?php

namespace App\Http;

use App\RequirementsCheck;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomeAction implements RequestHandlerInterface
{
    private ResponseFactoryInterface $factory;
    /**
     * HomeAction constructor.
     * @param ResponseFactoryInterface $factory
     */
    public function __construct(ResponseFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = $this->factory->createResponse();
        $res = RequirementsCheck::getMissingModules();
        if (getenv('APP_DEBUG')) {
            $res[] = "DEBUG MODE";
        }
        return Http::json($response, $res);
    }
}