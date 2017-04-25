<?php

namespace Web\Blog\Controller;

use Core\Lib\App;
use Core\Lib\Auth\Session;
use Core\Lib\Controller;
use Core\Lib\Router\RequestFactory;
use Web\Blog\Model\ModelComments;
use Web\Blog\Model\ModelPosts;

class ControllerPosts extends Controller
{
    private $post;
    private $comments;
    private $idPost;
    private $request;

    public function __construct()
    {
        $this->post = new ModelPosts();
        $this->comments = new ModelComments();
        $request = new RequestFactory();
        $this->request = $request->buildRequest($_GET['url']);
    }

    private function setIdPost()
    {
        $params = $this->request->getBlogParameters();
        if( (!empty($params)) && (is_int(intval($params))) && (intval($params) > 0) )
        {
            $this->idPost = $params;
        }
        else
        {
            Session::getInstance()->setMessage('danger', 'Une erreur est survenue');
            App::redirect('post/' . $params[1]);
        }
    }

    public function findAllPosts()
    {
        $posts = $this->post->getAllPublishPosts();
        $this->render('blog','posts',compact('posts'));
    }

    public function getPost()
    {
        $this->setIdPost();
        $params = $this->request->getBlogParameters();
        $post = $this->post->findPost($this->idPost);
        if($post != false)
        {
            $comments = $this->comments->findAllCommentsFromPost($this->idPost);
            $this->render('blog','postDetail',compact('post','comments'));
        }
        else
        {
            Session::getInstance()->setMessage('danger', 'Une erreur est survenue');
            App::redirect('post/' . $params[1]);
        }
    }



}