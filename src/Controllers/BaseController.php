<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;

abstract class BaseController
{
    /** @var ContainerInterface  */
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    abstract protected function getRouteFromUri(string $uri): string;
}
