<?php
// print_r($_POST);
header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $message = json_encode([
        "message" => "Invalid request method. Only POST method is allowed.",
    ]);
    die($message);
}

if (empty($_FILES['photo'])) {
    $message = json_encode([
        "message" => "Photo is required",
    ]);
    die($message); 
}

$folderName = "gallery-images";
if (!is_dir($folderName)) {
    mkdir($folderName, 0777);
}

$extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
// echo $extension;

// $fileName = uniqid() . "_" . $_FILES["photo"]["name"];
$fileName = uniqid() . "." . $extension;
$tmpName = $_FILES["photo"]["tmp_name"];
$filePath = "$folderName/$fileName";

if (move_uploaded_file($tmpName, $filePath)) {
    $message = json_encode([
        "message" => "Photo is saved",
    ]);
    die($message); 
}

// echo json_encode($_FILES);