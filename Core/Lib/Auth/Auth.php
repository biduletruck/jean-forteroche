<?php

namespace  Core\Lib\Auth;


use Core\Lib\App;
use Core\Lib\Connexion;

class Auth implements AuthInterface
{
    private $connexion;

    public $session = [];

    static $instance;

    private $options = [
        'restrict_area' => "Vous n'avez pas le droit d'accéder à cette page",
        'loginNok'      => "Login et/ou mot de passe incorrect ..."
    ];

    public function __construct()
    {
        $this->connexion = new Connexion();
        $this->session = Session::getInstance();
    }

    static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new Auth();
        }
        return self::$instance;
    }

    public function login($username, $pass)
    {
        $verifUser = $this->connexion->getQuery("SELECT * FROM t_users WHERE t_users.username LIKE '" . htmlspecialchars($username,ENT_QUOTES) . "'");
        $user = $verifUser->fetch(\PDO::FETCH_OBJ);

        if ($user && ($username === $user->username) && ( password_verify(htmlspecialchars($pass), $user->userpassword)) )
            {
            foreach ($user as $key => $value)
            {
                $this->session->addSessionParameter($key, $value);
            }
            App::redirect('admin');
        }
        else
        {
           // $this->session->setMessage('danger', $this->options['loginNok']);
            App::redirect('connexion');
        }
    }

    public function logout(){
        $this->session->logOutSession();
    }

    public function hashPassword($pass){
        return password_hash($pass, PASSWORD_BCRYPT);
    }

    public function restrict(){
        if(!$this->session->readSessionParameter('leveluser') === 1000){
            $this->session->setMessage('danger', $this->options['restrict_area']);
            App::redirect('connexion');
        }
    }
}