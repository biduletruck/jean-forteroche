<?php

namespace Core\Lib\Router;


class RequestFactory
{
    /**
     * @return Request
     */
    public function buildRequest($url)
    {
        $request = new Request(array_key_exists('url',$_GET) ? $_GET['url'] : '');
        $request->getMethod();
        $request->getParameters();
        return $request;
    }
}
