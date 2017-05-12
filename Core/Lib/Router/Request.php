<?php

namespace Core\Lib\Router;


class Request
{
    private $url;

    public $method;

    public $route;

    public $parameters = [];


    public function __construct($url)
    {
        $this->setUrl($url);
        $this->setMethod($_SERVER['REQUEST_METHOD']);
        $this->setParameters();
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $url
     */
    private function setUrl($url)
    {
        $this->url = $url;
    }

    private function setParameters()
    {
        $parameters= explode('/', $this->url);
        array_shift($parameters);
        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return array
     */
    public function getBlogParameters()
    {
        return $this->parameters[0];
    }

    /**
     * @param Route $route
     */
    private function setRoute()
    {
        $this->route = $this->url;
    }

    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }


    /**
     * @param mixed $method
     */
    private function setMethod($method)
    {
        $this->method = $method;
    }

}
