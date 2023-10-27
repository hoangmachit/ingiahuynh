<?php
include "config.php";
$request_body = file_get_contents("php://input");
$data = json_decode($request_body, true);
$dataChoice = [];
echo json_encode([
    'success' => true,
    'data' => $data,
    'price' => calculator($dataChoice),
]);
die;
