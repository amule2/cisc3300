<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// a. Create an associative array with keys and values
$pizza = [
    "product" => "Cheese Pizza",
    "price" => 3.99,

];

// b. Loop through the array and echo out each key-value pair
foreach ($pizza as $key => $value) {
    echo ucfirst($key) . ": " . $value . "<br>";
}

function pizzaServing(string $product, float $price, string $size="Slice"): string {
    return "This is the $size $product and it costs $$price.";
}
echo "<br>" . pizzaServing("Pepperoni Pizza", 5.99, "Large") . "<br>"; // With size
echo pizzaServing("Veggie Pizza", 4.50) . "<br>";

?>
