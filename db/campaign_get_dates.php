<?php
require_once "db.php";

session_start();
if (!$db) {
    $_SESSION["flash"] = "Failed to connect to the database.";
    header("Location: ../index.php");
    exit;
}

$id = filter_input(INPUT_POST, "id");

$sql = "select startdate, enddate from campaigns where id = $id";

$result = $db->query($sql);
$response = array();

if ($result) {
    $row = $result->fetch_assoc();
    $response["success"] = true;
    $response["start_date"] = $row["startdate"];
    $response["end_date"] = $row["enddate"];
} else {
    $response["success"] = false;
    $response["start_date"] = date("Y-m-d");
    $response["end_date"] = date("Y-m-d");
}

echo json_encode($response);