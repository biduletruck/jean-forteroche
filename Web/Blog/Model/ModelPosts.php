<?php

namespace Web\Blog\Model;

use Core\Lib\DatabaseRepository;
use Core\Lib\Router\RouteException\NotFoundException;

class ModelPosts extends DatabaseRepository implements PostsGateway
{

    public function addNewPost($titre, $content, $status)
    {
        $date = new \DateTime();
        $sql = "INSERT INTO t_billet  (BIL_DATE, BIL_TITRE, BIL_CONTENU, BIL_STATUS) VALUES (:BIL_DATE, :BIL_TITRE, :BIL_CONTENU, :BIL_STATUS)";
        $array = [
            "BIL_DATE"      => $date->format('Y-m-d H:i:s'),
            "BIL_TITRE"     => $titre,
            "BIL_CONTENU"   => $content,
            "BIL_STATUS"    => $status,
        ];
        $this->db->getPrepare($sql, $array);
        return true;
    }

    public function getAllPosts()
    {
        return $this->db->getQuery('SELECT * from t_billet ORDER BY BIL_ID ASC')->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAllPublishPosts()
    {
        return $this->db->getQuery('SELECT * from t_billet WHERE BIL_STATUS = 1 ORDER BY BIL_ID ASC')->fetchAll(\PDO::FETCH_OBJ);
    }

    public function updatePost($id, $title, $content)
    {
        $sql = "UPDATE t_billet SET BIL_TITRE = :BIL_TITRE, BIL_CONTENU = :BIL_CONTENU, BIL_DATE = NOW() WHERE BIL_ID = :BIL_ID";
        $statement = [
            "BIL_TITRE"     => $title,
            "BIL_CONTENU"   => $content,
            "BIL_ID"        => $id
        ];
        $this->db->getPrepare($sql, $statement);
        return true;
    }

    public function deleteAllCommentsFromPost($id)
    {
        $sql = "DELETE FROM t_commentaire WHERE BIL_ID = :BIL_ID";
        $array = ["BIL_ID" => $id];
        $this->db->getPrepare($sql, $array);
    }

    public function deletePostFromComment($id)
    {
        $sql = "DELETE FROM t_billet WHERE BIL_ID = :BIL_ID";
        $array = ["BIL_ID" => $id];
        $this->db->getPrepare($sql, $array);
    }

    public function deletePost($id)
    {
        $this->deleteAllCommentsFromPost($id);
        $this->deletePostFromComment($id);
        return true;
    }

    public function findPost($id)
    {
        $post = $this->db->getQuery('SELECT * FROM t_billet WHERE bil_id = ' . $id)->fetch(\PDO::FETCH_OBJ);

        try
        {
            if ($post === false)
            {
                throw new NotFoundException('Page non touvée !');
            }
            return $post;
        }
        catch (NotFoundException $exception)
        {
            $exception->getError404();
        }
        catch (\Exception $e)
        {
            $e->getMessage();
        }

    }

    public function publishPost($id, $status)
    {
        $sql = "UPDATE t_billet SET BIL_STATUS = :BIL_STATUS, BIL_DATE = now() WHERE BIL_ID  = :BIL_ID";
        $statement = [
            "BIL_ID"        => $id,
            "BIL_STATUS"    => $status
        ];
        $this->db->getPrepare($sql, $statement);
        return true;
    }

}