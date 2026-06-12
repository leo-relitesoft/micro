<?php

namespace App\Http;

use App\RequirementsCheck;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Routing\RouteContext;

class HelloAction implements RequestHandlerInterface
{


    public function __construct(private ContainerInterface $container)
    {
    }

    /**
     * @throws \JsonException
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $res = RequirementsCheck::getMissingModules();
        if ($this->container->get('config')['debug']) {
            $res[] = "DEBUG MODE";
        }

        if ($id = $request->getAttribute('id')) {
            $res[] = "id: $id";
        }

        return new JsonResponse($res);
    }
}