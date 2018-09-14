<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new \Tanamassar\Projet_4\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/backend/adminView.php');
}

