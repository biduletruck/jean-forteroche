<?php

namespace Web\Connexion\Controller;

use Core\Lib\App;
use Core\Lib\Auth\Auth;
use Core\Lib\Auth\Session;
use Core\Lib\Controller;

class ControllerConnexion extends Controller
{
    private $session;

    public function __construct()
    {
        $this->session = Session::getInstance();
    }

    public function userIsNotConnected()
    {
        $titre = 'Bonjour, Connexion à l\' Admin du site';

        $this->render('connexion','connexion', compact('titre'));

    }

    public function connectUser()
    {

        if (isset($_POST) && !empty($_POST))
        {
            $auth = Auth::getInstance();
            if( $auth->login($_POST['inputUserName'], $_POST['ImputPassword']) === true)
            {
                $this->session->isValidSession();
            }
        }

    }

    public function userLogout()
    {
        $this->session->deleteSessionAllParameters();
        $this->session->logOutSession();
        App::redirect('accueil');
    }
}