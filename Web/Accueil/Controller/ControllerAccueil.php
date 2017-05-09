<?php

namespace Web\Accueil\Controller;

use Core\Lib\Controller;
use Web\Accueil\Model\ModelArticle;


class ControllerAccueil extends Controller
{
    
    public function accueil()
    {
        $article = new ModelArticle();
        $accueil = $article->firstArticle();
        $this->render('accueil','accueil', compact('accueil'));
    }

}
