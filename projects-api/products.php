<?php
// print_r($_POST);
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $message = json_encode([
        "message" => "Invalid request method. Only GET method is allowed.",
    ]);
    die($message);
}

$productFolder = "./products";
$products = array_filter(scandir($productFolder), fn($el) => $el !== '.' && $el !== '..');

$results = [];
foreach ($products as $product) {
    $json = file_get_contents($productFolder . "/" . $product);
    $data = json_decode($json);
    array_push($results,$data);
}

echo json_encode($results);

