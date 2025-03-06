<?php
require_once __DIR__.'/controllers/PostController.php';

// Debug output
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the path from the URL
$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);
$path = trim($path, '/');

// Debug output
echo "Path: " . $path . "<br>";

// Basic routing
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $path === 'posts') {
    header('Content-Type: application/json');
    $controller = new PostsController();
    $result = $controller->index();
    echo $result;
} else {
    echo "Welcome to the Posts API. Use /posts to get all posts.";
}