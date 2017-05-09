<?php

namespace Web\Blog\Model;


interface PostsGateway
{
    public function addNewPost($titre, $content, $status);

    public function getAllPosts();

    public function getAllPublishPosts();

    public function updatePost($id, $title, $content);

    public function deleteAllCommentsFromPost($id);

    public function deletePostFromComment($id);

    public function deletePost($id);

    public function findPost($id);

    public function publishPost($id, $status);

}