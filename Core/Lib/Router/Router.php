<?php

namespace Core\Lib\Router;


class Router
{
    public $request;

    /**
     * @var Route[]
     */
    public $catalogue = [];


    public function __construct($config)
    {
        $requestFactory = new RequestFactory();
        $this->request = $requestFactory->buildRequest(array_key_exists('url',$_GET) ? $_GET['url'] : '');
        $routeFactory = new RouteFactory();
        $this->catalogue = $routeFactory->createCollectionFromConfig($config['loadedRoutes']);
    }


    /**
     * @return Route
     * @throws \RouteNotFoundException
     */
    public function findRoute($url)
    {
        foreach ($this->catalogue as $route) {
            if ($route->matchRequest($url)) {
                return $route;
            }
        }
        throw new RouteNotFoundException();
    }

}
