<?php

namespace Core\Lib\Router;


use Core\Lib\Controller;

class Route
{
    private $url;

    private $src;

    private $controller;

    private $action;

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param mixed $src
     */
    public function setSrc($src)
    {
        $this->src = $src;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @param Request $request
     * @return boolean
     */
    public function matchRequest($url)
    {

        return preg_match($this->url,$url);

       // return !empty($matches[0]);
    }

    /**
     * @return Controller
     */
    public function getController()
    {
        $class = '\\Web\\' . $this->src . '\\Controller\\Controller'. $this->controller;

        return new $class();
    }

    public function getAction()
    {
        return $this->action;
    }
}