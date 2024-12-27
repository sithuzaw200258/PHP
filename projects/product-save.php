<?php

echo "<pre>";
print_r($_POST);
print_r($_FILES);

$folderName = "product-images";
if (!is_dir($folderName)) {
    mkdir($folderName, 0777);
}

$extension = pathinfo($_FILES["product_photo"]["name"], PATHINFO_EXTENSION);
// echo $extension;

// $fileName = uniqid() . "_" . $_FILES["photo"]["name"];
$fileName = $folderName . "/" . uniqid() . "." . $extension;
$tmpName = $_FILES["product_photo"]["tmp_name"];

if (move_uploaded_file($tmpName, $fileName)) {
    // header("Location: ./gallery.php");
    $_POST["product_photo"] = $fileName;
}
// echo "<pre>";
// print_r($_POST);

$json = json_encode($_POST);
// echo $json;

$productFolder = "products";
if (!is_dir($productFolder)) {
    mkdir($productFolder, 0777);
}

$productFileName = "$productFolder/" . uniqid() . "_" . $_POST["product_name"] . ".json";

// $productFile = fopen($productFileName, "w");
// fwrite($productFile, $json);
// fclose($productFile);
file_put_contents($productFileName, $json);

header("Location: ./product-create.php");
