<?php
// print_r($_POST);
header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $message = json_encode([
        "message" => "Invalid request method. Only POST method is allowed.",
    ]);
    die($message);
}

if (empty($_POST['width']) || empty($_POST['breadth'])) {
    $message = json_encode([
        "message" => "Width and Breadth are required",
    ]);
    die($message); 
}
$width = $_POST['width'];
$breadth = $_POST['breadth'];
$area = $width * $breadth;

$_POST['area'] = $area . " sqft";
echo json_encode($_POST);

// $fileName = "area.txt";
// if (!file_exists($fileName)) {
//     touch($fileName);
// }
// $file = fopen($fileName, "a");
// fwrite($file, "$width x $breadth = $area sqft\n");
// fclose($file);
