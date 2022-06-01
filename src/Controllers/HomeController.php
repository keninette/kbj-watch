<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class HomeController extends BaseController
{
    /** @var string */
    private const BASE_PATH = '/home';

    /**
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        switch ($this->getRouteFromUri($request->getUri()->getPath())) {
            case '/':
            default:
                return $this->homeAction($request, $response, $args);
        }
    }

    protected function getRouteFromUri(string $uri): string
    {
        $route = substr($uri, strlen(self::BASE_PATH));
        return empty($route) ? '/' : $route;
    }

    private function homeAction(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $view = Twig::fromRequest($request);

        return $view->render($response, 'home/home.html.twig');
    }
}
