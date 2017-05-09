<?php

namespace Web\Accueil\Model;


interface ArticleGateway
{
    public function firstArticle();

    public function viewArticleFromAccueil();

    public function updateArticleFromAccueil($content);

}