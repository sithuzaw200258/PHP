<?php

// echo "<pre>";
// print_r($_GET);

$fileName = $_GET['file_name'];
// echo $fileName;

$content = file_get_contents("./products/" . $fileName);
$data = json_decode($content);
// echo "<pre>";
// print_r($data);

if (unlink($data->product_photo)) {
    if(unlink("./products/" . $fileName)) {
        header("Location: ./products.php");
        exit;
    }
} 