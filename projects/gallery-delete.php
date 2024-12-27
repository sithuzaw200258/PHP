<?php 

// echo "<pre>";
// print_r($_GET);
$fileName = $_GET["file_name"]; 
$filePath = "./images/$fileName";

if (file_exists($filePath)) {
    unlink("./images/$fileName");
    header("Location: ./gallery.php");
}