<?php

namespace Core\Lib\Router;


use Core\Lib\App;

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
     */
    public function findRoute($url)
    {
        foreach ($this->catalogue as $route) {
            if ($route->matchRequest($url)) {
                return $route;
            }
        }

    }

}
