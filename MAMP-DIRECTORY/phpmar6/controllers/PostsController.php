<?php
namespace phpmar6\controllers;

require_once __DIR__ . '/../models/Post.php';

use phpmar6\models\Post;

class PostsController {
    public function index() {
        $postModel = new Post();
        header('Content-Type: application/json');
        echo json_encode($postModel->getPosts());
        exit();
    }
}

