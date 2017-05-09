<?php

namespace Web\Blog\Model;


interface CommentsGateway
{

    public function addNewComment($author, $content, $postId, $parentId, $level);

    public function findComment($id);

    public function findCommentsLevel0FromPost($id);

    public function findChildComments($id);

    public function findAllCommentsFromPost($id);

    public function addAlertComment($id);

    public function countAlertComment();

    public function findAllAlertComments();

    public function findInitialCommentAndChildsFromAlert($id);

    public function deleteCommentFromPost($id);

    public function updateAlertComment($id, $content);

    public static function validComment($id);

    public static function deleteCommentsFromAlert($id);

}