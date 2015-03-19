<?php
require_once "db.php";

session_start();
if (!$db) {
    $_SESSION["flash"] = "Failed to connect to the database.";
    header("Location: ../index.php");
    exit;
}

$id = filter_input(INPUT_POST, "id");
$status = filter_input(INPUT_POST, "status");

if ($status) {
    $set_status = 0;
} else {
    $set_status = 1;
}

$sql = "update campaigns set status = $set_status where id = $id";

$result = $db->query($sql);
$response = array();

if ($result) {
    $response["success"] = true;
    $response["msg"] = "Campaign $id status set to $set_status";
} else {
    $response["success"] = false;
    $response["msg"] = "Problem occured setting the status.";
}

echo json_encode($response);