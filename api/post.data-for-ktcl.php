<?php
include "config.php";
$request_body = file_get_contents("php://input");
$data = json_decode($request_body, true);
$dataChoice = $data['dataChoice'];
$result = [
    "success" => true,
    'price' => calculator($dataChoice),
    'dataChoice' => $dataChoice,
];
echo json_encode($result);
