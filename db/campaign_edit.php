<?php

require_once "db.php";

session_start();
if (!$db) {
    $_SESSION["flash"] = "Failed to connect to the database.";
    header("Location: ../index.php");
    exit;
}

$id = filter_input(INPUT_POST, "id");
$name = filter_input(INPUT_POST, "name");
$start_date = date_create(filter_input(INPUT_POST, "start_date"));
$end_date = date_create(filter_input(INPUT_POST, "end_date"));
$status = filter_input(INPUT_POST, "status");
$dare = filter_input(INPUT_POST, "dare");


$sql = "update campaigns 
        set name = '$name', 
            startdate = '".date_format($start_date, "Y-m-d")."', 
            enddate = '".date_format($end_date, "Y-m-d")."', 
            status = $status, 
            dare = $dare 
	where id = $id";

$result = $db->query($sql);

$response = [];
if ($result) {
    $response["success"] = true;
    $response["msg"] = "Campaign edited.";
} else {
    $response["success"] = false;
    $response["msg"] = $db->error;
}

echo json_encode($response);