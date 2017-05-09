<?php

namespace Web\Admin\Controller;

use Core\Lib\App;
use Web\Blog\Model\ModelPosts;


class ControllerPost extends ControllerAdmin
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new ModelPosts();
    }

    public function viewPostsAdmin()
    {
        $titre = "Affichage des post";
        $posts = $this->model->getAllPosts();
        $this->render('admin', 'posts', compact('titre','posts'));
    }

    public function addPostAdmin()
    {
        if (App::getMethod() === 'POST')
        {
            if ( !empty($_POST['titrePost']) && !empty($_POST['content']) )
            {
                $post = $this->model->addNewPost($_POST['titrePost'], $_POST['content'], $_POST['adminSavePost']);
                if ($post === true)
                {
                    $this->session->setMessage('success', 'Votre post a été ajouté');
                    App::redirect('admin/posts');
                }
                else
                {
                    $this->session->setMessage('danger', 'Une erreur est survenue');
                    App::redirect('admin/posts');
                }
            }
            else
            {
                $this->session->setMessage('warning', 'Tous les champs sont obligatoires');
                App::redirect('admin/posts');
            }
        }
        else
        {
            $this->session->setMessage('danger', 'Une erreur est survenue');
            App::redirect('admin/posts');
        }
    }

    public function updatePostAdmin()
    {
        if ($this->model->updatePost($_POST['idPost'], $_POST['titrePost'], $_POST['content']) === true)
        {
            $this->session->getInstance()->setMessage('success', 'Votre post a été mis à jour');
            App::redirect('admin/posts');
        }
        else
        {
            $this->session->setMessage('danger', 'Une erreur est survenue');
            App::redirect('admin/posts');
        }

    }

    public function deletePostAdmin()
    {
        if (App::getMethod() === 'POST')
        {
            $post = $this->model->deletePost($_POST['deletepost']);
            if ($post === true)
            {
                $this->session->setMessage('success', 'Votre post et ses commentaires ont été supprimés');
                App::redirect('admin/posts');
            }
            else
            {
                $this->session->setMessage('danger', 'Une erreur est survenue');
                App::redirect('admin/posts');
            }
        }
        else
        {
            $this->session->setMessage('danger', 'Une erreur est survenue');
            App::redirect('admin/posts');
        }
    }

    public function findPostOnJson()
    {
        echo json_encode($this->model->findPost($_POST['idPost']));
    }

    public function publishingPost()
    {
            $this->model->publishPost($_POST['idPost'], $_POST['status']);
    }

}