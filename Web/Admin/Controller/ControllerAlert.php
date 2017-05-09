<?php

namespace Web\Admin\Controller;

use Core\Lib\App;
use Core\Lib\Auth\Session;
use Web\Blog\Model\ModelComments;

class ControllerAlert extends ControllerAdmin
{
    public $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelComments();
    }

    public static function countAlertComments()
    {
        $post = new ModelComments();
        $nbAlert = $post->countAlertComment();
        $result = $nbAlert > 0 ? '<span class="badge">' . $nbAlert . '</span>' : '';
        return $result;
    }

    public function viewAlertComments()
    {
        $titre = "Affichage des Commentaires à valider";
        $posts = $this->model->findAllAlertComments();
        $this->render('admin', 'alert', compact('titre','posts'));
    }

    public function validAlertComment()
    {
        ModelComments::validComment($_POST['validComment']);
        Session::getInstance()->setMessage('success', 'Le commentaire a été validé');
        App::redirect('admin/posts/alertComments');
    }

    public function deleteAlertComment()
    {
        ModelComments::deleteCommentsFromAlert($_POST['deleteComment']);
        Session::getInstance()->setMessage('success', 'Le commentaire a été suppriméé');
        App::redirect('admin/posts/alertComments');
    }

    public function updateAlertComment(){

        if ($this->model->updateAlertComment($_POST['idAlert'], $_POST['content']) === true)
        {
            Session::getInstance()->setMessage('success', 'Le commentaire a été mis à jour');
            App::redirect('admin/posts/alertComments');
        }
        else
        {
            Session::getInstance()->setMessage('danger', 'Une erreur est survenue');
            App::redirect('admin/posts/alertComments');
        }
    }

    public function findAlertOnJson()
    {
        echo json_encode($this->model->findComment($_POST['idAlert']));
    }

}