<?php
require_once 'classes/Prices.php';

use chapterFour\classes\Prices;

$prices= new Prices("Cheese Slice", 3.99, "very cheesy slice");

// Echo the JSON output
echo $prices->toJson();
?>