<?php
// print_r($_POST);
header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $message = json_encode([
        "message" => "Invalid request method. Only POST method is allowed.",
    ]);
    die($message);
}

if (empty($_POST['name']) || empty($_POST['price']) || empty($_POST['rating']) || empty($_FILES['photo'])) {
    $message = json_encode([
        "message" => "All Inputs are required",
    ]);
    die($message); 
}

$folderName = "product-images";
if (!is_dir($folderName)) {
    mkdir($folderName, 0777);
}

$extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
// echo $extension;

// $fileName = uniqid() . "_" . $_FILES["photo"]["name"];
$fileName = $folderName . "/" . uniqid() . "." . $extension;
$tmpName = $_FILES["photo"]["tmp_name"];

if (move_uploaded_file($tmpName, $fileName)) {
    $_POST["photo"] = $fileName;
}

$json = json_encode($_POST);
// echo $json;

$productFolder = "products";
if (!is_dir($productFolder)) {
    mkdir($productFolder, 0777);
}

$productFileName = "$productFolder/" . uniqid() . "_" . $_POST["name"] . ".json";

// $productFile = fopen($productFileName, "w");
// fwrite($productFile, $json);
// fclose($productFile);
file_put_contents($productFileName, $json);

echo $json;


