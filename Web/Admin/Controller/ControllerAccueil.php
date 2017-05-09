<?php

namespace Web\Admin\Controller;


use Core\Lib\App;
use Core\Lib\Auth\Session;
use Core\Lib\Router\RequestFactory;
use Web\Accueil\Model\ModelArticle;


class ControllerAccueil extends ControllerAdmin
{
    private $accueil;
    private $request;

    public function __construct()
    {
        parent::__construct();
        $this->accueil = new ModelArticle();
        $request = new RequestFactory();
        $this->request = $request->buildRequest($_GET['url']);
    }

    public function getAccueil()
    {
        $titre = 'Gestion de la page ModelArticle';
        $article = $this->accueil->viewArticleFromAccueil();
        $this->render('admin','accueil', compact('titre','article'));
    }

    public function updateAccueil()
    {
        if ($this->request->getMethod() === 'POST')
        {
            if (isset($_POST['content']) && !empty($_POST['content']))
            {
                $this->accueil->updateArticleFromAccueil($_POST['content']);
                Session::getInstance()->setMessage('success', "L'accueil a été mis à jour");
                App::redirect('post/admin/accueil');
            }
        }
        else
        {
            Session::getInstance()->setMessage('danger', 'Une erreur est survenue');
            App::redirect('post/admin/accueil');
        }
    }
}