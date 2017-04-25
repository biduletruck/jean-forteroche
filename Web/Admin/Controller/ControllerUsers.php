<?php

namespace Web\Admin\Controller;


use Core\Lib\App;
use Core\Lib\Auth\Auth;
use Web\Admin\Model\ModelUsers;


class ControllerUsers extends ControllerAdmin
{

    public $users;

    public function __construct()
    {
        parent::__construct();
        $this->users = new ModelUsers();
    }


    public function getUsers()
    {
        $listUsers = $this->users->findUsers();
        $titre = 'Gestion des utilisateurs';
        $this->render('Admin','users', compact('titre','listUsers'));
    }

    public function addUser()
    {
        if(App::getMethod() === 'POST')
        {
            if($_POST['inputPassword'] === $_POST['inputPassword2'])
            {
                if ($this->users->addUserIfNotExist($_POST['inputUsername'],$_POST['inputPassword']) === true)
                {
                    Auth::getInstance()->session->setMessage('success', 'utilisateur ajouté');
                    App::redirect('admin/users');
                }
                else
                {
                    Auth::getInstance()->session->setMessage('danger', 'login existant, merci d\'en choisir un autre ...');
                    App::redirect('admin/users');
                }
            }
            else
            {
                Auth::getInstance()->session->setMessage('danger', 'mot de passe incorrect');
                App::redirect('admin/users');
            }
        }
    }

    public function changeUserPassword()
    {
        if(App::getMethod() === 'POST')
        {
            if($this->users->ChangeUserPasswordIfNotSame($_POST['passwordUser'], $_POST['userPassword']) === true)
            {

                Auth::getInstance()->session->setMessage('success', 'Le password a été changé');
                App::redirect('admin/users');
            }
            else
            {
                Auth::getInstance()->session->setMessage('danger', 'Utilisateur inconnu');
                App::redirect('admin/users');
            }
        }
    }

    public function deleteUser()
    {
        if(App::getMethod() === 'POST')
        {
            if ($this->users->deleteUserIfExist($_POST['deleteUser']) === true)
            {
                Auth::getInstance()->session->setMessage('success', 'Utilisateur supprimé');
                App::redirect('admin/users');
            }
            else
            {
                Auth::getInstance()->session->setMessage('warning', 'le login n\'éxiste pas ');
                App::redirect('admin/users');
            }
        }
    }

}