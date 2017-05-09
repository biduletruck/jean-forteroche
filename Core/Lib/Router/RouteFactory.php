<?php


namespace Core\Lib\Router;


class RouteFactory
{
    /**
     * @param array $loadedRoutes
     * @return Route[]
     */
    public function createCollectionFromConfig(array $loadedRoutes)
    {
        $routes = [];
        foreach ($loadedRoutes as $route) {
            $routes[] = $this->create($route['url'], $route['src'], $route['controller'], $route['action']);
        }
        return $routes;
    }

    /**
     * @return Route
     */
    private function create($url, $src, $controller, $action)
    {
        $route = new Route();
        $route->setUrl($url);
        $route->setSrc($src);
        $route->setController($controller);
        $route->setAction($action);

        return $route;
    }
}
