<?php
require_once "db.php";

session_start();
if (!$db) {
    $_SESSION["flash"] = "Failed to connect to the database.";
    header("Location: ../index.php");
    exit;
}

$campaign_id = filter_input(INPUT_POST, "campaign_id");

$sql = "delete from campaigns where id = $campaign_id";

$result = $db->query($sql);

$sql = "delete from leads_campaigns where campaign_id = $campaign_id";

$result = $db->query($sql);

$response = array();

if ($result) {
    $response["success"] = true;
    $response["msg"] = "Campaign deleted.";
} else {
    $response["success"] = false;
    $response["msg"] = $db->error;
}

echo json_encode($response);