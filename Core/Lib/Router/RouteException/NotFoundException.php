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
use Web\Error\Controller\ControllerError;

class NotFoundException extends \Exception
{

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getError404()
    {
        header("Status : 404 Not Found");
        header('HTTP/1.0 404 Not Found');
        App::redirect('404');
    }
}