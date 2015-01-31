<?php

require_once "db.php";

session_start();
if (!$db) {
	$_SESSION["flash"] = "Failed to connect to the database.";
	header("Location: ../index.php");
	exit;
}

$campaign_id = filter_input(INPUT_POST, "campaign_id");
$username = $_SESSION["username"];

$sql = "update users set campaign = $campaign_id where username = '$username'";
$result = $db->query($sql);

if ($result) {
    $_SESSION["curr_campaign"] = get_current_campaign_name_from_id($campaign_id, $db);
    $_SESSION["curr_campaign_id"] = $campaign_id;
}

$response = array("success" => $result, "msg" => $sql);

echo json_encode($response);

function get_current_campaign_name_from_id($id, $db) {
    $sql = "select name from campaigns where id = $id";
    $result = $db->query($sql);
    $item = $result->fetch_assoc();
    return $item["name"];
}