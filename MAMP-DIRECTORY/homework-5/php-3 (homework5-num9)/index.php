<?php
//we need this to accept requests from any domain
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//var_dump($uriArray);
//0
//1 forms

if ($uriArray[1] === 'products' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $products = [
        ['name' => 'Cheese Slice', 'price' => '$3.99'],
        ['name' => 'Pepperoni Slice', 'price' => '$4.99'],
        ['name' => 'Penne Slice', 'price' => '$4.50'],
        ['name' => 'White Slice', 'price' => '$4.50'],
    ];
    echo json_encode($products);
    exit();
}

if ($uriArray[1] === 'form' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo json_encode([
        'message' => 'Success'
    ]);
    exit();
}


?>
