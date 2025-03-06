<?php
// Set the correct content-type for HTML output
header('Content-Type: text/html; charset=UTF-8');

// Path to the resources directory
$resources_path = 'resources/index.html';

// Check if the file exists and include it
if (file_exists($resources_path)) {
    include($resources_path);
} else {
    echo "Sorry, the requested resource could not be found.";
}
?>
