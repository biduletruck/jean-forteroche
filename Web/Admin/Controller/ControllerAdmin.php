<?php

namespace Web\Admin\Controller;

use Core\Lib\Auth\Auth;
use Core\Lib\Controller;

class ControllerAdmin extends Controller
{
    protected $auth;

    protected $session;

    public function __construct()
    {
        $this->auth = Auth::getInstance();
        $this->session = $this->auth->session;
        $this->session->isValidSession();
    }

    public function getAdmin()
    {
        $titre = 'Bonjour, bienvenu sur le site de Jean Forte Roche';
        $this->render('admin','admin', compact('titre'));
    }
}