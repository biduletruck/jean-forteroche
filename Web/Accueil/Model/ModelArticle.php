<?php

namespace Web\Accueil\Model;

use Core\Lib\DatabaseRepository;

class ModelArticle extends DatabaseRepository implements ArticleGateway
{
    public function firstArticle()
    {
        return $this->db->getQuery('SELECT * FROM t_article WHERE art_id = 1')->fetch(\PDO::FETCH_OBJ);
    }

    public function viewArticleFromAccueil()
    {
       return $this->db->getQuery('SELECT * FROM t_article WHERE art_id = 1')->fetch(\PDO::FETCH_OBJ);
    }

    public function updateArticleFromAccueil($content)
    {
        $sql = "UPDATE t_article SET art_content = :ART_CONTENT, art_date = NOW() WHERE art_id = 1";
        $statement = [
            "ART_CONTENT"   => $content
        ];
        $this->db->getPrepare($sql, $statement);
        return true;
    }
}