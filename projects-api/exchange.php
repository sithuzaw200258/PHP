<?php
// print_r($_POST);
header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $message = json_encode([
        "message" => "Invalid request method. Only POST method is allowed.",
    ]);
    die($message);
}

$amount = $_POST['amount'];
$from = $_POST['from_currency']; // USD
$to = $_POST['to_currency']; // THB

if (empty($amount) || empty($from) || empty($to)) {
    $message = json_encode([
        "message" => "All Input fields are required",
    ]);
    die($message); 
}

$content = file_get_contents("http://forex.cbm.gov.mm/api/latest");
// echo $content;
$data = json_decode($content, true);
$fromRate = str_replace(",", "", $data["rates"][$from]);
$toRate = str_replace(",", "", $data["rates"][$to]);

$mmk = $amount * $fromRate;
$result = $mmk / $toRate;

$_POST['result'] = round($result, 2) . " $to";

// $result = $amount * $from / $to;


echo json_encode($_POST);
