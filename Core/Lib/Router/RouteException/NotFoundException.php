<?php
/**
 * Created by PhpStorm.
 * User: yclem001
 * Date: 12/05/2017
 * Time: 17:41
 */

namespace Core\Lib\Router\RouteException;


use Core\Lib\App;
use Throwable;

class NotFoundException extends \Exception
{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getError404()
    {
       // header("Status : 404 Not Found");
        header('HTTP/1.0 404 Not Found');
        readfile('404.html');
        exit();

    }

    public function getError500()
    {
        header('HTTP/1.0 500 Not Found');
        readfile('500.html');
        exit();
    }
}