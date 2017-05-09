<?php

namespace Web\Blog\Controller;


use Core\Lib\App;
use Core\Lib\Auth\Session;
use Core\Lib\Controller;
use Core\Lib\Router\RequestFactory;
use Web\Blog\Model\ModelComments;

class ControllerComments extends Controller
{
    private $comments;
    private $request;

    public function __construct()
    {
        $this->comments = new ModelComments();
        $request = new RequestFactory();
        $this->request = $request->buildRequest($_GET['url']);
    }

    public function addComment()
    {
        $params = $this->request->getParameters();
        if ($this->request->getMethod() === 'POST')
        {
            if (isset($_POST['pseudoAuteur']) && !empty($_POST['pseudoAuteur']))
            {
                if (isset($_POST['content']) && !empty($_POST['content']))
                {
                    $this->comments->addNewComment($_POST['pseudoAuteur'], $_POST['content'], $params[1]);
                    Session::getInstance()->setMessage('success', 'Votre commentaire a été ajouté');
                    App::redirect('post/' . $params[1]);
                }
                Else
                {
                    Session::getInstance()->setMessage('warning', 'Un commentaire est obligatoire');
                    App::redirect('post/' . $params[1]);
                }
            }
            Else
            {
                Session::getInstance()->setMessage('warning', 'Un pseudo est obligatoire');
                App::redirect('post/' . $params[1]);
            }
        }
        else
        {
            Session::getInstance()->setMessage('danger', 'Une erreur est survenue');
            App::redirect('post/' . $params[1]);
        }
    }

    public function addAlert()
    {
        $params = $this->request->getParameters();
        if ($this->request->getMethod() === 'POST')
        {
            $this->comments->addAlertComment($_POST['idPost']);
            Session::getInstance()->setMessage('success', 'Votre signalement a été pris en compte, merci.');
            App::redirect('post/' . $params[1]);

        }
        else
        {
            Session::getInstance()->setMessage('danger', 'Une erreur est survenue');
            App::redirect('post/' . $params[1]);
        }

    }

    public function addCommentResponse()
    {
        $params = $this->request->getParameters();
        if ($this->request->getMethod() === 'POST')
        {
            $this->comments->addNewComment($_POST['reponseAuteur'],$_POST['reponseCommentaire'],$_POST['bil_id'],$_POST['validResponse'],($_POST['level'] + 1));
            Session::getInstance()->setMessage('success', 'Votre message a été pris en compte.');
            App::redirect('post/' . $params[1]);
        }

    }

    public function removeAlert()
    {
        $params = $this->request->getParameters();
        if ($this->request->getMethod() === 'POST')
        {
            ModelComments::validComment($_POST['idPost']);
            Session::getInstance()->setMessage('success', 'Le commentaire a été validé.');
            App::redirect('post/' . $params[1]);
        }
    }

    public function deleteCommentsFromAlert()
    {
        $params = $this->request->getParameters();
        if ($this->request->getMethod() === 'POST')
        {
            ModelComments::deleteCommentsFromAlert($_POST['idPost']);
            Session::getInstance()->setMessage('success', 'Le commentaire signalé et ses réponses ont été supprimés.');
            App::redirect('post/' . $params[1]);
        }

    }

}