<?php

namespace App\Http;

use App\RequirementsCheck;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomeAction implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $res = RequirementsCheck::getMissingModules();
        if (getenv('APP_DEBUG')) {
            $res[] = "DEBUG MODE";
        }
        return new JsonResponse($res);
    }
}