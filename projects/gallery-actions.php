<?php

// echo "<pre>";
// print_r($_FILES);

/* ------Single File Upload------- */

// $folderName = "images";
// if (!is_dir($folderName)) {
//     mkdir($folderName, 0777);
// }

// $extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
// // echo $extension;

// // $fileName = uniqid() . "_" . $_FILES["photo"]["name"];
// $fileName = uniqid() . "." . $extension;
// $tmpName = $_FILES["photo"]["tmp_name"];
// $filePath = "$folderName/$fileName";

// if (move_uploaded_file($tmpName, $filePath)) {
//     header("Location: ./gallery.php");
// }

/* ------End Single File Upload------- */

/* ------Multiple File Upload------- */

$folderName = "images";
if (!is_dir($folderName)) {
    mkdir($folderName, 0777);
}

$error = false;

foreach ($_FILES["photos"]["name"] as $key => $value) {
    // echo $value . "<br>";

    $extension = pathinfo($value, PATHINFO_EXTENSION);
    // echo $extension . "<br>";

    $fileName = uniqid() . "." . $extension;
    // echo $fileName . "<br>";

    $tmpName = $_FILES["photos"]["tmp_name"][$key];
    $filePath = "$folderName/$fileName";

    if (!move_uploaded_file($tmpName, $filePath)) {
        $error = true;
    }
}

if($error === false){
    header("Location: ./gallery.php");
}



/* ------End Multiple File Upload------- */
