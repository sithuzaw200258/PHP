<?php
// print_r($_POST);
header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $message = json_encode([
        "message" => "Invalid request method. Only GET method is allowed.",
    ]);
    die($message);
}

$photos = array_filter(scandir("./gallery-images"), fn($el) => $el != "." && $el != "..");
echo json_encode(array_values($photos));