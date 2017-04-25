<?php

namespace Core\Lib\Auth;


use Core\Lib\App;

class Session implements SessionInterface
{
    const NAME_SESSION = 'JFR';

    static $instance;

    static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new Session();
        }
        return self::$instance;
    }

    public function __construct()
    {
        session_start();
    }

    public function isValidSession()
    {
        if( !isset($_SESSION[self::NAME_SESSION]['username']) || empty(($_SESSION[self::NAME_SESSION]['username']) && ($_SESSION[self::NAME_SESSION]['userlevel'] === '1000'))){
            App::redirect('connexion');
        }
        return true;
    }

    public function addSessionParameter($key, $value)
    {
        $_SESSION[self::NAME_SESSION][$key] = $value;
    }

    public function readSession()
    {
        return $_SESSION;
    }

    public function readSessionParameter($key)
    {
        return isset($_SESSION[self::NAME_SESSION][$key]) ? $_SESSION[self::NAME_SESSION][$key] : null;
    }

    public function deleteSessionParameter($key)
    {
        unset($_SESSION[self::NAME_SESSION][$key]);
    }

    public function deleteSessionAllParameters()
    {
        unset($_SESSION[self::NAME_SESSION]);
    }

    public function logOutSession()
    {
        session_destroy();
    }

    public function setMessage($key, $message)
    {
        $_SESSION['flash'][$key] = $message;
    }

    public function getMessage()
    {
        return isset($_SESSION['flash']);
    }

    public function deleteMessage()
    {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
}