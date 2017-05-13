<?php


namespace Core\Lib;


use Core\Lib\Auth\Auth;
use Core\Lib\Auth\Session;
use Core\Lib\Router\RequestFactory;
use Core\Lib\Router\Router;
use Core\Lib\Router\RouteException\NotFoundException;

class App {


    /**
     * @var Router
     */
    private $router;

    /**
     * @var RequestFactory
     */
    private $requestFactory;

    /**
     * @var Session
     */
    public $session;

    public $auth;

    /**
     * App constructor.
     * @param Router $router
     * @param RequestFactory $requestFactory
     */
    public function __construct(array $config)
    {
        $this->router = new Router($config);
        $this->requestFactory = new RequestFactory();
        $this->auth = Auth::getInstance();
        $this->session = $this->auth->session;
    }

    public function run()
    {

            $request = $this->requestFactory->buildRequest(array_key_exists('url',$_GET) ? $_GET['url'] : '');
            $route = $this->router->findRoute($request->getUrl());
            try
            {
                if( $route == NULL )
                {
                    throw new NotFoundException('Page non touvée !');
                }

                $controller = $route->getController();
                $action = $route->getAction();
                $controller->$action();
            }
            catch(NotFoundException $e)
            {
                $e->getError404();

            }
            catch (\Exception $e)
            {
                $error = new NotFoundException();
                $error->getError500();
            }

    }

    public static function redirect($url)
    {
        header("Location: /jean-forteroche/" . $url);
        exit();
    }

    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param string $comment
     * @param int $limit
     * @return string
     */
    public static function textSizeLimit($comment, $limit)
    {
        $comment=substr($comment, 0, $limit);
        $lastWord=strrpos($comment," ");
        $comment=substr($comment,0,$lastWord);
        return $comment;
    }

}
