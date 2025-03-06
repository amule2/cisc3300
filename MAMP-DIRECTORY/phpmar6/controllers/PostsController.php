<?php
namespace phpmar6\controllers;

require_once __DIR__ . '../models/Post.php';



class PostsController {
    public function index() {
        $postModel = new Post();
        header('Content-Type: application/json');
        echo json_encode($postModel->getPosts());
        exit();
    }
}

