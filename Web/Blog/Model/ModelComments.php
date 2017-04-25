<?php

namespace Web\Blog\Model;


use Core\Lib\DatabaseRepository;

class ModelComments extends DatabaseRepository implements CommentsGateway
{
    public function addNewComment($author, $content, $postId, $parentId = 0, $level = 0)
    {
        $date = new \DateTime();
        $sql = "INSERT INTO t_commentaire (COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID, PARENT_ID, LEVEL) VALUES (:COM_DATE, :COM_AUTEUR, :COM_CONTENU, :BIL_ID, :PARENT_ID, :LEVEL)";
        $array = [
            "COM_DATE"      => $date->format('Y-m-d H:i:s'),
            "COM_AUTEUR"    => $author,
            "COM_CONTENU"   => $content,
            "BIL_ID"        => $postId,
            "PARENT_ID"     => $parentId,
            "LEVEL"         => $level
        ];
        $this->db->getPrepare($sql, $array);
        return true;
    }

    public function findComment($id)
    {
        return $this->db->getQuery('SELECT * FROM t_commentaire WHERE com_id = ' . $id)->fetchAll(\PDO::FETCH_OBJ);
    }

    public function findCommentsLevel0FromPost($id)
    {
        return $this->db->getQuery('SELECT * FROM t_commentaire WHERE BIL_ID = ' . $id . ' AND parent_id = 0')->fetchAll(\PDO::FETCH_OBJ);
    }

    public function findChildComments($id)
    {
        return $this->db->getQuery('SELECT * FROM t_commentaire WHERE parent_id = ' . $id)->fetchAll(\PDO::FETCH_OBJ);
    }

    public function findAllCommentsFromPost($id)
    {
        $comments = [];
        foreach ($this->findCommentsLevel0FromPost($id) as $level0)
        {
            $comments[] = $level0;
            foreach ($this->findChildComments($level0->COM_ID) as $level1)
            {
                $comments[] = $level1;
                foreach ($this->findChildComments($level1->COM_ID) as $level2)
                {
                    $comments[] = $level2;
                    foreach ($this->findChildComments($level2->COM_ID) as $level3)
                    {
                        $comments[] = $level3;
                    }
                }
            }
        }
        return $comments;
    }

    public function addAlertComment($id)
    {
        $this->db->getQuery('UPDATE t_commentaire SET COM_ALERT = 1 WHERE COM_ID = ' . $id);
        return true;
    }

    public function countAlertComment()
    {
        return $this->db->getQuery('SELECT * FROM t_commentaire WHERE COM_ALERT = 1')->rowCount();
    }

    public function findAllAlertComments()
    {
        return $this->db->getQuery('SELECT * FROM t_commentaire WHERE COM_ALERT = 1')->fetchAll(\PDO::FETCH_OBJ);
    }

    public function findInitialCommentAndChildsFromAlert($id)
    {
        $comments = [];
        foreach ($this->findComment($id) as $level0)
        {
            $comments[] = $level0;
            foreach ($this->findChildComments($level0->COM_ID) as $level1)
            {
                $comments[] = $level1;
                foreach ($this->findChildComments($level1->COM_ID) as $level2)
                {
                    $comments[] = $level2;
                    foreach ($this->findChildComments($level2->COM_ID) as $level3)
                    {
                        $comments[] = $level3;
                    }
                }
            }
        }
        return $comments;
    }

    public function deleteCommentFromPost($id)
    {
        $sql = "DELETE FROM t_commentaire WHERE COM_ID = :COM_ID ";
        $statement = ["COM_ID" => $id];
        $this->db->getPrepare($sql, $statement);
        return true;
    }

    public function updateAlertComment($id, $content)
    {
        $sql = "UPDATE t_commentaire SET COM_CONTENU = :COM_CONTENU, COM_DATE = NOW() WHERE COM_ID = :COM_ID";
        $statement = [
            "COM_CONTENU"   => $content,
            "COM_ID"        => $id
        ];
        $this->db->getPrepare($sql, $statement);
        return true;
    }

    public static function validComment($id)
    {
        $db = new DatabaseRepository();
        $db->db->getInstance()->getQuery('UPDATE t_commentaire SET COM_ALERT = 0 WHERE COM_ID = ' . $id);
        return true;
    }

    public static function deleteCommentsFromAlert($id)
    {
        $model = new ModelComments();
        $comments = $model->findInitialCommentAndChildsFromAlert($id);
        foreach ($comments as $comment)
        {
            $model->deleteCommentFromPost($comment->COM_ID);
        }
    }

}