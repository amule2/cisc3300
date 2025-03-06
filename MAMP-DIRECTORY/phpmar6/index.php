<?php

require_once __DIR__ . '/models/Post.php';
require_once __DIR__.'/controllers/PostsController.php';

use phpmar6\controllers\PostsController;

// Debug output
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the path from the URL
$request_uri = $_SERVER['REQUEST_URI'];
$path = trim(parse_url($request_uri, PHP_URL_PATH), '/') ;

// Debug output
echo "Path: " . $path . "<br>";

// Basic routing
if ($_SERVER['REQUEST_METHOD'] === 'GET' && (strpos($path, 'posts') !== false)) {
    header('Content-Type: application/json');

    // Instantiate the controller and get posts
    $controller = new PostsController();
    echo json_encode($controller->index());
} else {
    // Default message
    echo "Welcome to the Posts API. Use /phpmar6/posts to get all posts.";
}